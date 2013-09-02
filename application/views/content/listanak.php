<h2>Daftar Anak</h2>
<table id="table_liquid" cellspacing="0">
<caption>Daftar Anak</caption>
  <tr>
    <th>Anak Ke</th>
    <th>Anak Nama</th>
    <th>Tempat, Tanggal lahir</th>
    <th>Aksi</th>
  </tr>

  <?php
       //print_r($query);
  if($nganak!=null)
      {
       foreach($nganak as $row)
       {
          echo  '<tr>';
          echo  '<td>'.$row->anak_ke.'</td>';
          echo  '<td>'.$row->anak_nama.'</td>';
          echo  '<td>'.$row->anak_tempatlahir.', '.$row->anak_tanggallahir.'</td>';
//          echo  '<td><a href="'.site_url().'/cAnak/doDelete/'.$row->anak_id."-".$kranz.'">hapus</a> |';
//          echo  '<a href="'.site_url().'/cAnak/doEdit/'.$row->anak_id.'">edit</a> | ';
           echo  '<td><a class="ttx" href="'.site_url().'/cAnak/doDelete/'.$row->anak_id."-".$kranz.'"><img src="'.base_url()."src/cicon/delete.png".'" alt="Hapus">
            <span class="tooltipx"><span class="topx"></span>
            <span class="middlex">Tekan Gambar ini Untuk Menghapus '.$row->anak_nama.'</span>
            <span class="bottomx"></span></span>
            </a>';
          echo  '<a class="ttx" href="'.site_url().'/cAnak/doEdit/'.$row->anak_id.'"><img src="'.base_url()."src/cicon/edit.png".'" alt="Hapus">
            <span class="tooltipx"><span class="topx"></span>
            <span class="middlex">Tekan Gambar ini untuk Mengedit '.$row->anak_nama.'</span>
            <span class="bottomx"></span></span>
              </a></td>';
          echo  '</tr>';
       }
      }
  ?>
</table>