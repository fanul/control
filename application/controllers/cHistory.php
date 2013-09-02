<?php

class cHistory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        $this->load->library('pagination');
        //$config['total_rows'] = $this->db->count_all('history');
        $config['base_url'] = base_url().'index.php/cHistory/index/';
        $config['full_tag_open']= '<p>';
        $config['full_tag_close']='</p>';

        if(empty($_POST["ajaxx"]))
        {
            $ajax = -1;
        }
         else
         {
             $ajax = $_POST["ajaxx"];
         }

        //echo $this->uri->segment(3)."<br>";
        $this->load->model('mHistory','',TRUE);
        $data["judul"] = "List Log Karyawan";
        $unit = null;
        if(!empty($_POST["unit_id"]))
            {
                if($_POST["unit_id"]=="-999")
                    $unit=null;
                else
                    $unit = $_POST["unit_id"];
            }
        if($ajax<=0)
            {
            
            if($this->uri->segment(3)!='' || $this->uri->segment(3)!=NULL)
            {
                $halaman = $this->uri->segment(3);
            }
            else
            {
                $halaman = '0';
            }
            
            $config['per_page'] = '20';
            $config['total_rows'] = $this->mHistory->hitung();
            $data["query"]=$this->mHistory->ambilsemua($config['per_page'],$halaman);
            //$data["query"]=$this->mHistory->ambilsemua();
            }
        else
            {
            if($_POST["userx"]==0)
                $tempat = "document_nama";
            else
                $tempat = "kar_nama";
            $cari = $_POST["cari"];
            $config['per_page'] = '99999999999999';
            $config['total_rows'] = $this->mHistory->hitung($tempat,$cari);
            
            if($this->uri->segment(3)!='' || $this->uri->segment(3)!=NULL)
            {
                $halaman = $this->uri->segment(3);
            }
            else
            {
                $halaman = '0';
            }
            
            $data["query"]=$this->mHistory->ambilsemua($config['per_page'],$halaman,$tempat,$cari);
            //$data["query"]=$this->mHistory->ambilsemua(null,null,$tempat,$cari);
            }
            
        $this->load->model('mUnitKerja');
        $data["ajax"] = $ajax;
        $data["unit"]=$this->mUnitKerja->ambilsemua(null,null);

        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        //print_r($config);
        if($ajax==-1)
            $this->load->view('listhistory',$data);
        else
            $this->load->view('content/listhistory',$data);
        //echo $data["links"];
        //print_r($data["query"]);
        /*
        if(empty($ajax==null)
            $this->load->view('listhistory',$data);
            //echo "ini";
        else
            //echo json_encode($data);
            $this->load->view('content/listhistory',$data);
         */
    }
}

?>
