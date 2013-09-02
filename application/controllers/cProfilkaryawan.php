<?php

class cProfilkaryawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index($kar_nik)
    {
        $this->load->model('mAnak','',TRUE);
        $this->load->model('mKaryawan','',TRUE);
        $this->load->model('mTambahkompetensi','',TRUE);
        $data["judul"] = "profil Karyawan";
        $data["content"] = "content/isikaryawan.php";
        $tersangka = $this->mKaryawan->ambilprofil('kar_nik',$kar_nik);
        $anak = $this->mAnak->ambilsatu('kar_nik',$kar_nik);
        $kompetensi = $this->mTambahkompetensi->ambilsatu('kar_nik',$kar_nik,"yes");
        $data["kompetensi"] = $kompetensi;
        $data["tersangka"] = $tersangka;
        $data["anak"] = $anak;
        $this->load->view('profilkaryawan',$data);
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
        $this->load->model('mAnak','',TRUE);
        $this->load->model('mTambahkompetensi','',true);

        if($kar_nik!=null)
            $data["tersangka"] = $this->mKaryawan->ambilprofil('kar_nik',$kar_nik);
        else
            $data["tersangka"] = $this->mKaryawan->ambilprofil('kar_nik',$this->session->userdata("kar_nik"));
        //print_r($data["tersangka"]);
        //echo $this->session->userdata("unit_kerja");
        if($kar_nik==null)
            {
             $data["aksi"] = "mypro";
             $data["judul"] = "Update Profile";
            }
        else
            {
            $data["aksi"] = "edit";
            $data["judul"] = "Edit Profil Karyawan";
            }

        $data["kompetensiambil"] = $this->mTambahkompetensi->ambilsatu('kar_nik',$kar_nik,'join');
        $data["nganak"] = $this->mAnak->ambilsatu('kar_nik',$kar_nik);
        $this->load->model('mJabatan','',TRUE);
        $this->load->model('mUnitKerja','',TRUE);
        $data["unit"] = $this->mUnitKerja->ambilsemua(null,null);
        $data["jabatan"] = $this->mJabatan->ambilsemua(null,null);
        $data["karnix"] = $kar_nik;
        //if($kar_nik!=null)
        $data["unitx"] = $data["tersangka"][0]->unit_id;
//        else
//            $data["unitx"] = $this->session->userdata("unit_kerja");
        //echo $data["unitx"];
        $this->load->view('formprofilkaryawan',$data);

    }

    function confirmAdd()
    {
        $this->load->model('mKaryawan','',TRUE);
        //kerjo 
        //$data["sukses"] = $this->mKaryawan->masuk($kar_nama,$kar_nik,$unit_id);

        $this->session->set_flashdata('sukses',1);

        //redirect(site_url('cKaryawan/doAdd'),'refresh');
       //$this->load->view('formkaryawan',$data);
    }

    function confirmUpdate()
    {
        $this->load->model('mKaryawan','',TRUE);

        //$input["kar_nik"] = $_POST["kar_nik"];
        if(!empty($_POST["kar_nik"]))
            $kar_nik = $_POST["kar_nik"];
        else
            $kar_nik = $this->session->userdata('unit_kerja');
        $input["kar_namalengkap"]= $_POST["kar_namalengkap"];
        $input["kar_masukkerja"] = $_POST["kar_masukkerja"];
        $input["kar_tanggallahir"] = $_POST["kar_tanggallahir"];
        $input["kar_tanggalpensiun"] = $_POST["kar_tanggalpensiun"];
        $input["kar_namapasangan"] = $_POST["kar_namapasangan"];
        $input["kar_tanggallahirpasangan"] = $_POST["kar_tanggallahirpasangan"];
        $input["kar_alamat"] = $_POST["kar_alamat"];
        $input["kar_tanggalnikah"] = $_POST["kar_tanggalnikah"];
        $input["kar_namalengkap"] = $_POST["kar_namalengkap"];
        $input["kar_namalengkap"] = $_POST["kar_namalengkap"];
        $input["kar_kelamin"] = $_POST["radiobutton"];
        $input["kar_tempatlahir"] = $_POST["kar_tempatlahir"];
        $input["kar_tempatlahirpasangan"] = $_POST["kar_tempatlahirpasangan"];
        $input["kar_pendidikanakhir"] = $_POST["kar_pendidikanakhir"];

        $global_folder ="c:/xampp/htdocs/web/control/foto";
        //print_r(($_FILES["file"]));
        if(!$_FILES["file"]["error"]==4)
            {
                $file_extT = $_FILES["file"]["name"];
                $file_ext = explode('.', $file_extT);
                $config['upload_path'] = str_replace("\\", "/", $global_folder);
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['file_name'] = "Foto_".$kar_nik.".".$file_ext[(count($file_ext)-1)];
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = FALSE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $info_lengkap = $this->upload->data();
                $input["kar_foto"] = $info_lengkap["full_path"];
            }


        $xxx = $input;
        $ole="";
        foreach($input as $row)
            {
                $ole.=array_pop($xxx);
                $ole.=" ";
        }

        //echo "<br>".$ole." ini <br>";
        $tersangkax = $this->mKaryawan->ambilprofil('kar_nik',$kar_nik);
        $ole.=$kar_nik." ".$tersangkax[0]->unit_nama." ".$tersangkax[0]->kar_nama;
        $input["kar_keyword"] = $ole;
        if(!empty($_POST["jabatan"]))
            {
            $input["jabatan_id"] = $_POST["jabatan"];
            $input["kar_gajipokok"] = $_POST["kar_gajipokok"];
            $input["kar_gajipensiun"] = $_POST["kar_gajipensiun"];
            }
//        else
//            {
//            $tersangkax = $this->mKaryawan->ambilprofil('kar_nik',$this->session->userdata('unit_kerja'));
//             $input["jabatan_id"] = $tersangkax[0]->jabatan_id;
//        }

        if(!empty($_POST["unitkerja"]))
        $input["unit_id"] = $_POST["unitkerja"];
        if(!isset($unit_id) && $this->session->userdata("unit_kerja")!=1) $input["unit_id"] = $this->session->userdata("unit_kerja");
        //print_r($input);


        if(!$_FILES["file"]["error"]==4)
            {
            //echo "ada";
            //print_r($_FILES["file"]);
            if(!$this->upload->do_upload('file'))
                    {
                $this->session->set_flashdata('sukses',2);
            }
            else
                {
                $data["sukses"] = $this->mKaryawan->updateprofil($kar_nik,$input);
                $this->session->set_flashdata('sukses',1);
            }
        }
        else
            {
            //echo "tidak";
                $data["sukses"] = $this->mKaryawan->updateprofil($kar_nik,$input);
                $this->session->set_flashdata('sukses',1);
        }

        //print_r($data);
        $linx = 'cProfilkaryawan/index/'.$kar_nik;
        redirect(site_url($linx),'refresh');
       //$this->load->view(site_url($linx));
    }
}

?>
