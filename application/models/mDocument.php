<?php

class mDocument extends CI_Model{

    public function  __construct() {
        parent::__construct();
        $this->load->database();
    }

     function ambilsatu($field,$tersangka,$like=null)
    {
        $this->db->select();
        $this->db->from("document");
        if($like!=null && $like!="last")
            $this->db->where($field,$tersangka);
        else if($like=="last")
            {
            $this->db->order_by('document_id','desc');
            $this->db->limit(1);
        }
        else
            $this->db->like($field,$tersangka);

        $query = $this->db->get();

         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

    function ambilsemua($start=1,$end=5,$cat_id=null)
    {

        $this->db->select();
        $this->db->from('document');
        if($cat_id!=null)
            $this->db->where('document.cat_id',$cat_id);
        $this->db->limit($start,$end);
        
        $query = $this->db->get();


         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

    function ambilsemuanondc($start=1,$end=5,$cat_id=null)
    {

        //echo $start." ".$end;
        $select = "select document.* ";
        $from = "from (select max(document.document_revisi) as terbaru,document.* from document group by document_nama) as terbaru, document ";
        $where = "where document.document_nama = terbaru.document_nama and document.document_revisi = terbaru.terbaru ";
        if($cat_id!=null)
            $where.="and document.cat_id = '$cat_id' ";
        $limit = "limit '$start' , '$end' ";

        $sql = $select.$from.$where;
        $query = $this->db->query($sql);

         if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else return null;
    }

    function masuk($document_nama,$document_deskripsi,$document_keyword,$document_revisi,$document_tahun,$document_tanggalsah,$cat_id,$document_folder,$document_kode)
    {
        $masuk = array(
                        'document_nama'=>$document_nama,
                        'document_deskripsi'=>$document_deskripsi,
                        'document_keyword'=>$document_keyword,
                        'document_revisi'=>$document_revisi,
                        'document_tahun'=>$document_tahun,
                        'document_tanggalsah'=>$document_tanggalsah,
                        'document_kode'=>$document_kode,
                        'document_folder'=>$document_folder,
                        'cat_id'=>$cat_id
            );

        $this->db->insert('document',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

    function hapus($document_id,$yangdihapus='document_id')
    {
        $masuk = array(
                        $yangdihapus=>$document_id
            );

        $this->db->delete('document',$masuk);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

     function update($document_id,$document_nama,$document_deskripsi,$document_keyword,$document_revisi,$document_tahun,$document_tanggalsah,$cat_id,$document_kode)
    {
        $update = array(
                        'document_nama'=>$document_nama,
                        'document_deskripsi'=>$document_deskripsi,
                        'document_keyword'=>$document_keyword,
                        'document_revisi'=>$document_revisi,
                        'document_tahun'=>$document_tahun,
                        'document_tanggalsah'=>$document_tanggalsah,
                        'document_kode'=>$document_kode,
                        'cat_id'=>$cat_id
            );

        $this->db->where('document_id',$document_id);
        $this->db->update('document',$update);

        if($this->db->affected_rows()>0)
          return true;
        else
          return false;
    }

    function hitungJumlahnondc($cat_id)
    {
        $sql="select count(*) as jumlah
            from(
            select document.* from
           (select max(document.document_revisi) as terbaru,document.* from document group by document_nama) terbaru, document
           where document.document_nama = terbaru.document_nama and document.document_revisi = terbaru.terbaru and document.cat_id='$cat_id'
                ) as jumlah";
        return $this->db->query($sql)->result();
        
    }

    function hitungJumlah($cat_id)
    {
        $sql="select count(*) as jumlah from document where cat_id='$cat_id'";
        return $this->db->query($sql)->result();

    }

    function cariPola($cari)
    {
        /*
        $sql="select distinct * from document
              left join categori
              on document.cat_id = categori.cat_id
              left join unitkerja
              on categori.unit_id = unitkerja.unit_id
              where document.document_keyword LIKE '%$cari%'";
        */
        $sql = "select * from
                (
                select max(hasil.document_revisi) revisi_terakhir, hasil.document_id, hasil.unit_id
                from
                ( select distinct document.*,unitkerja.unit_id from document
                              left join categori
                              on document.cat_id = categori.cat_id
                              left join unitkerja
                              on categori.unit_id = unitkerja.unit_id
                              where document.document_keyword LIKE '%$cari%'
                              order by document.document_revisi desc
                ) hasil
                group by hasil.document_nama
                ) filtered
                left join document on filtered.document_id = document.document_id";
        $query = $this->db->query($sql);
        
        if($query->num_rows>0)
                {
            return $query->result();
        }
        else return null;
    }

    function ambilLengkap($tempat,$cari)
      {
        $sql="select distinct * from document
              left join categori
              on document.cat_id = categori.cat_id
              left join unitkerja
              on categori.unit_id = unitkerja.unit_id
              where ".$tempat." = '$cari'";
        $query = $this->db->query($sql);

        if($query->num_rows>0)
                {
            return $query->result();
        }
        else return null;
    }

}

?>
