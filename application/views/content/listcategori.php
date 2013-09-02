                                    <table id="table_liquid" cellspacing="0" class="xxx">
                                    <caption>Daftar Categori</caption>
                                      <tr>
                                        <!-- <th>ID Kategori</th> -->
                                        <th>Nama Kategori</th>
                                        <th>Nama Unit</th>
                                        <th>Keterangan</th>
                                        <!-- <th>Kategori Folder</th> -->
                                        <th>Aksi</th>
                                      </tr>

                                      <?php
                                           //print_r($query);
                                           if($query!=null)
                                               {
                                                   foreach($query as $row)
                                                   {
                                                      echo  '<tr>';
                                                      //echo  '<td>'.$row->cat_id.'</td>';
                                                      echo  '<td>'.$row->cat_nama.'</td>';
                                                      echo  '<td>'.$row->unit_nama.'</td>';
                                                      echo  '<td>'.$row->cat_keterangan.'</td>';
                                                      //echo  '<td>'.$row->cat_folder.'</td>';
//                                                      echo  '<td><a href="'.site_url().'/cCategori/doDelete/'.$row->cat_id.'">hapus</a> |';
//                                                      echo  '<a href="'.site_url().'/cCategori/doEdit/'.$row->cat_id.'">edit</a></td>';
                                                       echo  '<td><a class="ttx" href="'.site_url().'/cCategori/doDelete/'.$row->cat_id.'"><img src="'.base_url()."src/cicon/delete.png".'" alt="Hapus">
                                                        <span class="tooltipx"><span class="topx"></span>
                                                        <span class="middlex">Tekan Gambar ini Untuk Menghapus '.$row->cat_nama.'</span>
                                                        <span class="bottomx"></span></span>
                                                        </a>';
                                                      echo  '<a class="ttx" href="'.site_url().'/cCategori/doEdit/'.$row->cat_id.'"><img src="'.base_url()."src/cicon/edit.png".'" alt="Hapus">
                                                        <span class="tooltipx"><span class="topx"></span>
                                                        <span class="middlex">Tekan Gambar ini untuk Mengedit '.$row->cat_nama.'</span>
                                                        <span class="bottomx"></span></span>
                                                          </a></td>';
                                                      echo  '</tr>';
                                                   }
                                               }
                                      ?>
                                    </table>

                                 <?php
                                        //echo $this->pagination->create_links();
                                        echo "<br>".$links;
                                 ?>