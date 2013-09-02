

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

                            		<table id="table_liquid" cellspacing="0">
                                    <caption>Daftar Unit Kerja</caption>
                                      <tr>
                                        <th>Unit ID</th>
                                        <th>Unit Nama</th>
                                        <th>Unit Folder</th>
                                        <th>Aksi</th>
                                      </tr>

                                      <?php
                                           //print_r($query);
                                           foreach($query as $row)
                                           {
                                              echo  '<tr>';
                                              echo  '<td>'.$row->unit_id.'</td>';
                                              echo  '<td>'.$row->unit_nama.'</td>';
                                              echo  '<td>'.$row->unit_folder.'</td>';
                                              echo  '<td><a class="ttx" href="'.site_url().'/cUnitKerja/doDelete/'.$row->unit_id.'"><img src="'.base_url()."src/cicon/delete.png".'">
                                                   <span class="tooltipx"><span class="topx"></span>
                                                   <span class="middlex">Tekan Gambar ini Untuk Menghapus Unit kerja '.$row->unit_nama.'</span>
                                                   <span class="bottomx"></span></span>
                                                    </a>';
                                              echo  '<a class="ttx" href="'.site_url().'/cUnitKerja/doEdit/'.$row->unit_id.'"><img src="'.base_url()."src/cicon/edit.png".'" alt="Hapus">
                                                <span class="tooltipx"><span class="topx"></span>
                                                <span class="middlex">Tekan Gambar ini Untuk Mengedit Unit kerja '.$row->unit_nama.'</span>
                                                <span class="bottomx"></span></span>
                                                </a>';
                                              echo  '<a class="ttx" href="'.site_url().'/cCategori/doAdd/'.$row->unit_id.'"><img src="'.base_url()."src/cicon/application_add.png".'" alt="Hapus">
                                                <span class="tooltipx"><span class="topx"></span>
                                                <span class="middlex">Tekan Gambar ini Untuk Menambah Kategori dalam Unit kerja '.$row->unit_nama.'</span>
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
