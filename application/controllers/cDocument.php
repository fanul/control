<?php

class cDocument extends CI_Controller{

    public function  __construct() {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/cDocument/index/';
        $config['total_rows'] = $this->db->count_all('unitkerja');
        $config['per_page'] = '20';
        $config['full_tag_open']= '<p>';
        $config['full_tag_close']='</p>';

        $this->pagination->initialize($config);

        //echo $this->uri->segment(3)."<br>";
        $this->load->model('mUnitKerja','',TRUE);
        $data["judul"] = "Browse Document";
        $data["query"]=$this->mUnitKerja->ambilsemua($config['per_page'],$this->uri->segment(3));
        $data["content"] = "content/seeunitkerja.php";
        

        $data["links"] = $this->pagination->create_links();
        //echo $data["links"];

        $cost = $this->session->flashdata('sukses');
        $this->session->set_flashdata('sukses',$cost);

        $this->load->view('index',$data);
    }

    function seeCategori($unit_id)
    {
        //$unit_idT = $_POST["unit_id"];
        //$unit_id = str_replace('#', '', $unit_idT);
        $data["judul"] = "Browse Document";
        $data["links"] = "";
        $this->load->model("mCategori",'',true);
        $data["query"] = $this->mCategori->ambilsatu('unit_id',$unit_id);
        $data["content"] = "content/seecategori.php";
        $data["atas"] = base_url();
        //$data["unit_id"] = $unit_id;
        $this->session->set_flashdata('unit_id',$unit_id);
        //echo $unit_id;
        $data["unit_id"] = $unit_id;
        $this->load->view('index',$data);
    }

    function seeDocument()
    {
        if(!empty($_POST["cat_id"]))
            {
                $cat_id=$_POST["cat_id"];
                $this->session->set_flashdata('cat_id',$cat_id);
            }
        else
            {
            $cat_id = $this->session->flashdata('cat_id');
            $this->session->set_flashdata('cat_id',$cat_id);
        }

//        $unit_id = $this->session->flashdata('unit_id');
//        $this->session->set_flashdata('unit_id',$unit_id);
        $unit_id = $_POST["unit_id"];
        
        $this->load->model('mDocument','',true);
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/cDocument/seeDocument/';
        if($this->session->userdata('kar_nik')!=9)
        $jumlah = $this->mDocument->hitungJumlahnondc($cat_id);
        else
        $jumlah = $this->mDocument->hitungJumlah($cat_id);

        //print_r($jumlah);
        //echo $jumlah[0]->jumlah;

        $config['total_rows'] = $jumlah[0]->jumlah;
        $config['per_page'] = '5';
        $config['full_tag_open']= '<p>';
        $config['full_tag_close']='</p>';

        $this->pagination->initialize($config);

        //echo $this->uri->segment(3)."<br>";
        $data["judul"] = "Browse Document";
        if($this->session->userdata('kar_nik')!=9)
        $data["query"]=$this->mDocument->ambilsemuanondc($config['per_page'],$this->uri->segment(3),$cat_id);
        else
        $data["query"]=$this->mDocument->ambilsemua($config['per_page'],$this->uri->segment(3),$cat_id);
        $data["content"] = "content/seedocument.php";
        $interlink = 'cDocument/seeCategori/'.$unit_id;
        $data["atas"] = site_url($interlink);


        $data["links"] = $this->pagination->create_links();
        //print_r($data);
        //echo $data["links"];
        $this->load->view('index',$data);
    }

    function doAdd()
    {
        $data["judul"]= "Tambah Dokumen";
        $this->load->model("mCategori");
        $this->load->model('mUnitKerja');
        $data["categori"] = $this->mCategori->ambilsemua(null,null,$this->session->userdata("unit_kerja"));
        $data["unit"] = $this->mUnitKerja->ambilsemua(null,null);
        $data["aksi"] = "add";

        //print_r($data["unit"]);
        $this->load->view('formdocument',$data);
    }

    function convertDate($data)
    {
        $date_year=substr($data,6,4);
        $date_month=substr($data,3,2);
        $date_day=substr($data,0,2);
        $date=date("Y-m-d", mktime(0,0,0,$date_month,$date_day,$date_year));
        //$date=date("YYYY-MM-DD", mktime(0,0,0,$date_month,$date_day,$date_year));
        return $date;
    }

