<?php

class cCategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //hapus seluruh isi
    function rmdirr($dirname)
    {
        // Sanity check
        if (!file_exists($dirname)) {
            return false;
        }

        // Simple delete for a file
        if (is_file($dirname) || is_link($dirname)) {
            return unlink($dirname);
        }

        // Loop through the folder
        $dir = dir($dirname);
        while (false !== $entry = $dir->read()) {
            // Skip pointers
            if ($entry == '.' || $entry == '..') {
                continue;
            }

            // Recurse
            $this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
        }

        // Clean up
        $dir->close();
        return rmdir($dirname);
    }

    function index($ajax=null)
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/cCategori/index/';
        $config['total_rows'] = $this->db->count_all('categori');
        $config['per_page'] = '20';
        $config['full_tag_open']= '<p>';
        $config['full_tag_close']='</p>';

        $this->pagination->initialize($config);

        //echo $this->uri->segment(3)."<br>";
        $this->load->model('mCategori','',TRUE);
        $data["judul"] = "List Categori";
        $unit = null;
        if(!empty($_POST["unit_id"]))
            {
                if($_POST["unit_id"]=="-999")
                    $unit=null;
                else
                    $unit = $_POST["unit_id"];
            }
        $data["query"]=$this->mCategori->ambilsemua($config['per_page'],$this->uri->segment(3),$unit);
        $this->load->model('mUnitKerja');
        $data["unit"]=$this->mUnitKerja->ambilsemua(null,null);

        $data["links"] = $this->pagination->create_links();
        //echo $data["links"];
        

        if(empty($_POST["unit_id"]))
            $this->load->view('listcategori',$data);
            //echo "ini";
        else
            //echo json_encode($data);
            $this->load->view('content/listcategori',$data);
    }

    function doAdd($unit_id=null)
    {
         $data["aksi"] = "add";
         $data["judul"] = "Tambah Categori";
         $data["unit_id"] = $unit_id;
         if($unit_id==null)
             {
             $this->load->model('mUnitKerja');
             $data["unit"] = $this->mUnitKerja->ambilsemua(null,null);
         }
         $this->session->set_flashdata('sukses',0);
         $this->load->view('formcategori',$data);
    }

    function doDelete($cat_id)
    {
        $this->load->model('mCategori','',TRUE);
        $this->load->model('mDocument','',TRUE);
        $tersangka = $this->mCategori->ambilsatu('cat_id',$cat_id);
        //print_r($tersangka);
        $hapus_folder = $this->rmdirr($tersangka[0]->cat_folder);
        if($hapus_folder)
        $sukses= $this->mCategori->hapus($cat_id);
        $sukseshapusdocument = $this->mDocument->hapus($cat_id,'cat_id');

        if(isset($sukses) && $sukses && $sukseshapusdocument)
            $this->session->set_flashdata('sukses',1);
        else
            $this->session->set_flashdata('sukses',2);
        redirect(base_url().'index.php/cCategori','refresh');
    }

    function confirmAdd($unit_id=null)
    {
        $global_folder ="c:/xampp/htdocs/web/control/folder";
        if($unit_id==null)
            $unit_id = $_POST["unitkerja"];
        $this->load->model('mUnitKerja','',TRUE);
        $unit_nama = $this->mUnitKerja->ambilsatu('unit_id',$unit_id);
        $unit_folder = $global_folder."/".$unit_nama[0]->unit_nama;

        //$cat_id = $_POST["cat_id"];
        $cat_nama = $_POST["cat_nama"];
        $cat_keterangan = $_POST["cat_keterangan"];
        $cat_folder = $unit_folder."/".$cat_nama;

        if (file_exists($cat_folder)==false)
            {
                $bikin_folder = mkdir($cat_folder, 0777, true);
                chmod($cat_folder, 0777);
            }
        else $bikin_folder=FALSE;

        if($bikin_folder)
        {
            $this->load->model('mCategori','',TRUE);
            $data["sukses"] = $this->mCategori->masuk($cat_nama,$cat_keterangan,$unit_id,$cat_folder);
            $this->session->set_flashdata('sukses',1);
        }
        else
            {
            $this->session->set_flashdata('sukses',2);
        }

        redirect(site_url('cCategori'),'refresh');
       //$this->load->view('formkaryawan',$data);
    }

     function doEdit($cat_id)
    {
        //echo $cat_id;
        $this->load->model('mCategori','',TRUE);
        $data["tersangka"] = $this->mCategori->ambilsatu('cat_id',$cat_id);
        $data["aksi"] = "edit";
        $data["judul"] = "Edit Categori";
        $data["cat_id"] = $cat_id;
        $this->load->model('mUnitKerja');
        $data["unit"] = $this->mUnitKerja->ambilsemua();
        //$this->session->set_flashdata('cat_id',$cat_id);
        $this->load->view('formcategori',$data);
    }

    function confirmUpdate($cat_id)
    {
        $this->load->model('mCategori','',TRUE);
        $cat_nama = $_POST["cat_nama"];
        $cat_keterangan = $_POST["cat_keterangan"];
        $unit_id = $_POST["unitkerja"];
        $sukses = $this->mCategori->update($cat_id,$cat_nama,$cat_keterangan,$unit_id);
        if($sukses)
            $this->session->set_flashdata('sukses',1);
        else
            $this->session->set_flashdata('sukses',2);
        //echo $this->session->flashdatCunit_id');
        redirect(site_url('cCategori'),'refresh');
       //$this->load->view('formkaryawan',$data);
    }

    
}

?>
