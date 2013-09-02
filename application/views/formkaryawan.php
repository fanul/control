

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

                                    <form method="post" action="<?php if(strcmp($aksi,"add")==0)echo site_url('cKaryawan/confirmAdd'); else echo site_url('cKaryawan/confirmUpdate');?>">
                                        <p>
                                        <marquee width="500px">Jika password tidak diisi default password adalah "petronika"</marquee>
                                        </p>
                                        <p>
                                            <label for="nik">NIK Karyawan</label>
                                            <input <?php if(strcmp($aksi,"add")!=0 && $this->session->userdata("unit_kerja")!=1) echo 'disabled'; ?> class="input-small" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->kar_nik; else if(strcmp($aksi, "mypro")==0) echo $this->session->userdata("kar_nik"); else echo""; ?>" name="kar_nik" id="kar_nik"/>
                                            <?php
                                            if(strcmp($aksi,"edit")==0)
                                                 echo '<input type="hidden" value="'.$tersangka[0]->kar_nik.'" name="kar_nik" id="kar_nik">';
                                            else if(strcmp($aksi,"mypro")==0)
                                                 echo '<input type="hidden" value="'.$this->session->userdata("kar_nik").'" name="kar_nik" id="kar_nik">';
                                            ?>

                                        </p>

                                        <!-- nama login -->
                                        <p>
                                            <label for="nama">Nama Login Karyawan</label>
                                            <input class="input-medium" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->kar_nama; else if(strcmp($aksi, "mypro")==0) echo $this->session->userdata("kar_nama"); else echo""; ?>" name="kar_nama" id="kar_nama"/>
                                        </p>
                                        
                                        <?php
                                        if($aksi=="mypro")
                                            {
                                                echo '<p>';
                                                echo '   <label for="nama">Password</label>';
                                                echo '    <input class="input-medium" type="password" name="kar_pass" id="kar_pass"/>';
                                                echo '</p>';
                                            }
                                        ?>

                                        <?php
                                        //print_r($unit);
                                        //print_r($tersangka);
                                        if($aksi!="mypro" && $this->session->userdata('kar_nik')==1)
                                            {
                                                 echo   '<p>';
                                                 echo   '    <label for="unitkerja">Unit Kerja</label>';
                                                 echo   '    <select name="unitkerja" id="unitkerja" >';
                                                 echo   '        <option value="">Pilih Salah satu</option>';
                                                            foreach($unit as $row)
                                                             {
                                                                if($tersangka[0]->unit_id!=$row->unit_id)
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
