<?php

class cKompetensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/cKompetensi/index';
        $config['total_rows'] = $this->db->count_all('kompetensi');
        $config['per_page'] = '20';
        $config['full_tag_open']= '<p>';
        $config['full_tag_close']='</p>';

        $this->pagination->initialize($config);

        //echo $this->uri->segment(3)."<br>";
        $this->load->model('mKompetensi','',TRUE);
        $data["judul"] = "List Kompetensi";
        $data["query"]=$this->mKompetensi->ambilsemua($config['per_page'],$this->uri->segment(3),'join');
        //print_r($data["query"]);
        $this->load->model('mMasterkompetensi','',TRUE);
        $data["masterkompetensi"] = $this->mMasterkompetensi->ambilsemua(null,null);

        $data["links"] = $this->pagination->create_links();
        //echo $data["links"];
        $this->load->view('listkompetensi',$data);
    }

    function doAdd()
    {
         $data["aksi"] = "add";
         $data["judul"] = "Tambah Kompetensi";

         $this->load->model('mMasterkompetensi','',TRUE);
         $data["masterkompetensi"] = $this->mMasterkompetensi->ambilsemua(null,null);
         $this->session->set_flashdata('sukses',0);
         $this->load->view('formkompetensi',$data);
    }

    function doDelete($kompetensi_id)
    {
        $this->load->model('mKompetensi','',TRUE);
        $data["sukses"] = $this->mKompetensi->hapus($kompetensi_id);

        if(isset($data["sukses"]) && $data["sukses"])
            $this->session->set_flashdata('sukses',1);
        else
            $this->session->set_flashdata('sukses',2);
        redirect(site_url('cKompetensi'),'refresh');
    }

    function confirmAdd()
    {
        $this->load->model('mKompetensi','',TRUE);
        $kompetensi_nama = $_POST["kompetensi_nama"];
        $maskom_id = $_POST["maskom_id"];
        $data["sukses"] = $this->mKompetensi->masuk($kompetensi_nama,$maskom_id);

        if(isset($data["sukses"]) && $data["sukses"])
            $this->session->set_flashdata('sukses',1);
        else
            {
            $this->session->set_flashdata('sukses',2);
        }

        redirect(site_url('cKompetensi/doAdd'),'refresh');
       //$this->load->view('formkaryawan',$data);
    }

     function doEdit($kompetensi_id)
    {
        $this->load->model('mKompetensi','',TRUE);
        $data["tersangka"] = $this->mKompetensi->ambilsatu('kompetensi_id',$kompetensi_id);
        $data["aksi"] = "edit";
        $data["judul"] = "Edit Kompetensi";
        $this->load->model('mMasterkompetensi','',TRUE);
        $data["masterkompetensi"] = $this->mMasterkompetensi->ambilsemua(null,null);
        $this->session->set_flashdata('kompetensi_id',$kompetensi_id);
        $this->load->view('formkompetensi',$data);
    }

    function confirmUpdate()
    {
        $this->load->model('mKompetensi','',TRUE);
        $kompetensi_nama = $_POST["kompetensi_nama"];
        $maskom_id = $_POST["maskom_id"];
        $sukses = $this->mKompetensi->update($this->session->flashdata('kompetensi_id'),$kompetensi_nama,$maskom_id);
        if($sukses)
            $this->session->set_flashdata('sukses',1);
        else
            $this->session->set_flashdata('sukses',2);
        //echo $this->session->flashdata('unit_id');
        redirect(site_url('cKompetensi'),'refresh');
       //$this->load->view('formkaryawan',$data);
    }


}

?>
