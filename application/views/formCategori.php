

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

                                   <?php

                                        if(isset($unit_id) && $unit_id!=null)
                                            $action = "cCategori/confirmAdd/".$unit_id;
                                        else
                                            $action = "cCategori/confirmAdd";
                                        
                                        if(isset($cat_id))
                                        $action2 = "cCategori/confirmUpdate/".$cat_id;

                                        //print_r($tersangka);
                                   ?>
                                    <form method="post" action="<?php if(strcmp($aksi,"add")==0)echo site_url($action); else echo site_url($action2);?>">
                                        <!--
                                        <p>
                                            <label for="categori id">ID Kategori</label>
                                            <input class="input-small" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->cat_id; else echo""; ?>" name="cat_id" id="cat_id"/>
                                        </p> -->
                                         <p>
                                            <label for="categori nama">Nama Kategori</label>
                                            <input class="input-medium" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->cat_nama; else echo""; ?>" name="cat_nama" id="cat_nama"/>
                                        </p>
                                        <p>
                                            <label for="categori keterangan">Keterangan Kategori</label>
                                            <input class="input-big" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->cat_keterangan; else echo""; ?>" name="cat_keterangan" id="cat_keterangan"/>
                                        </p>

                                         <?php
                                        //print_r($unit);
                                        if(!isset($unit_id)) $unit_id = null;
                                        if($unit_id==null)
                                            {
                                                 echo   '<p>';
                                                 echo   '    <label for="unitkerja">Unit Kerja</label>';
                                                 echo   '    <select name="unitkerja" id="unitkerja" >';
                                                 echo   '        <option value="">Pilih Salah satu</option>';
                                                            foreach($unit as $row)
                                                             {
                                                                if($tersangka[0]->unit_id != $row->unit_id)
                                                                    echo   '                <option value="'.$row->unit_id.'">'.$row->unit_nama.'</option>';
                                                                else
                                                                    echo   '                <option selected="selected" value="'.$row->unit_id.'">'.$row->unit_nama.'</option>';
                                                             }
                                                 echo   '    </select>';
                                                 echo   '</p>';
                                            }
                                        ?>

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
