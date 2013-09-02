

<?php
    //pengecekkan session
    include ("template/theader.php");
    //$this->load->view("template\header");
?>

<body>

            <?php include ('template/ttemplate_atasan.php'); ?>


            	<div id="bg_wrapper">

                    <div id="main">

                        <div id="content">

                          <div class="jquery_tab">

                                <div class="content_block">
                                    
                                    <h2 class="jquery_tab_title"><?php echo $judul; ?></h2>

                                    <?php
                                    //echo $aksi."<br>";
                                        if($this->session->flashdata('sukses')!=0)
                                            {
                                            if($this->session->flashdata('sukses')==1)
                                                {
                                                    echo '<div class="message success">';
                                                    echo '   <p><strong>Berhasil!</strong></p>';
                                                    echo '</div><!-- end success -->';
                                            }
                                            else
                                                {
                                                    echo '<div class="message error">';
                                                    echo '    <p><strong>Gagal!</strong></p>';
                                                    echo '</div><!-- end error  -->';
                                            }
                                        }
                                    ?>
                                        <p>
                                        <marquee width="500px">Klik pada foto untuk melihat keterangan lengkap profil karyawan</marquee>
                                        </p>

                            		<table id="table_liquid" cellspacing="0">
                                    <caption>Daftar para karyawan</caption>
                                      <tr>
                                        <th class="nobg" width="100 px">Foto</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Unit Kerja</th>
                                        <th>Aksi</th>
                                      </tr>
                                      
                                      <?php
                                           //print_r($query);
                                           foreach($query as $row)
                                           {
                                              $foto = substr($row->kar_foto,28);
                                              //echo $foto;
                                              $linx = 'cProfilkaryawan/index/'.$row->kar_nik;
                                              echo  '<tr>';
                                              echo  '<th class="spec"><a href="'.site_url($linx).'"><img width="100 px" height="104 px" src="'.base_url().$foto.'"></th>';
                                              echo  '<td>'.$row->kar_nama.'</td>';
                                              echo  '<td>'.$row->kar_nik.'</td>';
                                              echo  '<td>'.$row->unit_nama.'</td>';
//                                              echo  '<td><a href="'.site_url().'/cKaryawan/doDelete/'.$row->kar_nik.'">hapus</a> |';
//                                              echo  '<a href="'.site_url().'/cKaryawan/doEdit/'.$row->kar_nik.'">setting login</a>  |';
//                                              echo  '<a href="'.site_url().'/cProfilkaryawan/doEdit/'.$row->kar_nik.'">profil</a>';
                                              echo  '<td><a class="ttx" href="'.site_url().'/cKaryawan/doDelete/'.$row->kar_nik.'"><img src="'.base_url()."src/cicon/delete.png".'">
                                                   <span class="tooltipx"><span class="topx"></span>
                                                   <span class="middlex">Tekan Gambar ini Untuk Menghapus '.$row->kar_nama.'</span>
                                                   <span class="bottomx"></span></span>
                                                    </a>';
                                              echo  '<a class="ttx" href="'.site_url().'/cKaryawan/doEdit/'.$row->kar_nik.'"><img src="'.base_url()."src/cicon/edit.png".'" alt="Hapus">
                                                <span class="tooltipx"><span class="topx"></span>
                                                <span class="middlex">Tekan Gambar ini Untuk Mengubah Login '.$row->kar_nama.'</span>
                                                <span class="bottomx"></span></span>
                                                </a>';
                                              echo  '<a class="ttx" href="'.site_url().'/cProfilkaryawan/doEdit/'.$row->kar_nik.'"><img src="'.base_url()."src/cicon/edit_profil.png".'" alt="Hapus">
                                                <span class="tooltipx"><span class="topx"></span>
                                                <span class="middlex">Tekan Gambar ini Untuk Mengubah profil  '.$row->kar_nama.'</span>
                                                <span class="bottomx"></span></span>
                                                  </a></td>';
                                              echo  '</tr>';
                                           }
                                      ?>
                                    </table>

                                 <?php
                                        //echo $this->pagination->create_links();
                                        echo "<br>".$links;
                                 ?>
                            	</div><!--end content_block-->

                                <!--
                                <?php include('template/ttemplate_dashboard');?>
                                -->

                        </div><!--end content-->
                      </div><!--end jquery tab-->
                    </div><!--end main-->

                    <?php include('template/tmenu.php') ?>

                     </div><!--end bg_wrapper-->

                <div id="footer">

                </div><!--end footer-->

        </div><!-- end top -->

<?php
    include ("template/tfooter.php");
    //$this->load->view("template\header");
?>
