<?php

class mCategori extends CI_Model{

    public function  __construct() {
        parent::__construct();
        $this->load->database();
    }

     function ambilsatu($field,$tersangka)
    {
        $this->db->select();
        $this->db->from("categori");
        $this->db->where($field,$tersangka);

        $query = $this->db->get();

         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

    function ambildua($field1,$field2,$tersangka1,$tersangka2)
    {
        $this->db->select();
        $this->db->from("categori");
        $this->db->where($field1,$tersangka1);
        $this->db->where($field2,$tersangka2);

        $query = $this->db->get();
        $hasil = $query->result();
        //print_r($hasil);
         if ($query->num_rows() > 0)
        {
            return $hasil[0]->cat_id;
        }
        else return null;
    }

    function ambilsemua($start=1,$end=20,$unit_id=null)
    {
        $this->db->select('cat_id');
        $this->db->select('cat_nama');
        $this->db->select('unit_nama');
        $this->db->select('cat_folder');
        $this->db->select('cat_keterangan');
        $this->db->from('categori');
        $this->db->join('unitkerja','categori.unit_id = unitkerja.unit_id');
        if($unit_id!=null)
            $this->db->where('categori.unit_id',$unit_id);
        //if($start!=null && $end!=null)
        $this->db->limit($start,$end);
        //$this->db->limit($end,$start);

        $query = $this->db->get();


         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

    function masuk($cat_nama,$cat_keterangan,$unit_id,$cat_folder)
    {
        $masuk = array(
                        'cat_nama'=>$cat_nama,
                        'cat_keterangan'=>$cat_keterangan,
                        'unit_id'=>$unit_id,
                        'cat_folder'=>$cat_folder
            );

        $this->db->insert('categori',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

    function hapus($cat_id,$yangdihapus='cat_id')
    {
        $masuk = array(
                        $yangdihapus=>$cat_id
            );

        $this->db->delete('categori',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

     function update($cat_id,$cat_nama,$cat_keterangan,$unit_id)
    {
        $update = array(
                        'cat_nama'=>$cat_nama,
                        'cat_keterangan'=>$cat_keterangan,
                        'unit_id'=>$unit_id
            );

        $this->db->where('cat_id',$cat_id);
        $this->db->update('categori',$update);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

}

?>
