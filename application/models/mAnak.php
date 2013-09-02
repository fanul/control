<?php

class mAnak extends CI_Model{

    public function  __construct() {
        parent::__construct();
        $this->load->database();
    }

     function ambilsatu($field,$tersangka)
    {
        $this->db->select();
        $this->db->from("anak");
        $this->db->where($field,$tersangka);

        $query = $this->db->get();

         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

    function ambilsemua($start=5,$end=1)
    {
        $this->db->select();
        $this->db->from('anak');
        if($start!=null && $end!=null)
            $this->db->limit($start,$end);

        $query = $this->db->get();


         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

    function masuk($kar_nik,$anak_nama,$anak_tempatlahir,$anak_tanggallahir,$anak_ke)
    {
        $masuk = array(
                        'kar_nik'=>$kar_nik,
                        'anak_nama'=>$anak_nama,
                        'anak_tempatlahir'=>$anak_tempatlahir,
                        'anak_tanggallahir'=>$anak_tanggallahir,
                        'anak_ke'=>$anak_ke
            );

        $this->db->insert('anak',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

    function hapus($anak_id)
    {
        $masuk = array(
                        'anak_id'=>$anak_id
            );

        $this->db->delete('anak',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

     function update($anak_id,$anak_nama,$anak_tempatlahir,$anak_tanggallahir)
    {
        $update = array(
                        'anak_nama'=>$anak_nama,
                        'anak_tanggallahir'=>$anak_tanggallahir,
                        'anak_tempatlahir'=>$anak_tempatlahir
            );

        $this->db->where('anak_id',$anak_id);
        $this->db->update('anak',$update);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

    function hitunganak($kar_nik)
    {
        $sql = "select distinct count(*) as anak_ke from anak where kar_nik = '$kar_nik'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return 0;
    }

}

?>