    function confirmAdd()
    {
        $global_folder ="c:/xampp/htdocs/web/control/folder";
        if(isset($_POST["unit_id"]))
            $unit=$_POST["unit_id"];
        else
            $unit=$this->session->userdata('unit_kerja');
        //$unit_id = $this->session->userdata("unit_kerja");
        $cat_nama =$_POST["cat_nama"];
        $this->load->model('mCategori','',TRUE);
        $cat_id = $this->mCategori->ambildua('cat_nama','unit_id',$cat_nama,$unit);
        $cat_folderT = $this->mCategori->ambilsatu('cat_id',$cat_id);
        $cat_folder = $cat_folderT[0]->cat_folder;
        $cat_nama = $cat_folderT[0]->cat_nama;
        //$unit_folder = $global_folder."/".$unit_nama[0]->unit_nama;
        $this->load->model('mUnitKerja','',true);
        $unitT = $this->mUnitKerja->ambilsatu('unit_id',$unit);
        $unit_nama = $unitT[0]->unit_nama;

        //$cat_id = $_POST["cat_id"];
        $document_nama = $_POST["document_nama"];
        $document_kode =$_POST["document_kode"];
        $document_deskripsi = $_POST["document_ket"];
        //$document_keyword = $_POST["document_keyword"];
        $document_revisi = $_POST["document_revisi"];
        $document_tahun = $_POST["document_tahun"];
        //$document_tanggalsahT = $_POST["document_tanggalsah"];
        //$document_tanggalsah = $this->convertDate($document_tanggalsahT);
        $document_tanggalsah = $_POST["document_tanggalsah"];
        $document_keyword = $document_nama." ".$document_kode." ".$document_revisi." ".
                            $document_tahun." ".$document_tanggalsah." ".$cat_nama." ".$unit_nama;
        //$document_tanggalsah = $date->format('YYYY-DD-MM');
        //echo $date;
        //print_r($_FILES["file"]);
        $file_extT = $_FILES["file"]["name"];
        $file_ext = explode('.', $file_extT);
        //echo $file_ext[(count($file_ext)-1)];
        //echo $date->format('YYYY-DD-MM');


        //upload file
        $config['upload_path'] = str_replace("\\", "/", $cat_folder);
        $config['allowed_types'] = 'zip|doc|docx|xls|xlsx|pdf|jpg|jpeg|gif|png';
        $config['file_name'] = $document_nama."_".$document_revisi."_".$document_tahun.".".$file_ext[(count($file_ext)-1)];
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = FALSE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $info_lengkap = $this->upload->data();
        $document_folder = $info_lengkap["full_path"];

        if ( !$this->upload->do_upload('file'))
            {
                    //setting salah
                    $this->session->set_flashdata('sukses',2);
                    //echo $this->upload->display_errors();
            }
            else
            {
                    

                    //echo $his_time."<br>";

                    
                    //setting masuk di database
                    $this->load->model('mDocument','',TRUE);
                    $hasil = $this->upload->data();
                    $document_folder = $hasil['full_path'];
                    
                    $data["sukses"] = $this->mDocument->masuk($document_nama,$document_deskripsi,$document_keyword,$document_revisi,$document_tahun,$document_tanggalsah,$cat_id,$document_folder,$document_kode);

                    
                    $documentT = $this->mDocument->ambilsatu(null,null,"last");
                    //print_r($documentT);
                    $document_id = $documentT[0]->document_id;
                    $this->load->helper('date');
                    $his_aksi="Upload";
                    $kar_nik=$this->session->userdata("kar_nik");
                    //$his_time = gmt_to_local(local_to_gmt(now(),TRUE,'us'));
                    $his_time = date('Y-m-d H:i:s');

                    $this->load->model('mHistory','',TRUE);
                    $hasil=$this->mHistory->masuk($his_aksi,$kar_nik,$document_id,$his_time);
                    $this->session->set_flashdata('sukses',1);
            }

          //print_r($this->upload->data());
        redirect(site_url('cDocument/doAdd'),'refresh');
       //$this->load->view('formkaryawan',$data);
    }

    function doDelete($document_id)
    {
        $this->load->model('mDocument','',TRUE);
        $tersangka = $this->mDocument->ambilsatu('document_id',$document_id);
        $hapus_folder = unlink($tersangka[0]->document_folder);
        if($hapus_folder)
        $sukses= $this->mDocument->hapus($document_id);

        if(isset($sukses) && $sukses)
            $this->session->set_flashdata('sukses',1);
        else
            $this->session->set_flashdata('sukses',2);
        
        redirect(base_url(),'refresh');
    }

