

<?php
    //pengecekkan session
    include ("template/theader.php");
    //$this->load->view("template\header");
?>

<body>
<script type="text/javascript" src="<?php echo base_url(); ?>src/js/ajaxcariuser.js"></script>
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

                                        if($this->session->flashdata('sukses')!=null)
                                            {
                                            //echo $this->session->flashdata('sukses');
                                            if($this->session->flashdata('sukses')==1)
                                                {
                                                    echo '<div class="message success">';
                                                    echo '   <p><strong>Data Ditemukan!</strong></p>';
                                                    echo '</div><!-- end success -->';
                                            }
                                            else
                                                {
                                                    echo '<div class="message error">';
                                                    echo '    <p><strong>Data Tidak Ditemukan!</strong></p>';
                                                    echo '</div><!-- end error  -->';
                                            }
                                        }
                                        if($this->session->flashdata('key')!=null)
                                        $key = $this->session->flashdata('key');
                                    ?>

                                  
                        
                                        <p>
                                            <label for="categori id">Masukkan yang ingin di cari</label>
                                            <input class="input-small" type="text" value="<?php if(isset($key)) echo $key; ?>" name="boxcari" id="boxcari"/>
                                        </p>
                                       
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

                                <div id="listini">
                            <?php
                                if($this->session->flashdata("sukses")!=null)
                                  include ('content\cariuserdetail.php');
                            ?>
                                </div>
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
