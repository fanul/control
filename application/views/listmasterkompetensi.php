

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
                                    <caption>Daftar Master Kompetensi</caption>
                                      <tr>
                                        <th>Master Kompetensi ID</th>
                                        <th>Master Kompetensi Nama</th>
                                        <th>Aksi</th>
                                      </tr>

                                      <?php
                                           //print_r($query);
                                      if($query!=null)
                                          {
                                           foreach($query as $row)
                                           {
                                              echo  '<tr>';
                                              echo  '<td>'.$row->maskom_id.'</td>';
                                              echo  '<td>'.$row->maskom_nama.'</td>';
//                                              echo  '<td><a href="'.site_url().'/cMasterkompetensi/doDelete/'.$row->maskom_id.'">hapus</a> |';
//                                              echo  '<a href="'.site_url().'/cMasterkompetensi/doEdit/'.$row->maskom_id.'">edit</a> | ';
                                              echo  '<td><a class="ttx" href="'.site_url().'/cMasterkompetensi/doDelete/'.$row->maskom_id.'"><img src="'.base_url()."src/cicon/delete.png".'" alt="Hapus">
                                                <span class="tooltipx"><span class="topx"></span>
                                                <span class="middlex">Tekan Gambar ini Untuk Mengedit master kompetensi '.$row->maskom_nama.'</span>
                                                <span class="bottomx"></span></span>
                                                </a>';
                                             echo  '<a class="ttx" href="'.site_url().'/cMasterkompetensi/doEdit/'.$row->maskom_id.'"><img src="'.base_url()."src/cicon/edit.png".'" alt="Hapus">
                                                <span class="tooltipx"><span class="topx"></span>
                                                <span class="middlex">Tekan Gambar ini untuk mengedit master kompetensi '.$row->maskom_nama.'</span>
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
