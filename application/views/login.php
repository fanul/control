<?php
    include ("template/theader.php");
    //$this->load->view("template\header");
?>

<body class="nobackground">
        <div id="login">
        	<h1 class="logo">
            	<a href="">flexy - adjustable admin skin</a>
            </h1>
            <h2 class="loginheading">Login</h2>
            <div class="icon_login ie6fix"></div>

        	<form id="login-form" action="<?php echo site_url('cLogin/doLogin') ?>" method="post">
            <p>
            	<label for="name">Username</label>
            	<input class="input-medium" type="text" value="" name="kar_nama" id="kar_nama"/>
        	</p>
        	<p>
            	<label for="password">Password</label>
            	<input class="input-medium" type="password" value="" name="kar_pass" id="kar_pass"/>
        	</p>

                <!--
        	<p class="remember">
            	<label for="checkbox1" class="inline">Remember me?</label>
            	<input type="checkbox" value="1" name="checkbox1" id="checkbox1" />


        	</p>
        	<div class="forgot_pw"><a href="index.html">Forgot password?</a></div>
                -->
        	<p class="clearboth">
            	<input class="button" name="submit" type="submit" value="Login"/>
        	</p>
            </form>
        </div>

    <?php
        if(isset ($error))
            {
                echo '<div class="login_message message error">';
                echo '<p>'.$error.'</p>';
                echo '</div>';
            }
    ?>

<?php
    include ("template/tfooter.php");
    //$this->load->view("template\footer");
?>
