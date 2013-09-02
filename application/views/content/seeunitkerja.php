                                    <table id="table_liquid" cellspacing="0" class="xxx">
                                    <caption>Daftar UnitKerja</caption>
                                      <tr>
                                        <!-- <th>ID Kategori</th> -->
                                        <th>Nama Unit</th>
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
                                                      echo  '<td>'.$row->unit_nama.'</td>';
                                                      //echo  '<td>'.$row->cat_keterangan.'</td>';
                                                      //echo  '<td>'.$row->cat_folder.'</td>';
                                                      //echo  '<td><a href="'.site_url().'/cCategori/doDelete/'.$row->cat_id.'">hapus</a> |';
                                                      /*
                                                      echo    '<td>'
                                                              .'<form action="#">'
                                                              .'<input type="hidden" id="unit_id" value="'.$row->unit_id.'">'
                                                              .'<input class="button" name="submit" type="submit" value="Jelajah"/>'
                                                              .'</form></td>';
                                                       *
                                                       */
                                                      echo '<td><a href="'.site_url('cDocument/seecategori').'/'.$row->unit_id.'">jelajah</td>';
                                                      echo  '</tr>';

                                                   }
                                               }
                                      ?>
                                    </table>

                                 <?php
                                        //echo $this->pagination->create_links();
                                        echo "<br>".$links;
                                 ?>