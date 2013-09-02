<?php

class mUnitKerja extends CI_Model{

    public function  __construct() {
        parent::__construct();
        $this->load->database();
    }

     function ambilsatu($field,$tersangka)
    {
        $this->db->select();
        $this->db->from("unitkerja");
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
        $this->db->from('unitkerja');
        if($start!=null && $end!=null)
            $this->db->limit($start,$end);

        $query = $this->db->get();


         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

    function masuk($unit_nama,$unit_keterangan,$unit_folder)
    {
        $masuk = array(
                        'unit_nama'=>$unit_nama,
                        'unit_folder'=>$unit_folder,
                        'unit_keterangan'=>$unit_keterangan
            );

        $this->db->insert('unitkerja',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

    function hapus($unit_id)
    {
        $masuk = array(
                        'unit_id'=>$unit_id
            );

        $this->db->delete('unitkerja',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

     function update($unit_id,$unit_nama,$unit_keterangan)
    {
        $update = array(
                        'unit_nama'=>$unit_nama,
                        'unit_keterangan'=>$unit_keterangan
            );

        $this->db->where('unit_id',$unit_id);
        $this->db->update('unitkerja',$update);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

}

?>
