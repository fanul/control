<?php

class cMasterkompetensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/cMasterkompetensi/index';
        $config['total_rows'] = $this->db->count_all('masterkompetensi');
        $config['per_page'] = '20';
        $config['full_tag_open']= '<p>';
        $config['full_tag_close']='</p>';

        $this->pagination->initialize($config);

        //echo $this->uri->segment(3)."<br>";
        $this->load->model('mMasterkompetensi','',TRUE);
        $data["judul"] = "List master kompetensi";
        $data["query"]=$this->mMasterkompetensi->ambilsemua($config['per_page'],$this->uri->segment(3));
        //print_r($data["query"]);

        $data["links"] = $this->pagination->create_links();
        //echo $data["links"];
        $this->load->view('listmasterkompetensi',$data);
    }

    function doAdd()
    {
         $data["aksi"] = "add";
         $data["judul"] = "Tambah Master Kompetensi";
         $this->session->set_flashdata('sukses',0);
         $this->load->view('formmasterkompetensi',$data);
    }

    function doDelete($maskom_id)
    {
        $this->load->model('mMasterkompetensi','',TRUE);
        $data["sukses"] = $this->mMasterkompetensi->hapus($maskom_id);

        if(isset($data["sukses"]) && $data["sukses"])
            $this->session->set_flashdata('sukses',1);
        else
            $this->session->set_flashdata('sukses',2);
        redirect(site_url('cMasterkompetensi'),'refresh');
    }

    function confirmAdd()
    {
        $this->load->model('mMasterkompetensi','',TRUE);
        $maskom_nama = $_POST["maskom_nama"];
        $data["sukses"] = $this->mMasterkompetensi->masuk($maskom_nama);

        if(isset($data["sukses"]) && $data["sukses"])
            $this->session->set_flashdata('sukses',1);
        else
            {
            $this->session->set_flashdata('sukses',2);
        }

        redirect(site_url('cMasterkompetensi/doAdd'),'refresh');
       //$this->load->view('formkaryawan',$data);
    }

     function doEdit($maskom_id)
    {
        $this->load->model('mMasterkompetensi','',TRUE);
        $data["tersangka"] = $this->mMasterkompetensi->ambilsatu('maskom_id',$maskom_id);
        $data["aksi"] = "edit";
        $data["judul"] = "Edit Master Kompetensi";
        //$this->session->set_flashdata('maskom_id',$maskom_id);
        $this->load->view('formmasterkompetensi',$data);
    }

    function confirmUpdate()
    {
        $this->load->model('mMasterkompetensi','',TRUE);
        $maskom_nama = $_POST["maskom_nama"];
        $maskom_id = $_POST["maskom_id"];
        $sukses = $this->mMasterkompetensi->update($maskom_id,$maskom_nama);
        if($sukses)
            $this->session->set_flashdata('sukses',1);
        else
            $this->session->set_flashdata('sukses',2);
        //echo $this->session->flashdata('unit_id');
        redirect(site_url('cMasterkompetensi'),'refresh');
       //$this->load->view('formkaryawan',$data);
    }


}

?>
