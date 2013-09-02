

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

                                <div class="content_block">
                                    <h2 class="jquery_tab_title"><?php echo $judul; ?></h2>

                                    <?php
                                    //print_r($query);
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

                                    <form method="post" action="<?php if(strcmp($aksi,"add")==0)echo site_url('cMasterkompetensi/confirmAdd'); else echo site_url('cMasterkompetensi/confirmUpdate');?>">
                                        <p>
                                            <label for="unit nama">Nama Master Kompetensi</label>
                                            <input class="input-medium" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->maskom_nama; else echo""; ?>" name="maskom_nama" id="maskom_nama"/>
                                        </p>

                                         <?php if($aksi=="edit"){ ?>
                                        <input type="hidden" name="maskom_id" value="<?php echo $tersangka[0]->maskom_id; ?>">
                                         <?php } ?>
                                        <p class="clearboth">
                                            <input class="button" name="submit" type="submit" value="Submit"/>
                                        </p>

                                    </form>
                                         </div><!--end content_block-->
                                    <!--
                                        <?php include ('template/ttemplate_kotakdash'); ?>
                                    -->

                                   <!--
                                       <?php include ('template/ttemplate_info');?>
                                   -->
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
