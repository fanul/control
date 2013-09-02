<?php

class mKaryawan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function ambilsatu($karyawan_nama,$karyawan_pass=null)
    {
        $this->db->select();
        $this->db->from("karyawan");
        if($karyawan_pass==null)
        $this->db->where('kar_nik',$karyawan_nama);
        else
        $this->db->where('kar_nama',$karyawan_nama);
        if($karyawan_pass!=null)
        $this->db->where('kar_pass',$karyawan_pass);

        $query = $this->db->get();

         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

      function ambilsatulagi($field,$tersangka)
    {
        //$this->db->select();
        $this->db->select("karyawan.kar_nama");
        $this->db->select("karyawan.kar_nik");
        $this->db->select("karyawan.kar_foto");
        $this->db->select("unitkerja.unit_nama");
        $this->db->select("unitkerja.unit_id");
        $this->db->from("karyawan");
        $this->db->join('unitkerja','karyawan.unit_id=unitkerja.unit_id','left');
        $this->db->where($field,$tersangka);

        $query = $this->db->get();

         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

    function ambilprofil($field,$tersangka)
    {
        $this->db->select();
        $this->db->from('karyawan');
        $this->db->where($field,$tersangka);
        $this->db->join('unitkerja','karyawan.unit_id=unitkerja.unit_id','left');
        $this->db->join('jabatan','karyawan.jabatan_id=jabatan.jabatan_id','left');

        $query = $this->db->get();

         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

    function ambilsemua($start=20,$end=1)
    {
        $this->db->select("karyawan.kar_nama");
        $this->db->select("karyawan.kar_nik");
        $this->db->select("karyawan.kar_foto");
        $this->db->select("unitkerja.unit_nama");
        //$this->db->select("unitkerja.unit_keterangan");
        $this->db->from('karyawan');
        $this->db->join('unitkerja','karyawan.unit_id=unitkerja.unit_id','left');

        $this->db->limit($start,$end);
        //$this->db->limit($end,$start);

        $query = $this->db->get();
        if($query->num_rows>0)
                {
            return $query->result();
        }
        else return null;
    }

    function masuk($kar_nama,$kar_nik,$unit_id)
    {
        $kar_pass = md5("petronika");
        $masuk = array(
                        'kar_nik'=>$kar_nik,
                        'kar_nama'=>$kar_nama,
                        'unit_id'=>$unit_id,
                        'kar_pass'=>$kar_pass,
                        'kar_foto'=>'c:/xampp/htdocs/web/control/foto/nofoto.png'
            );

        $this->db->insert('karyawan',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

    function hapus($kar_nik)
    {
        $masuk = array(
                        'kar_nik'=>$kar_nik
            );

        $this->db->delete('karyawan',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

     function update($kar_nik,$kar_nama,$kar_pass,$unit_id)
    {
        $update = array(
                        'kar_nik'=>$kar_nik,
                        'kar_nama'=>$kar_nama,
                        'unit_id'=>$unit_id,
                        'kar_pass'=>$kar_pass
            );

        $this->db->where('kar_nik',$kar_nik);
        $this->db->update('karyawan',$update);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

    function updateprofil($kar_nik,$update)
    {
        $this->db->where('kar_nik',$kar_nik);
        $this->db->update('karyawan',$update);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

      function cariPola($cari)
    {
        $sql="select distinct * from karyawan
              left join unitkerja
              on karyawan.unit_id = unitkerja.unit_id
              where karyawan.kar_keyword LIKE '%$cari%'";
        $query = $this->db->query($sql);

        if($query->num_rows>0)
                {
            return $query->result();
        }
        else return null;
    }
}

?>
