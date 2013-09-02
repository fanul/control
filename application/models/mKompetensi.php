<?php

class mKompetensi extends CI_Model{

    public function  __construct() {
        parent::__construct();
        $this->load->database();
    }

     function ambilsatu($field,$tersangka)
    {
        $this->db->select();
        $this->db->from("kompetensi");
        $this->db->where($field,$tersangka);

        $query = $this->db->get();

         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

    function ambilsemua($start=5,$end=1,$join=null)
    {
        $this->db->select();
        $this->db->from('kompetensi');
        if($join!=null)
            $this->db->join('masterkompetensi','kompetensi.maskom_id = masterkompetensi.maskom_id','left');
        if($start!=null && $end!=null)
            $this->db->limit($start,$end);

        $query = $this->db->get();


         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

    function masuk($kompetensi_nama,$maskom_id)
    {
        $masuk = array(
                        'kompetensi_nama'=>$kompetensi_nama,
                        'maskom_id'=>$maskom_id
            );

        $this->db->insert('kompetensi',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

    function hapus($kompetensi_id)
    {
        $masuk = array(
                        'kompetensi_id'=>$kompetensi_id
            );

        $this->db->delete('kompetensi',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

     function update($kompetensi_id,$kompetensi_nama,$maskom_id)
    {
        $update = array(
                        'kompetensi_nama'=>$kompetensi_nama,
                        'maskom_id'=>$maskom_id
            );

        $this->db->where('kompetensi_id',$kompetensi_id);
        $this->db->update('kompetensi',$update);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

}

?>
