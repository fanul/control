<?php

class cCaridocument extends CI_Controller
{
    public function  __construct() {
        parent::__construct();
    }

    function index()
    {
        $data["judul"] = "Pencarian Dokumen";
        $this->load->view('formcaridocument',$data);
    }

    function doCari()
    {
        $cari_mentah = $_POST["boxcari"];
        //$cari = explode(" ", $cari_mentah);
         if($cari_mentah!=null && $cari_mentah!="")
             {
                $this->load->model("mDocument",'',TRUE);
                //$tersangka = $this->mDocument->ambilsatu('document_keyword',$cari_mentah,'yes');
                $tersangka = $this->mDocument->cariPola($cari_mentah);
             }
         else $tersangka = null;
        $data["tersangka"] = $tersangka;
        $data["key"] = $cari_mentah;

        //print_r($tersangka);
        /*
        if($tersangka==null)
            echo "asyemm";
        else print_r($tersangka);
        */

        //print_r($cari);
       

        //redirect(site_url('cCaridocument'),'refresh');
        $this->load->view('content/caridocumentdetail',$data);
    }
}

?>
