 <h2>Hasil Pencarian</h2>
<?php $tersangka =$this->session->flashdata('tersangka'); ?>
            <?php
                $key = $this->session->flashdata('key');
                $i=0;
                foreach($tersangka as $ini)
                    {
                    echo '<div class="content-box box2" style="width: 600px">';
                    echo '<h4>'.$key[0].'</h4><hr>';
                    if($ini->kar_nik!=$key[0])
                        echo '<p>NIK karyawan: '.$ini->kar_nik.'</p>';
                    else
                        echo '<p><b>NIK karyawan: '.$ini->kar_nik.'</b></p>';
                    if($ini->kar_nama!=$key[0])
                        echo '<p>Nama karyawan: '.$ini->kar_nama.'</p>';
                    else
                         echo '<p><b>Nama karyawan: '.$ini->kar_nama.'</b></p>';
                    if($ini->unit_nama!=$key[0])
                        echo '<p>Nama Unit Kerja :'.$ini->unit_nama.'</p>';
                    else
                        echo '<p><b>Nama Unit Kerja :'.$ini->unit_nama.'</b></p>';
                    echo '</div>';
                   $i++;
                }
            ?>

 <p style="clear: both"><br></p>