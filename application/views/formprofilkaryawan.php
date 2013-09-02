

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

                                    <form method="post" action="<?php if(strcmp($aksi,"add")==0)echo site_url('cProfilkaryawan/confirmAdd'); else echo site_url('cProfilkaryawan/confirmUpdate');?>" enctype="multipart/form-data">
                                        <p>
                                            <label for="nik">NIK Karyawan</label>
                                            <input <?php if(strcmp($aksi,"add")!=0 && $this->session->userdata("unit_kerja")!=1) echo 'disabled'; ?> class="input-small" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->kar_nik; else if(strcmp($aksi, "mypro")==0) echo $this->session->userdata("kar_nik"); else echo""; ?>" name="kar_nik" id="kar_nik"/>
                                            <?php
                                            if(strcmp($aksi,"edit")==0)
                                                {
                                                 $kranz = $tersangka[0]->kar_nik;
                                                 echo '<input type="hidden" value="'.$tersangka[0]->kar_nik.'" name="kar_nik" id="kar_nik">';
                                                }
                                            else if(strcmp($aksi,"mypro")==0)
                                                {
                                                $kranz = $this->session->userdata("kar_nik");
                                                 echo '<input type="hidden" value="'.$this->session->userdata("kar_nik").'" name="kar_nik" id="kar_nik">';
                                                }
                                            ?>

                                        </p>

                                        <!-- nama lengkap -->
                                        <p>
                                            <label for="nama">Nama Lengkap Karyawan</label>
                                            <input class="input-medium" type="text" value="<?php if(strcmp($aksi,"add")!=0) echo $tersangka[0]->kar_namalengkap; else echo""; ?>" name="kar_namalengkap" id="kar_namalengkap"/>
                                        </p>

                                        <!-- foto -->
                                        <p>
                                            <label for="document file">Upload File</label>
                                            <input class="input-medium" type="file" <?php if($aksi=="edit" && $this->session->userdata('unit_kerja')!=1) echo "disabled" ?> value="<?php if(strcmp($aksi,"edit")==0) echo "hehe"; else echo""; ?>" name="file" id="file"/>
                                        </p>

                                        <!-- Kelamin optio -->
                                        <p>
                                            <label for="radiobutton1" class="inline">Laki-Laki</label>
                                            <input id="radiobutton1" name="radiobutton" type="radio" value="L" class="jquery_improved" <?php if($tersangka[0]->kar_kelamin=='L' && $aksi=="edit") echo 'checked="checked"'; else if($aksi!="edit") echo 'checked="checked"';?>/>

                                            <label for="radiobutton2" class="inline">Perempuan</label>
                                            <input id="radiobutton2" name="radiobutton" type="radio" value="P" class="jquery_improved"  <?php if($tersangka[0]->kar_kelamin=='P' && $aksi=="edit") echo 'checked="checked"';?>/>
                                        </p>

                                        <!-- tempat lahir -->
                                        <p>
                                            <label for="nama">Tempat Lahir Karyawan</label>
                                            <input class="input-medium" type="text" value="<?php if(strcmp($aksi,"add")!=0) echo $tersangka[0]->kar_tempatlahir; else echo""; ?>" name="kar_tempatlahir" id="kar_tempatlahir"/>
                                        </p>
                                        
                                        <!-- tanggal lahir -->
                                        <p>
                                            <label for="masuk kerja">Tanggal lahir Karyawan</label>
                                            <input class="input-small flexy_datepicker_input" type="text" value="<?php if(strcmp($aksi,"add")!=0) echo $tersangka[0]->kar_tanggallahir; else echo"__/__/____"; ?>" name="kar_tanggallahir" id="kar_tanggallahir"/>
                                        </p>

                                        <!-- masuk kerja -->
                                        <p>
                                            <label for="masuk kerja">Tanggal Masuk Kerja Karyawan</label>
                                            <input class="input-small flexy_datepicker_input" type="text" value="<?php if(strcmp($aksi,"add")!=0) echo $tersangka[0]->kar_masukkerja; else echo"__/__/____"; ?>" name="kar_masukkerja" id="kar_masukkerja"/>
                                        </p>

                                        <!-- pensiun -->
                                        <p>
                                            <label for="pensiun">Tanggal Pensiun Karyawan</label>
                                            <input class="input-small flexy_datepicker_input" type="text" value="<?php if(strcmp($aksi,"add")!=0) echo $tersangka[0]->kar_tanggalpensiun; else echo"__/__/____"; ?>" name="kar_tanggalpensiun" id="kar_tanggalpensiun"/>
                                        </p>

                                        <!-- nama pasangan -->
                                        <p>
                                            <label for="nama">Nama Pasangan Karyawan</label>
                                            <input class="input-medium" type="text" value="<?php if(strcmp($aksi,"add")!=0) echo $tersangka[0]->kar_namapasangan; else echo""; ?>" name="kar_namapasangan" id="kar_namapasangan"/>
                                        </p>

                                        <!-- tempat lahir pasangan -->
                                        <p>
                                            <label for="nama">Tempat Lahir Pasangan Karyawan</label>
                                            <input class="input-medium" type="text" value="<?php if(strcmp($aksi,"add")!=0) echo $tersangka[0]->kar_tempatlahirpasangan; else echo""; ?>" name="kar_tempatlahirpasangan" id="kar_namapasangan"/>
                                        </p>

                                        <!-- tanggal lahir pasangan -->
                                        <p>
                                            <label for="masuk kerja">Tanggal Lahir Pasangan Karyawan</label>
                                            <input class="input-small flexy_datepicker_input" type="text" value="<?php if(strcmp($aksi,"add")!=0) echo $tersangka[0]->kar_tanggallahirpasangan; else echo"__/__/____"; ?>" name="kar_tanggallahirpasangan" id="kar_tanggallahirpasangan"/>
                                        </p>

                                        <!-- tanggal nikah -->
                                        <p>
                                            <label for="masuk kerja">Tanggal Menikah Karyawan</label>
                                            <input class="input-small flexy_datepicker_input" type="text" value="<?php if(strcmp($aksi,"add")!=0) echo $tersangka[0]->kar_tanggalnikah; else echo"__/__/____"; ?>" name="kar_tanggalnikah" id="kar_tanggalnikah"/>
                                        </p>

                                        <!-- alamat-->
                                        <p>
                                            <label for="nama">Alamat Karyawan</label>
                                            <input class="input-medium" type="text" value="<?php if(strcmp($aksi,"add")!=0) echo $tersangka[0]->kar_alamat; else echo""; ?>" name="kar_alamat" id="kar_alamat"/>
                                        </p>

                                         <!-- pendidikan -->
                                        <p>
                                            <label for="nama">Pendidikan Akhir Karyawan</label>
                                            <input class="input-medium" type="text" value="<?php if(strcmp($aksi,"add")!=0) echo $tersangka[0]->kar_pendidikanakhir; else echo""; ?>" name="kar_pendidikanakhir" id="kar_pendidikanakhir"/>
                                        </p>

                                        <!-- jabatan -->
                                         <?php
                                        //print_r($jabatan);
                                             echo   '<p>';
                                             echo   '    <label for="jabatan">Jabatan Karyawan</label>';
                                             if($this->session->userdata('unit_kerja')==1)
                                                echo   '    <select name="jabatan" id="jabatan" >';
                                             else
                                                 echo   '    <select disabled name="jabatan" id="jabatan" >';
                                             echo   '        <option value="">Pilih Salah satu</option>';
                                                        foreach($jabatan as $row)
                                                         {
                                                            if($aksi=="edit")
                                                                echo   '        <option selected="selected" value="'.$row->jabatan_id.'">'.$row->jabatan_nama.'</option>';
                                                            else
                                                                echo   '        <option value="'.$row->jabatan_id.'">'.$row->jabatan_nama.'</option>';
                                                         }
                                             echo   '    </select>';
                                             echo   '</p>';
                                        ?>

                                        <!-- gaji pokok -->
                                        <p>
                                        <label for="nik">Gaji Pokok Karyawan</label>
                                            <input <?php if(strcmp($aksi,"add")!=0 && $this->session->userdata("unit_kerja")!=1) echo 'disabled'; ?> class="input-small" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->kar_gajipokok; else if(strcmp($aksi, "mypro")==0) echo $tersangka[0]->kar_gajipokok; else echo""; ?>" name="kar_gajipokok" id="kar_gajipokok"/>
                                        </p>

                                        <!-- gaji pensiun -->
                                        <p>
                                        <label for="nik">Gaji Pensiun Karyawan</label>
                                            <input <?php if(strcmp($aksi,"add")!=0 && $this->session->userdata("unit_kerja")!=1) echo 'disabled'; ?> class="input-small" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->kar_gajipensiun; else if(strcmp($aksi, "mypro")==0) echo $tersangka[0]->kar_gajipensiun; else echo""; ?>" name="kar_gajipensiun" id="kar_gajipensiun"/>
                                        </p>


                                        <?php
                                        //print_r($unit);
                                        if($aksi!="mypro" && $this->session->userdata('kar_nik')==1)
                                            {
                                                 echo   '<p>';
                                                 echo   '    <label for="unitkerja">Unit Kerja</label>';
                                                 echo   '    <select name="unitkerja" id="unitkerja" >';
                                                 echo   '        <option value="">Pilih Salah satu</option>';
                                                            foreach($unit as $row)
                                                             {
                                                                if($row->unit_id == $unitx)
                                                                    echo   '                <option  selected="selected"  value="'.$row->unit_id.'">'.$row->unit_nama.'</option>';
                                                                else
                                                                    echo   '                <option value="'.$row->unit_id.'">'.$row->unit_nama.'</option>';
                                                             }
                                                 echo   '    </select>';
                                                 echo   '</p>';
                                            }
                                        ?>

                                        
                                        <p class="clearboth">
                                            <input class="button" name="submit" type="submit" value="Submit"/>
                                        </p>

                                    </form>

                                    <?php include ('content/listanak.php'); ?>
                                    <?php if($this->session->userdata('unit_kerja')==1)include ('content/listkompetensiambil.php'); ?>
                                    <br>
                                    <!-- <a href="<?php $linx = 'cAnak/doAdd/'.$kranz; echo site_url($linx)  ?>">Tambah Anak</a> -->
                                    <a class="ttx" href="<?php $linx = 'cAnak/doAdd/'.$kranz; echo site_url($linx)  ?>"><img src="<?php echo base_url()."src/cicon/anak_add.png"; ?>">
                                                <span class="tooltipx"><span class="topx"></span>
                                                <span class="middlex">Tambah anak</span>
                                                <span class="bottomx"></span></span>
                                                </a>
                                    <?php
                                    $linx = 'cTambahkompetensi/doAdd/'.$kranz;
                                    if($this->session->userdata('unit_kerja')==1)
//                                    echo '<a href="'.site_url($linx).'">Tambah Kompetensi</a>';
                                    echo  '<a class="ttx" href="'.site_url($linx).'"><img src="'.base_url()."src/cicon/kom_add.png".'" alt="Hapus">
                                                <span class="tooltipx"><span class="topx"></span>
                                                <span class="middlex">Tambah Kompetensi</span>
                                                <span class="bottomx"></span></span>
                                                </a>';
                                    ?>
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
