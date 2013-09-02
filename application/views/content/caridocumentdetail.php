 <h2>Hasil Pencarian</h2>
            <?php
                $i=0;
                if($tersangka!=null)
                    {
                foreach($tersangka as $row)
                    {
                    /*
                    echo '<div class="content-box box2" style="width: 600px">';
                    echo '<h4>'.$key.'</h4><hr>';
                    echo '<p><b>NIK karyawan: '.$ini->document_nama.'</b></p>';
                    echo '<p><b>Nama karyawan: '.$ini->document_id.'</b></p>';
                    echo '<p><b>Nama Unit Kerja :'.$ini->document_folder.'</b></p>';
                    echo '</div>';
                     * 
                     */
                    $folder = substr($row->document_folder,28);
                    $box='cDocument/doDownload/'.$row->document_id;
                    echo '<div class="content-box box1" style="width: 600px">';
                    echo '<h4>'.$row->document_nama.'</h4><hr>';
                    echo '    <table width="100%" cellpadding="0" cellspacing="0">';
                    echo '          <tr>';
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
                    //ini entar diisi ngedit2
                    if($row->unit_id==$this->session->userdata('unit_kerja')|| $this->session->userdata('unit_kerja')==9)
                    {
                        echo '          <tr>';
                        echo '            <td colspan="3"><a href="'.site_url('cDocument/doEdit').'/'.$row->document_id.'">Edit                   |</a><a href="'.site_url('cDocument/doDelete').'/'.$row->document_id.'">Hapus</a></td>';
                        echo '          </tr>';
                    }
                    echo '        </table>';
                    echo '</div>';
                    echo '<p style="clear: both"><br></p>';
                   $i++;
                }
                    }
            ?>

 <p style="clear: both"><br></p>