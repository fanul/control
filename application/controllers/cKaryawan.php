<?php

class cKaryawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/cKaryawan/index/';
        $config['total_rows'] = $this->db->count_all('karyawan');
        $config['per_page'] = '20';
        $config['full_tag_open']= '<p>';
        $config['full_tag_close']='</p>';

        $this->pagination->initialize($config);

        //echo $this->uri->segment(3)."<br>";
        $this->load->model('mKaryawan','',TRUE);
        $data["judul"] = "List Karyawan";
        $data["query"]=$this->mKaryawan->ambilsemua($config['per_page'],$this->uri->segment(3));

        $data["links"] = $this->pagination->create_links();
        //echo $data["links"];
        $this->load->view('listkaryawan',$data);
    }
    
    function doAdd()
    {
         $this->load->model('mUnitKerja','',TRUE);
         $data["unit"] = $this->mUnitKerja->ambilsemua(null,null);
         $data["aksi"] = "add";
         $data["judul"] = "Tambah Data Karyawan";
         $this->session->set_flashdata('sukses',0);
         $this->load->view('formkaryawan',$data);
    }

    function doDelete($kar_nik)
    {
        $this->load->model('mKaryawan','',TRUE);
        $data["sukses"] = $this->mKaryawan->hapus($kar_nik);
        $this->session->set_flashdata('sukses',1);
        redirect(site_url('cKaryawan'),'refresh');
        
    }

    function doEdit($kar_nik=null)
    {
        $this->load->model('mKaryawan','',TRUE);
        $data["tersangka"] = $this->mKaryawan->ambilsatulagi('kar_nik',$kar_nik);
        if($kar_nik==null)
            {
             $data["aksi"] = "mypro";
             $data["judul"] = "Update Profile";
            }
        else
            {
            $data["aksi"] = "edit";
            $data["judul"] = "Edit Data Karyawan";
            }
        $this->load->model('mUnitKerja','',TRUE);
        $data["unit"] = $this->mUnitKerja->ambilsemua(null,null);
        $this->load->view('formkaryawan',$data);

    }

    function confirmAdd()
    {
        $this->load->model('mKaryawan','',TRUE);
        $kar_nik = $_POST["kar_nik"];
        $kar_nama = $_POST["kar_nama"];
        $unit_id= $_POST["unitkerja"];
        $data["sukses"] = $this->mKaryawan->masuk($kar_nama,$kar_nik,$unit_id);

        $this->session->set_flashdata('sukses',1);

        redirect(site_url('cKaryawan/doAdd'),'refresh');
       //$this->load->view('formkaryawan',$data);
    }

    function confirmUpdate()
    {
        $this->load->model('mKaryawan','',TRUE);
        $kar_nik = $_POST["kar_nik"];
        $kar_nama = $_POST["kar_nama"];
        if(!empty($_POST["kar_pass"]))
        $kar_passT= $_POST["kar_pass"];
        else
        $kar_passT="petronika";
        $kar_pass =md5($kar_passT);
        if(!empty($_POST["unitkerja"]))
        $unit_id= $_POST["unitkerja"];
        if(!isset($unit_id)) $unit_id = $this->session->userdata("unit_kerja");
        //echo $kar_passT."<br>";
        $data["sukses"] = $this->mKaryawan->update($kar_nik,$kar_nama,$kar_pass,$unit_id);

        $this->session->set_flashdata('sukses',1);

        redirect(site_url('cKaryawan'),'refresh');
       //$this->load->view('formkaryawan',$data);
    }
}

?>
