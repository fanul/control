<div id="sidebar">
                            <ul class="nav">
                                  <li><a class="headitem item0">Menu</a>
                                      <ul></ul>
                                  </li>

                                <?php
                                    if($this->session->userdata("kar_nik")==1)
                                    {
                                       include ('tmenuadmin.php');
//                                         echo '<li><a class="headitem item5" href="#">control</a>';
//                                         echo '  <ul>';
//                                         echo '      <li><a href="'.site_url('cUnitKerja/index').'">Browse Unit Kerja</a></li>';
//                                         echo '       <li><a href="'.site_url('cUnitKerja/doAdd').'">Add Unit Kerja</a></li>';
//                                         echo '       <li><a href="'.site_url('cCategori/index').'">Browse Kategori</a></li>';
//                                         echo '       <li><a href="'.site_url('cCategori/doAdd').'">Add Kategori</a></li>';
//                                         echo '   </ul>';
//                                         echo '</li>';
                                    }
                                ?>
                                <li><a class="headitem item1" href="#">Karyawan</a>
                                    <ul>
                                <?php
                                if($this->session->userdata('unit_kerja')==1)
                                        {
                                            //echo '<li><a class="headitem item1" href="#">User</a>';
                                            //echo '  <!-- <ul class="opened"><!-- ul items without this class get hiddden by jquery-->';
                                            //echo '    <ul>';
                                            echo '    <li><a href='.site_url('cKaryawan/index').'>Browse karyawan</a></li>';
                                            echo '    <li><a href="'.site_url('cKaryawan/doAdd').'">Add karyawan</a></li>';
                                            //echo '    <li><a href="'.site_url('cKaryawan/doEdit').'">My Profile</a></li>';
                                            //echo '    </ul>';
                                            //echo '</li>';
                                        }

                                ?>
                                <li><a href="<?php echo site_url('cKaryawan/doEdit'); ?>">Login Setting</a></li>
                                <li><a href="<?php echo site_url('cProfilkaryawan/doEdit'); ?>">My Profile</a></li>
                                    </ul>
                                </li>
                                <li><a class="headitem item4" href="#">Document</a>
                                    <ul>
                                    <li><a href="<?php echo base_url(); ?>">Browse Document</a></li>
                                    <?php

                                        if($this->session->userdata('unit_kerja')!=1)
                                                {
                                            echo '<li><a href="'. site_url('cDocument/doAdd').'">Add Document</a></li>';
                                        }

                                    ?>
                                    
                                    </ul>
                                </li>
                                <li><a class="headitem item5" href="#">Pencarian</a>
                                    <ul>
                                        <li><a href="<?php echo site_url('cCariUser'); ?>">Cari Data Karyawan</a></li>
                                    <li><a href="<?php echo site_url('cCaridocument'); ?>">Cari Document</a></li>
                                    </ul>
                                </li>
                            </ul><!--end subnav-->

                            <!--
                                <?php include ('ttemplate_otherside');?>
                            -->
                          

                        </div><!--end sidebar-->
