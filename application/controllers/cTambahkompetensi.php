<?php

class cTambahkompetensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/cTambahkompetensi/index';
        $config['total_rows'] = $this->db->count_all('kompetensiambil');
        $config['per_page'] = '20';
        $config['full_tag_open']= '<p>';
        $config['full_tag_close']='</p>';

        $this->pagination->initialize($config);

        //echo $this->uri->segment(3)."<br>";
        $this->load->model('mJabatan','',TRUE);
        $data["judul"] = "List jabatan";
        $data["query"]=$this->mJabatan->ambilsemua($config['per_page'],$this->uri->segment(3));
        //print_r($data["query"]);

        $data["links"] = $this->pagination->create_links();
        //echo $data["links"];
        $this->load->view('listJabatan',$data);
    }

    function doAdd($kar_nik)
    {
         $data["aksi"] = "add";
         $data["kar_nik"] = $kar_nik;
         $data["judul"] = "Tambah Kompetensi Ambil";
         $this->load->model('mMasterkompetensi','',true);
         $data["masterkompetensi"] = $this->mMasterkompetensi->ambilsemua(null,null);
         $this->session->set_flashdata('sukses',0);
         $this->load->view('formtambahkompetensi',$data);
    }

    function pilihmasterkompetensi()
    {
        $maskom_id = $_POST["maskom_id"];
        $this->load->model('mKompetensi','',true);
        $data["kompetensi"] = $this->mKompetensi->ambilsatu('maskom_id',$maskom_id);

        $this->load->view('content/combotambah.php',$data);
    }

   function doDelete($idX)
    {
        $pecah = explode('-', $idX);
        //print_r($pecah);
        $this->load->model('mTambahkompetensi','',TRUE);
        $data["sukses"] = $this->mTambahkompetensi->hapus($pecah[0]);

        if(isset($data["sukses"]) && $data["sukses"])
            $this->session->set_flashdata('sukses',1);
        else
            $this->session->set_flashdata('sukses',2);

        $link = 'cProfilkaryawan/doEdit/'.$pecah[1];
        redirect(site_url($link),'refresh');
    }

    function confirmAdd()
    {
        $this->load->model('mTambahkompetensi','',TRUE);
        $kompetensi_id = $_POST["kompetensi_id"];
        $kar_nik = $_POST["kar_nik"];
        $data["sukses"] = $this->mTambahkompetensi->masuk($kompetensi_id,$kar_nik);

        if(isset($data["sukses"]) && $data["sukses"])
            $this->session->set_flashdata('sukses',1);
        else
            {
            $this->session->set_flashdata('sukses',2);
        }

        $linx = 'cProfilkaryawan/doEdit/'.$kar_nik;
        redirect(site_url($linx),'refresh');
       //$this->load->view('formkaryawan',$data);
    }

     function doEdit($jabatan_id)
    {
        $this->load->model('mJabatan','',TRUE);
        $data["tersangka"] = $this->mJabatan->ambilsatu('jabatan_id',$jabatan_id);
        $data["aksi"] = "edit";
        $data["judul"] = "Edit Jabatan";
        $this->session->set_flashdata('jabatan_id',$jabatan_id);
        $this->load->view('formjabatan',$data);
    }

    function confirmUpdate()
    {
        $this->load->model('mJabatan','',TRUE);
        $jabatan_nama = $_POST["jabatan_nama"];
        $sukses = $this->mJabatan->update($this->session->flashdata('jabatan_id'),$jabatan_nama);
        if($sukses)
            $this->session->set_flashdata('sukses',1);
        else
            $this->session->set_flashdata('sukses',2);
        //echo $this->session->flashdata('unit_id');
        redirect(site_url('cJabatan'),'refresh');
       //$this->load->view('formkaryawan',$data);
    }


}

?>
