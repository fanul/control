<?php

class cJabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/cJabatan/index';
        $config['total_rows'] = $this->db->count_all('jabatan');
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

    function doAdd()
    {
         $data["aksi"] = "add";
         $data["judul"] = "Tambah Jabatan";
         $this->session->set_flashdata('sukses',0);
         $this->load->view('formjabatan',$data);
    }

    function doDelete($jabatan_id)
    {
        $this->load->model('mJabatan','',TRUE);
        $data["sukses"] = $this->mJabatan->hapus($jabatan_id);

        if(isset($data["sukses"]) && $data["sukses"])
            $this->session->set_flashdata('sukses',1);
        else
            $this->session->set_flashdata('sukses',2);
        redirect(site_url('cJabatan'),'refresh');
    }

    function confirmAdd()
    {
        $this->load->model('mJabatan','',TRUE);
        $jabatan_nama = $_POST["jabatan_nama"];
        $data["sukses"] = $this->mJabatan->masuk($jabatan_nama);

        if(isset($data["sukses"]) && $data["sukses"])
            $this->session->set_flashdata('sukses',1);
        else
            {
            $this->session->set_flashdata('sukses',2);
        }

        redirect(site_url('cJabatan/doAdd'),'refresh');
       //$this->load->view('formkaryawan',$data);
    }

     function doEdit($jabatan_id)
    {
        $this->load->model('mJabatan','',TRUE);
        $data["tersangka"] = $this->mJabatan->ambilsatu('jabatan_id',$jabatan_id);
        $data["aksi"] = "edit";
        $data["judul"] = "Edit Jabatan";
        //$this->session->set_flashdata('jabatan_id',$jabatan_id);
        $this->load->view('formjabatan',$data);
    }

    function confirmUpdate()
    {
        $this->load->model('mJabatan','',TRUE);
        $jabatan_nama = $_POST["jabatan_nama"];
        $jabatan_id = $_POST["jabatan_id"];
        $sukses = $this->mJabatan->update($jabatan_id,$jabatan_nama);
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
