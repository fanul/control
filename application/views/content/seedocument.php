                                    <!-- <table id="table_liquid" cellspacing="0" class="xxx">
                                    <caption>Daftar Dokumen</caption>
                                      <tr>
                                        <!-- <th>ID Kategori</th> 
                                        <th>Nama Dokumen</th>
                                        <!-- <th>Kategori Folder</th> 
                                        <th>Document Folder</th>
                                      </tr>

                                      <?php
                                      /*
                                           //print_r($query);
                                           if($query!=null)
                                               {
                                                   foreach($query as $row)
                                                   {
                                                      echo  '<tr>';
                                                      //echo  '<td>'.$row->cat_id.'</td>';
                                                      //echo  '<td>'.$row->cat_nama.'</td>';
                                                      echo  '<td>'.$row->document_nama.'</td>';
                                                      //echo  '<td>'.$row->cat_keterangan.'</td>';
                                                      //echo  '<td>'.$row->cat_folder.'</td>';
                                                      //echo  '<td><a href="'.site_url().'/cCategori/doDelete/'.$row->cat_id.'">hapus</a> |';
                                                      //echo '<td><a href="'.site_url('cDocument/seeDocument').'/'.$row->cat_id.'">jelajah</td>';
                                                      echo  '<td>'.$row->document_folder.'</td>';
                                                      echo  '</tr>';
                                                   }
                                               }
                                       *
                                       */
                                      ?>
                                    </table> -->


                                 <?php

                                 if($query!=null)
                                       {
                                           foreach($query as $row)
                                           {
                                               $folder = substr($row->document_folder,28);
                                               $box='cDocument/doDownload/'.$row->document_id;
                                                echo '<div class="content-box box1" style="width: 600px">';
                                                echo '<h4>'.$row->document_nama.'</h4><hr>';
                                                echo '    <table width="100%" cellpadding="0" cellspacing="0">';
                                                echo '          <tr>';
                                                //echo '            <td rowspan="6"><a href="'.base_url().$folder.'">Download</a></td>';
                                                echo '            <td rowspan="6">'.anchor_popup(site_url($box),'Download Document').'</td>';
                                                echo '            <td>Nama Dokumen: </td>';
                                                echo '            <td>'.$row->document_nama.'</td>';
                                                echo '          </tr>';
                                                echo '          <tr>';
                                                echo '            <td>Deskripsi Dokumen: </td>';
                                                echo '            <td>'.$row->document_deskripsi.'</td>';
                                                echo '          </tr>';
                                                echo '          <tr>';
                                                echo '            <td>Kode Dokumen: </td>';
                                                echo '            <td>'.$row->document_kode.'</td>';
                                                echo '          </tr>';
                                                echo '          <tr>';
                                                echo '            <td>Tahun Dokumen: </td>';
                                                echo '           <td>'.$row->document_tahun.'</td>';
                                                echo '          </tr>';
                                                echo '          <tr>';
                                                echo '            <td>Pengesahan Dokumen: </td>';
                                                echo '            <td>'.$row->document_tanggalsah.'</td>';
                                                echo '          </tr>';
                                                echo '          <tr>';
                                                echo '            <td>Revisi Dokumen: </td>';
                                                echo '            <td>'.$row->document_revisi.'</td>';
                                                echo '          </tr>';
                                                if($this->session->flashdata('unit_id')==$this->session->userdata('unit_kerja') || $this->session->userdata('unit_kerja')==9)
                                                        {
                                                            echo '          <tr>';
                                                            //echo '            <td colspan="3"><a href="'.site_url('cDocument/doEdit').'/'.$row->document_id.'">Edit                   |</a><a href="'.site_url('cDocument/doDelete').'/'.$row->document_id.'">Hapus</a></td>';
                                                              echo  '<td colspan="3"><a class="ttx" href="'.site_url('cDocument/doEdit').'/'.$row->document_id.'"><img src="'.base_url()."src/cicon/edit.png".'" alt="Hapus">
                                                                <span class="tooltipx"><span class="topx"></span>
                                                                <span class="middlex">Tekan Gambar ini Untuk Mengedit '.$row->document_nama.'</span>
                                                                <span class="bottomx"></span></span>
                                                                </a>';
                                                              echo  '<a class="ttx" href="'.site_url('cDocument/doDelete').'/'.$row->document_id.'"><img src="'.base_url()."src/cicon/delete.png".'" alt="Hapus">
                                                                <span class="tooltipx"><span class="topx"></span>
                                                                <span class="middlex">Tekan Gambar ini untuk Menghapus '.$row->document_nama.'</span>
                                                                <span class="bottomx"></span></span>
                                                                  </a></td>';
                                                            echo '          </tr>';
                                                        }
                                                echo '        </table>';
                                                echo '</div>';
                                                echo '<p style="clear: both"><br></p>';
                                           }
                                       }
                                 ?>

                                 <?php
                                        //echo $this->pagination->create_links();
                                        echo "<br>".$links;
                                 ?>