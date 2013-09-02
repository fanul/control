

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

                                    <form action="<?php if(strcmp($aksi,"add")==0)echo site_url('cDocument/confirmAdd'); else echo site_url('cDocument/confirmUpdate');?>" method="post" enctype="multipart/form-data">
                                        <!--
                                        <p>
                                            <label for="categori id">ID Kategori</label>
                                            <input class="input-small" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->cat_id; else echo""; ?>" name="cat_id" id="cat_id"/>
                                        </p> -->

                                         <?php
                                        //print_r($unit);
                                         if($this->session->userdata("unit_kerja")==9)
                                                 {
                                                 echo   '<p>';
                                                 echo   '    <label for="unit Kerja">Unit Kerja</label>';
                                                 echo   '    <select name="unit_id" id="unit_id" >';
                                                 echo   '        <option value="">Pilih Salah satu</option>';
                                                            foreach($unit as $row)
                                                             {
                                                                if($row->unit_id!=$tersangka[0]->unit_id)
                                                                    echo   '                <option value="'.$row->unit_id.'">'.$row->unit_nama.'</option>';
                                                                else
                                                                    echo   '                <option selected="selected" value="'.$row->unit_id.'">'.$row->unit_nama.'</option>';
                                                             }
                                                 echo   '    </select>';
                                                 echo   '</p>';
                                                 }
                                        ?>

                                        <?php
                                        //print_r($unit);
                                                 echo   '<p>';
                                                 echo   '    <label for="Kategori">Kategori</label>';
                                                 echo   '    <select name="cat_nama" id="cat_nama" >';
                                                 echo   '        <option value="">Pilih Salah satu</option>';
                                                            foreach($categori as $row)
                                                             {
                                                                if($row->cat_nama!=$tersangka[0]->cat_nama)
                                                                    echo   '                <option value="'.$row->cat_nama.'">'.$row->cat_nama.'</option>';
                                                                else
                                                                    echo   '                <option selected="selected" value="'.$row->cat_nama.'">'.$row->cat_nama.'</option>';
                                                             }
                                                 echo   '    </select>';
                                                 echo   '</p>';
                                        ?>


                                         <p>
                                            <label for="document nama">Nama Dokumen</label>
                                            <input class="input-medium" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->document_nama; else echo""; ?>" name="document_nama" id="document_nama"/>
                                        </p>
                                        <p>
                                            <label for="document nama">Kode Dokumen</label>
                                            <input class="input-medium" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->document_kode; else echo""; ?>" name="document_kode" id="document_kode"/>
                                        </p>
                                        <p>
                                            <label for="document file">Upload File</label>
                                            <input class="input-medium" type="file" <?php if($aksi=="edit") echo "disabled" ?> value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->document_kode; else echo""; ?>" name="file" id="file"/>
                                        </p>
                                        <p>
                                            <label for="document deskripsi">Deskripsi Kategori</label>
                                            <input class="input-big" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->document_deskripsi; else echo""; ?>" name="document_ket" id="document_ket"/>
                                        </p>
                                        <!--
                                        <p>
                                            <label for="document keyword">Keyword Dokumen</label>
                                            <input class="input-big" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->document_keyword; else echo""; ?>" name="document_keyword" id="document_keyword"/>
                                        </p>
                                        -->
                                        <p>
                                            <label for="document revisi">Revisi Dokumen ke</label>
                                            <input class="input-small" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->document_revisi; else echo""; ?>" name="document_revisi" id="document_revisi"/>
                                        </p>
                                        <p>
                                            <label for="document tahun">Tahun Dokumen</label>
                                            <input class="input-medium" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->document_tahun; else echo""; ?>" name="document_tahun" id="document_tahun"/>
                                        </p>
                                        <p>
                                            <label for="document tanggalsah">Tanggal Sah Dokumen</label>
                                            <input class="input-small flexy_datepicker_input" type="text" value="<?php if(strcmp($aksi,"edit")==0) echo $tersangka[0]->document_tanggalsah; else echo"__/__/____"; ?>" name="document_tanggalsah" id="kar_tanggalnikah"/>
                                        </p>
                                        <p class="clearboth">
                                            <input class="button" name="submit" type="submit" value="Submit"/>
                                        </p>
                                      <?php
                                        if($aksi=="edit")
                                            {
                                            echo '<input type="hidden" name="document_id" id="document_id" value="'.$tersangka[0]->document_id.'">';
                                        }
                                      ?>
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
