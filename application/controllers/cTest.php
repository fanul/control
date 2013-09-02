<?php

class cTest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        $this->load->view('index',$data);
    }

    function doAdd($kar_nik)
    {
         $data["aksi"] = "add";
         $data["judul"] = "Tambah Anak";
         $data["kar_nik"] = $kar_nik;
         $this->session->set_flashdata('sukses',0);
         $this->load->view('formanak',$data);
    }

    function doDelete($idX)
    {
        $pecah = explode('-', $idX);
        //print_r($pecah);
        $this->load->model('mAnak','',TRUE);
        $data["sukses"] = $this->mAnak->hapus($pecah[0]);

        if(isset($data["sukses"]) && $data["sukses"])
            $this->session->set_flashdata('sukses',1);
        else
            $this->session->set_flashdata('sukses',2);

        $link = 'cProfilkaryawan/doEdit/'.$pecah[1];
        redirect(site_url($link),'refresh');
    }

    function confirmAdd()
    {
        $this->load->model('mAnak','',TRUE);
        $kar_nik = $_POST["kar_nik"];
        $tersangka = $this->mAnak->hitunganak($kar_nik);
        $anak_nama = $_POST["anak_nama"];
        $anak_tempatlahir = $_POST["anak_tempatlahir"];
        $anak_tanggallahir = $_POST["anak_tanggallahir"];
        if($tersangka[0]->anak_ke==0 || $tersangka[0]->anak_ke==null)
           $anak_ke = 1;
        else
           $anak_ke = $tersangka[0]->anak_ke + 1;
        $data["sukses"] = $this->mAnak->masuk($kar_nik,$anak_nama,$anak_tempatlahir,$anak_tanggallahir,$anak_ke);

        if(isset($data["sukses"]) && $data["sukses"])
            $this->session->set_flashdata('sukses',1);
        else
            {
            $this->session->set_flashdata('sukses',2);
        }

        $link = 'cProfilkaryawan/doEdit/'.$kar_nik;
        redirect(site_url($link),'refresh');
       //$this->load->view('formkaryawan',$data);
    }

     function doEdit($anak_id)
    {
        $this->load->model('mAnak','',TRUE);
        $data["tersangka"] = $this->mAnak->ambilsatu('anak_id',$anak_id);
        $data["aksi"] = "edit";
        $data["judul"] = "Edit Anak";
        $this->session->set_flashdata('anak_id',$anak_id);
        $this->load->view('formanak',$data);
    }

    function confirmUpdate()
    {
        $this->load->model('mAnak','',TRUE);
        $kar_nik = $_POST["kar_nik"];
        $anak_nama = $_POST["anak_nama"];
        $anak_tempatlahir = $_POST["anak_tempatlahir"];
        $anak_tanggallahir = $_POST["anak_tanggallahir"];
//        echo $anak_tanggallahir;
//        if($this->session->flashdata('anak_id')!=null)
//            echo $this->session->flashdata('anak_id');
//        else
//            echo "assyuuuw";
        $sukses = $this->mAnak->update($this->session->flashdata('anak_id'),$anak_nama,$anak_tempatlahir,$anak_tanggallahir);
        if($sukses)
            $this->session->set_flashdata('sukses',1);
        else
            $this->session->set_flashdata('sukses',2);
        //echo $this->session->flashdata('unit_id');
        $link = 'cProfilkaryawan/doEdit/'.$kar_nik;
        redirect(site_url($link),'refresh');
       //$this->load->view('formkaryawan',$data);
    }


}

?>
