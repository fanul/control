<h2>Daftar Kompetensi</h2>
<table id="table_liquid" cellspacing="0">
<caption>Daftar Kompetensi</caption>
  <tr>
    <th>Nama Kompetensi</th>
    <th>Kategori Kompetensi</th>
    <th>Aksi</th>
  </tr>

  <?php
       //print_r($query);
  if($kompetensiambil!=null)
      {
       foreach($kompetensiambil as $row)
       {
          echo  '<tr>';
          echo  '<td>'.$row->kompetensi_nama.'</td>';
          echo  '<td>'.$row->maskom_nama.'</td>';
         // echo  '<td><a href="'.site_url().'/cTambahkompetensi/doDelete/'.$row->ambil_id."-".$kranz.'">hapus</a> |';
          //echo  '<a href="'.site_url().'/cTambahkompetensi/doEdit/'.$row->ambil_id.'">edit</a> | ';
          echo  '<td><a class="ttx" href="'.site_url().'/cTambahkompetensi/doDelete/'.$row->ambil_id."-".$kranz.'"><img src="'.base_url()."src/cicon/delete.png".'" alt="Hapus">
            <span class="tooltipx"><span class="topx"></span>
            <span class="middlex">Tekan Gambar ini untuk Menghapus '.$row->kompetensi_nama.'</span>
            <span class="bottomx"></span></span>
              </a></td>';
          echo  '</tr>';
       }
      }
  ?>
</table>