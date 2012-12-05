
    <!-- Le styles -->
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }
      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>

    <?php

$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0'
);

$confirmation_code = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8
);

?>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="../asset/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../asset/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../asset/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../asset/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../asset/ico/apple-touch-icon-57-precomposed.png">

    <div class="container">
      <?=validation_errors() ?>
	      <form class="form-signin" action="<?php echo base_url().'auth/' ?>" method="POST">
	      	  <div id="topo">
	                <h1 class="logo">Login</h1>
	            </div>
	        <h2 class="form-signin-heading">Please sign in</h2>
	        <input type="text" name="username" class="input-block-level" placeholder="Username">
	        <input type="password" name="password" class="input-block-level" placeholder="Password">
	        <?php echo form_checkbox($remember);?> <?php echo form_label('Remember me', $remember['id']);?> 
			<?php echo anchor($this->dx_auth->forgot_password_uri, 'Forgot password');?> 
			<?php
				if ($this->dx_auth->allow_registration) {
					echo anchor($this->dx_auth->register_uri, 'Register');
				};
			?>
	        <button class="btn btn-large btn-primary" value="Submit"  name="login" type="submit">Logar</button>
	    	    <p>Copyright <?php echo date("Y"); ?> EGR<p>
	      </form>
    </div> <!-- /container -->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

