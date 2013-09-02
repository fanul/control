

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

                                    <form method="post" action="<?php if(strcmp($aksi,"add")==0)echo site_url('cKompetensi/confirmAdd'); else echo site_url('cKompetensi/confirmUpdate');?>">
                                        
                                         <?php
                                        //print_r($unit);
                                        if($masterkompetensi!=null)
                                            {
                                                 echo   '<p>';
                                                 echo   '    <label for="master kompetensi">Master Kompetensi</label>';
                                                 echo   '    <select name="maskom_id" id="maskom_id" >';
                                                 echo   '        <option value="">Pilih Salah satu</option>';
                                                            foreach($masterkompetensi as $row)
                                                             {
                                                                if($row->maskom_id==$tersangka[0]->maskom_id)
                                                                    echo   ' <option selected="selected" value="'.$row->maskom_id.'">'.$row->maskom_nama.'</option>';
                                                                else
                                                                    echo   ' <option value="'.$row->maskom_id.'">'.$row->maskom_nama.'</option>';
                                                             }
                                                 echo   '    </select>';
                                                 echo   '</p>';
                                            }
                                        ?>

                                        <p>
                                            <label for="nama kompetensi">Nama Kompetensi</label>
                                            <input class="input-medium" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->kompetensi_nama; else echo""; ?>" name="kompetensi_nama" id="kompetensi_nama"/>
                                        </p>

                                        
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
