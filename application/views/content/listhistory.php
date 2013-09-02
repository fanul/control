                                
<table id="table_auto" cellspacing="0">
                                    <caption>Daftar log</caption>
                                      <tr>
                                        <!-- <th>ID Kategori</th> -->
                                        <th>Nama User</th>
                                        <th>Aksi</th>
                                        <th>Dokumen</th>
                                        <!-- <th>Kategori Folder</th> -->
                                        <th>Jam</th>
                                      </tr>

                                      <?php
                                           //print_r($query);
                                           if($query!=null)
                                               {
                                                   foreach($query as $row)
                                                   {
                                                      echo  '<tr>';
                                                      //echo  '<td>'.$row->cat_id.'</td>';
                                                      echo  '<td>'.$row->kar_nama.'</td>';
                                                      echo  '<td>'.$row->his_aksi.'</td>';
                                                      echo  '<td>'.$row->document_nama.'</td>';
                                                      echo  '<td>'.$row->his_time.'</td>';
                                                      //echo  '<td>'.$row->cat_folder.'</td>';
//                                                      echo  '<td><a href="'.site_url().'/cCategori/doDelete/'.$row->cat_id.'">hapus</a> |';
//                                                      echo  '<a href="'.site_url().'/cCategori/doEdit/'.$row->cat_id.'">edit</a></td>';
                                                      echo  '</tr>';
                                                   }
                                               }
                                      ?>
                                    </table>

                                 <?php
                                        //echo $this->pagination->create_links();
                                        echo "<br>".$links;
                                 ?>