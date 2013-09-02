<?php

class mHistory extends CI_Model{

    public function  __construct() {
        parent::__construct();
        $this->load->database();
    }

     function ambilsatu($field,$tersangka)
    {
        $this->db->select();
        $this->db->from("history");
        $this->db->where($field,$tersangka);

        $query = $this->db->get();

         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

    function ambilsemua($start=null,$end=null,$tempat=null,$cari=null)
    {
        $this->db->select();
        $this->db->from("history");
        $this->db->join('document', 'history.document_id = document.document_id', 'left');
        $this->db->join('karyawan', 'history.kar_nik = karyawan.kar_nik', 'left');
        if($tempat!=null && $cari!=null)
            $this->db->like($tempat,$cari);
        $this->db->order_by("his_time", "desc");
         if($start!=null && $end!=null)
            $this->db->limit($start,$end);
        //$this->db->limit($end,$start);

        $query = $this->db->get();


         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }


    function hitung($field=null,$nama=null)
            {
        if($field==null) return $this->db->count_all('history');
        else
            {
            $this->db->from('history');
            $this->db->join('document', 'history.document_id = document.document_id', 'left');
            $this->db->join('karyawan', 'history.kar_nik = karyawan.kar_nik', 'left');
            $this->db->like($field, $nama);
            return $this->db->count_all_results();
            }
    }

    function masuk($his_aksi,$kar_nik,$document_id,$his_time)
    {
        $masuk = array(
                        'his_aksi'=>$his_aksi,
                        'kar_nik'=>$kar_nik,
                        'document_id'=>$document_id,
                        'his_time'=>$his_time
            );

        $this->db->insert('history',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

    function hapus($his_id)
    {
        $masuk = array(
                        'his_id'=>$his_id
            );

        $this->db->delete('history',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

}

?>