    function doEdit($document_id)
    {
        $this->load->model('mDocument','',TRUE);
        $data["tersangka"] = $this->mDocument->ambilsatu('document_id',$document_id);
        $data["aksi"] = "edit";
        $data["judul"] = "Edit Categori";
        $data["document_id"] = $document_id;
        $this->load->model('mCategori');
        $data["categori"] = $this->mCategori->ambilsatu('unit_id',$this->session->userdata('unit_kerja'));
        //$this->session->set_flashdata('cat_id',$cat_id);
        $this->load->view('formdocument',$data);
    }

    function doDownload($document_id)
    {
        $this->load->model('mDocument','',TRUE);
        $tersangka = $this->mDocument->ambilLengkap('document.document_id',$document_id);
        $data["tes"] = "berhasil";
        $data["tersangka"] = $tersangka;

        $this->load->helper('date');

        $his_aksi="download";
        $kar_nik=$this->session->userdata("kar_nik");
        //$his_time = gmt_to_local(local_to_gmt(now(),TRUE,'us'));
        $his_time = date('Y-m-d H:i:s');

        //echo $his_time."<br>";

        $this->load->model('mHistory','',TRUE);
        $hasil=$this->mHistory->masuk($his_aksi,$kar_nik,$document_id,$his_time);

        $this->load->view('content/downloadbox',$data);

        
    }

    function confirmUpdate()
    {
        $cat_id =$_POST["cat_id"];
        $document_id =$_POST["document_id"];
        $document_nama = $_POST["document_nama"];
        $document_kode =$_POST["document_kode"];
        $document_deskripsi = $_POST["document_ket"];
        //$document_keyword = $_POST["document_keyword"];
        $document_revisi = $_POST["document_revisi"];
        $document_tahun = $_POST["document_tahun"];
        $document_tanggalsahT = $_POST["document_tanggalsah"];
        $cek = explode("/",$document_tanggalsahT);

        if(is_array($cek))
            //$document_tanggalsah = $this->convertDate($document_tanggalsahT);
            $document_tanggalsah = $document_tanggalsahT;
        else $document_tanggalsah = $document_tanggalsahT;

        $this->load->model('mCategori','',true);
        $cat_folderT = $this->mCategori->ambilsatu('cat_id',$cat_id);
        $cat_nama = $cat_folderT[0]->cat_nama;
        //$unit_folder = $global_folder."/".$unit_nama[0]->unit_nama;
        $this->load->model('mUnitKerja','',true);
        $unitT = $this->mUnitKerja->ambilsatu('unit_id',$this->session->userdata('unit_kerja'));
        $unit_nama = $unitT[0]->unit_nama;


        $document_keyword = $document_nama." ".$document_kode." ".$document_revisi." ".
                            $document_tahun." ".$document_tanggalsah." ".$cat_nama." ".$unit_nama;

        $this->load->model('mDocument','',true);
        $sukses=$this->mDocument->update($document_id,$document_nama,$document_deskripsi,$document_keyword,$document_revisi,$document_tahun,$document_tanggalsah,$cat_id,$document_kode);

//
//        echo $document_deskripsi."<br>";
//        echo $document_id."<br>";
//        echo $document_keyword."<br>";
//        echo $document_kode."<br>";
//        echo $document_revisi."<br>";
//        echo $document_nama."<br>";
//        echo $document_tanggalsah."<br>";
//        echo $document_tahun."<br>";
//        echo $cat_id."<br>";
        


        if($sukses)
            {
            $this->session->set_flashdata('sukses',1);
            $this->load->helper('date');

            $his_aksi="Edit";
            $kar_nik=$this->session->userdata("kar_nik");
            //$his_time = gmt_to_local(local_to_gmt(now(),TRUE,'us'));
            $his_time = date('Y-m-d H:i:s');

            //echo $his_time."<br>";

            $this->load->model('mHistory','',TRUE);
            $hasil=$this->mHistory->masuk($his_aksi,$kar_nik,$document_id,$his_time);
            //echo "berhasil";
            }
        else
            {
            $this->session->set_flashdata('sukses',2);
            //echo "tidak berhasil";
            }

        redirect(base_url(),'refresh');
    }
}



?>
