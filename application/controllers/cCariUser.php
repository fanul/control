<?php

class cCariUser extends CI_Controller
{
    public function  __construct() {
        parent::__construct();
    }

    function index()
    {
        $data["judul"] = "Pencarian User";
        $this->load->view('formcariuser',$data);
    }

    function doCari()
    {


         $cari_mentah = $_POST["boxcari"];
        //$cari = explode(" ", $cari_mentah);
         if($cari_mentah!=null && $cari_mentah!="")
             {
                $this->load->model("mKaryawan",'',TRUE);
                //$tersangka = $this->mDocument->ambilsatu('document_keyword',$cari_mentah,'yes');
                $tersangka = $this->mKaryawan->cariPola($cari_mentah);
             }
          else $tersangka=null;
        $data["tersangka"] = $tersangka;
        $data["key"] = $cari_mentah;

        //print_r($tersangka);
        /*
        if($tersangka==null)
            echo "asyemm";
        else print_r($tersangka);
        */

        //print_r($cari);

        //redirect(site_url('cCariuser'),'refresh');
                $this->load->view('content/cariuserdetail',$data);

//        $cari_mentah = $_POST["boxcari"];
//        $cari = explode(" ", $cari_mentah);
//        $this->load->model("mKaryawan",'',TRUE);
//        $this->load->model("mUnitKerja",'',TRUE);
//        $this->load->model("mCategori",'',TRUE);
//
//        //print_r($cari);
//        $z = 0;
//        foreach($cari as $subcari)
//            {
//                if(!isset($data["unit"]))
//                {
//                    $hasil_namaunit = $this->mUnitKerja->ambilsatu('unit_nama',$subcari);
//                    if($hasil_namaunit!=null)
//                    $data["unit"]=$subcari;
//                }
//                if(!isset($data["kar_nama"]))
//                    {
//                        $hasil_namakaryawan = $this->mKaryawan->ambilsatulagi('kar_nama',$subcari);
//                        if($hasil_namakaryawan!=null)
//                        $data["kar_nama"]=$subcari;
//                    }
//                if(!isset($data["kar_nik"]))
//                    {
//                        $hasil_nikkaryawan = $this->mKaryawan->ambilsatulagi('kar_nik',$subcari);
//                        if($hasil_nikkaryawan!=null)
//                        $data["kar_nik"]=$subcari;
//                    }
//                    $key[$z]=$subcari;
//                    $z++;
//            }
//
//            //echo $data["unit"]." unit_nama";
//            //echo $data["kar_nik"]." kar_nik";
//            //echo $data["kar_nama"]." kar_nama";
//
//            if(isset($data["unit"])&&!isset($data["kar_nama"])&&!isset($data["kar_nik"]))
//                {
//                $unit_id = $this->mUnitKerja->ambilsatu('unit_nama',$data["unit"]);
//                $tersangka = $this->mKaryawan->ambilsatulagi('unitkerja.unit_id',$unit_id[0]->unit_id);
//                $this->session->set_flashdata("tersangka",$tersangka);
//            }
//             else if(isset($data["unit"])&&isset($data["kar_nama"])&&!isset($data["kar_nik"]))
//                {
//                $unit_id = $this->mUnitKerja->ambilsatu('unit_nama',$data["unit"]);
//                $tersangka = $this->mKaryawan->ambilsatulagi('unitkerja.unit_id',$unit_id[0]->unit_id);
//                $this->session->set_flashdata("tersangka",$tersangka);
//            }
//            else if(!isset($data["unit"])&&!isset($data["kar_nama"])&&isset($data["kar_nik"]))
//                {
//                $tersangka = $this->mKaryawan->ambilsatulagi('kar_nik',$data["kar_nik"]);
//                $this->session->set_flashdata("tersangka",$tersangka);
//                //print_r($tersangka);
//                //print_r($this->session->flashdata('tersangka'));
//            }
//            else if(!isset($data["unit"])&&isset($data["kar_nama"])&&!isset($data["kar_nik"]))
//                {
//                $tersangka = $this->mKaryawan->ambilsatulagi('kar_nama',$data["kar_nama"]);
//                $this->session->set_flashdata("tersangka",$tersangka);
//            }
//            /*
//            else if(!isset($data["unit"])&&isset($data["kar_nama"])&&isset($data["kar_nik"]))
//                {
//                $tersangka[0] = $this->mKaryawan->ambilsatulagi('kar_nama',$data["kar_nama"]);
//                $tersangka[1] = $this->mKaryawan->ambilsatulagi('kar_nik',$data["kar_nik"]);
//                $this->session->set_flashdata("tersangka",$tersangka);
//            }
//             */
//
//            if(isset($tersangka))
//                {
//                    $this->session->set_flashdata("sukses",1);
//                    $this->session->set_flashdata("key",$key);
//                    //print_r($this->session->flashdata("key"));
//                    //echo "berhasil";
//                }
//            else
//                {
//                    $this->session->set_flashdata("sukses",2);
//                    //echo "tidak";
//                }
//
//        redirect(site_url('cCariUser'),'refresh');
    }
}

?>
