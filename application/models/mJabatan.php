<?php

class mJabatan extends CI_Model{

    public function  __construct() {
        parent::__construct();
        $this->load->database();
    }

     function ambilsatu($field,$tersangka)
    {
        $this->db->select();
        $this->db->from("jabatan");
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
        $this->db->from('jabatan');
        if($start!=null && $end!=null)
            $this->db->limit($start,$end);

        $query = $this->db->get();


         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

    function masuk($jabatan_nama)
    {
        $masuk = array(
                        'jabatan_nama'=>$jabatan_nama
            );

        $this->db->insert('jabatan',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

    function hapus($jabatan_id)
    {
        $masuk = array(
                        'jabatan_id'=>$jabatan_id
            );

        $this->db->delete('jabatan',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

     function update($jabatan_id,$jabatan_nama)
    {
        $update = array(
                        'jabatan_nama'=>$jabatan_nama
            );

        $this->db->where('jabatan_id',$jabatan_id);
        $this->db->update('jabatan',$update);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

}

?>
