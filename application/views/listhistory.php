

<?php
    //pengecekkan session
    include ("template/theader.php");
    //$this->load->view("template\header");
?>

<body>
            <script type="text/javascript" src="<?php echo base_url(); ?>src/js/ajaxHistory.js"></script>
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

                                     <?php

//                                        print_r($unit);
//                                        if(isset($unit))
//                                            {
//                                                 echo   '<p>';
//                                                 echo   '    <label for="unitkerja">Filter berdasar unit kerja</label>';
//                                                 echo   '    <select name="unitkerja" id="unitkerja" >';
//                                                 echo   '        <option value="-999">Tampilkan semua</option>';
//                                                            foreach($unit as $row)
//                                                             {
//                                                 echo   '                <option value="'.$row->unit_id.'">'.$row->unit_nama.'</option>';
//                                                             }
//                                                 echo   '    </select>';
//                                                 echo   '</p>';
//                                            }
                                        ?>

                                     <p>

                                         <label for="filter">Filter List</label>
                                         <select name="filter" id="filter">
                                             <option value="-999">tampilkan semua</option>
                                             <option value="1">berdasar user</option>
                                             <option value="2">berdasar dokumen</option>
                                         </select>
                                         <input type="text" class="input-small" id="textfilter">

                                     </p>


                                     <div id="listini">
                                     <?php include ('content/listhistory.php') ?>
                                     </div>

                            	</div><!--end content_block-->
                                <div class="content_block" id="listitu">

                                </div>
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
