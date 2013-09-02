                                    <table id="table_liquid" cellspacing="0" class="xxx">
                                    <caption>Daftar Categori</caption>
                                      <tr>
                                        <!-- <th>ID Kategori</th> -->
                                        <th>Nama Categori</th>
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
                                                      //echo  '<td>'.$row->cat_nama.'</td>';
                                                      echo  '<td>'.$row->cat_nama.'</td>';
                                                      //echo  '<td>'.$row->cat_keterangan.'</td>';
                                                      //echo  '<td>'.$row->cat_folder.'</td>';
                                                      //echo  '<td><a href="'.site_url().'/cCategori/doDelete/'.$row->cat_id.'">hapus</a> |';
                                                      //echo '<td><a href="'.site_url('cDocument/seedocument').'/'.$row->cat_id.'">jelajah</td>';
                                                      echo    '<td>'
                                                              .'<form method="post" action="'.site_url('cDocument/seedocument').'">'
                                                              .'<input type="hidden" name="cat_id" id="cat_id" value="'.$row->cat_id.'">'
                                                              .'<input class="button" name="submit" type="submit" value="Jelajah"/>'
                                                              .'<input type="hidden" name="unit_id" id="unit_id" value="'.$unit_id.'">'
                                                              .'</form></td>';
                                                      echo  '</tr>';
                                                   }
                                               }
                                      ?>
                                    </table>

                                 <?php
                                        //echo $this->pagination->create_links();
                                        echo "<br>".$links;
                                 ?>