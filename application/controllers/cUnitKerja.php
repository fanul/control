<?php

class cUnitKerja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

        //hapus seluruh isi
    function rmdirr($dirname)
    {
        // Sanity check
        if (!file_exists($dirname)) {
            return false;
        }

        // Simple delete for a file
        if (is_file($dirname) || is_link($dirname)) {
            return unlink($dirname);
        }

        // Loop through the folder
        $dir = dir($dirname);
        while (false !== $entry = $dir->read()) {
            // Skip pointers
            if ($entry == '.' || $entry == '..') {
                continue;
            }

            // Recurse
            $this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
        }

        // Clean up
        $dir->close();
        return rmdir($dirname);
    }

    function index()
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/cUnitKerja/index';
        $config['total_rows'] = $this->db->count_all('unitkerja');
        $config['per_page'] = '20';
        $config['full_tag_open']= '<p>';
        $config['full_tag_close']='</p>';

        $this->pagination->initialize($config);

        //echo $this->uri->segment(3)."<br>";
        $this->load->model('mUnitKerja','',TRUE);
        $data["judul"] = "List Unit Kerja";
        $data["query"]=$this->mUnitKerja->ambilsemua($config['per_page'],$this->uri->segment(3));

        $data["links"] = $this->pagination->create_links();
        //echo $data["links"];
        $this->load->view('listunitkerja',$data);
    }

    function doAdd()
    {
         $data["aksi"] = "add";
         $data["judul"] = "Tambah Unit Kerja";
         $this->session->set_flashdata('sukses',0);
         $this->load->view('formunitkerja',$data);
    }

    function doDelete($unit_id)
    {
        $this->load->model('mUnitKerja','',TRUE);
        $this->load->model('mCategori','',TRUE);
        $this->load->model('mDocument','',TRUE);
        $tersangka = $this->mUnitKerja->ambilsatu('unit_id',$unit_id);
        $borongan = $this->mCategori->ambilsatu('unit_id',$unit_id);
        $hapus_folder = $this->rmdirr($tersangka[0]->unit_folder);
		
        if($hapus_folder)
            {
                foreach($borongan as $cat)
                    {
                         $hapusdocument = $this->mDocument->hapus($cat->cat_id,'cat_id');
                    }
                $hapuscategori = $this->mCategori->hapus($unit_id,'unit_id');
                $data["sukses"] = $this->mUnitKerja->hapus($unit_id);
            }
		else
		{
			if(!file_exists($hapus_folder))
			{
				foreach($borongan as $cat)
                    {
                         $hapusdocument = $this->mDocument->hapus($cat->cat_id,'cat_id');
                    }
                $hapuscategori = $this->mCategori->hapus($unit_id,'unit_id');
                $data["sukses"] = $this->mUnitKerja->hapus($unit_id);
			}
		}

        if(isset($data["sukses"]) && $data["sukses"])
            $this->session->set_flashdata('sukses',1);
        else
            $this->session->set_flashdata('sukses',2);
        redirect(site_url('cUnitKerja'),'refresh');
    }

    function confirmAdd()
    {
        $global_folder ="c:/xampp/htdocs/web/control/folder";
        $this->load->model('mUnitKerja','',TRUE);
        $unit_nama = $_POST["unit_nama"];
        $unit_keterangan = $_POST["unit_keterangan"];
        $unit_folder = $global_folder."/".$unit_nama;

        if (file_exists($unit_folder)==false)
            {
                $bikin_folder = mkdir($unit_folder, 0777, true);
                chmod($unit_folder, 0777);
            }
        else $bikin_folder=FALSE;

        if($bikin_folder)
        {
            $data["sukses"] = $this->mUnitKerja->masuk($unit_nama,$unit_keterangan,$unit_folder);
            $this->session->set_flashdata('sukses',1);
        }
        else
            {
            $this->session->set_flashdata('sukses',2);
        }

        redirect(site_url('cUnitKerja/doAdd'),'refresh');
       //$this->load->view('formkaryawan',$data);
    }

     function doEdit($unit_id)
    {
        $this->load->model('mUnitKerja','',TRUE);
        $data["tersangka"] = $this->mUnitKerja->ambilsatu('unit_id',$unit_id);
        $data["aksi"] = "edit";
        $data["judul"] = "Edit Unit Kerja";
        $data["unit"] = $this->mUnitKerja->ambilsemua(null,null);
        //$this->session->set_flashdata('unit_id',$unit_id);
        $this->load->view('formunitkerja',$data);
    }

    function confirmUpdate()
    {
        $this->load->model('mUnitKerja','',TRUE);
        $unit_nama = $_POST["unit_nama"];
        $unit_keterangan = $_POST["unit_keterangan"];
        $sukses = $this->mUnitKerja->update($this->session->flashdata('unit_id'),$unit_nama,$unit_keterangan);
        if($sukses)
            $this->session->set_flashdata('sukses',1);
        else
            $this->session->set_flashdata('sukses',2);
        //echo $this->session->flashdata('unit_id');
        redirect(site_url('cUnitKerja'),'refresh');
       //$this->load->view('formkaryawan',$data);
    }

 
}

?>
