<?php

class mMasterkompetensi extends CI_Model{

    public function  __construct() {
        parent::__construct();
        $this->load->database();
    }

     function ambilsatu($field,$tersangka)
    {
        $this->db->select();
        $this->db->from("masterkompetensi");
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
        $this->db->from('masterkompetensi');
        if($start!=null && $end!=null)
            $this->db->limit($start,$end);

        $query = $this->db->get();


         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

    function masuk($maskom_nama)
    {
        $masuk = array(
                        'maskom_nama'=>$maskom_nama
            );

        $this->db->insert('masterkompetensi',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

    function hapus($maskom_id)
    {
        $masuk = array(
                        'maskom_id'=>$maskom_id
            );

        $this->db->delete('masterkompetensi',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

     function update($maskom_id,$maskom_nama)
    {
        $update = array(
                        'maskom_nama'=>$maskom_nama
            );

        $this->db->where('maskom_id',$maskom_id);
        $this->db->update('masterkompetensi',$update);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

}

?>
