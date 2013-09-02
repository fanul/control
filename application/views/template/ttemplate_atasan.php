<!-- this is the content for the dialog that pops up on window start 
    	<div id="dialog" title="Welcome to flexy admin">
       	<p>Hello <?php echo $this->session->userdata('nama'); ?>  selamat beraktifitas.<br/> You got <strong>1 new Message</strong> in your inbox</p>
        <p>This is a messagebox, you can fill it with content of your choice ;)</p>
        </div>
-->

        <div id="top">
            <div id="head">
                <div id="banner">

                    <object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=4,0,2,0' width=100% height=90>
                    <param name='movie' value='http://localhost/web/control/src/images/banner.swf'>
                    <param name='quality' value='high'>
                    <param name='wmode' value='transparent'>
                    <param name='scale' value='exactfit'>
                    <embed src='http://localhost/web/control/src/images/banner.swf' width=100% height=100% scale='exactfit' quality='high' pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash' wmode='transparent'>
                    </embed>
                    </object>

                </div>
                <!--
            	<h1 class="logo">
                	<a href="">flexy - adjustable admin skin</a>
                </h1>
                -->
                
                <div class="head_memberinfo">
                    <!--
                	<div class="head_memberinfo_logo">
                    	<span>1</span>
                        <img src="<?php echo base_url(); ?>src/images/unreadmail.png" alt=""/>
                    </div>
                    -->

                    <span class='memberinfo_span'>
                   	Selamat Datang <?php echo $this->session->userdata('kar_nama'); ?>
                    </span>

                    <!--
                    <span class='memberinfo_span'>
                    	<a href="">Settings</a>
                    </span>
                    -->

                    <span>
                        <a href="<?php echo site_url('cLogin/doLogout'); ?>">logout</a>
                    </span>

                    <!--
                    <span class='memberinfo_span2'>
                    	<a href="">1 Private Message recieved</a>
                    </span>
                    -->
                </div><!--end head_memberinfo-->

            </div><!--end head-->