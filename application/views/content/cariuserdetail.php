 <h2>Hasil Pencarian</h2>
            <?php
                if($tersangka != null)
                    {
                $i=0;
                //echo $key;
                foreach($tersangka as $ini)
                    {
                    $foto = substr($ini->kar_foto,28);
                    echo '<div class="content-box box2" style="width: 600px">';
                    echo '<h4>'.$key.'</h4><hr>';
                    echo '<table width="100%">';
                    echo '<tr>';
                    echo '<td width="125 px" height="150 px">';
                    $linx = 'cProfilkaryawan/index/'.$ini->kar_nik;
                    echo '<a href="'.$linx.'"><img width="100%" height="100%" src="'.base_url().$foto.'"></a>';
                    echo '</td>';
                    echo '<td>';
                    if($ini->kar_nik!=$key)
                        echo '<p>NIK karyawan: '.$ini->kar_nik.'</p>';
                    else
                        echo '<p><b>NIK karyawan: '.$ini->kar_nik.'</b></p>';
                    if($ini->kar_nama!=$key)
                        echo '<p>Nama karyawan: '.$ini->kar_nama.'</p>';
                    else
                         echo '<p><b>Nama karyawan: '.$ini->kar_nama.'</b></p>';
                    if($ini->unit_nama!=$key)
                        echo '<p>Nama Unit Kerja :'.$ini->unit_nama.'</p>';
                    else
                        echo '<p><b>Nama Unit Kerja :'.$ini->unit_nama.'</b></p>';

                    echo '</td>';
                    echo '</tr>';
                    if($this->session->userdata('unit_kerja')==1)
                        {
                            echo '<tr>';
                            echo '<td colspan="3>';
                            $linz = 'cProfilkaryawan/doEdit/'.$ini->kar_nik;
                            echo '<p>';
                            echo '<a href="#"></a>';
                            echo '<a href="'.$linz.'">edit profil</a>';
                            echo '<p>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    echo '</table>';
                    echo '</div>';
                   $i++;
                    }
                }
            ?>

 <p style="clear: both"><br></p>