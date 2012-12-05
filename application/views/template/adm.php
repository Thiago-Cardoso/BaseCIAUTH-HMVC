<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Pragma" content="no-cache" />
<meta name="robots" content="noindex,nofollow" />
<title><?php echo lang('sistema') . ($titulo? ' &raquo; ' . strip_tags($titulo):''); ?></title>
<link rel="shortcut icon" href="<?php echo base_url() . $this->config->item('imagens'); ?>favicon.ico" />

<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() . $this->config->item('css'); ?>style.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() . $this->config->item('css'); ?>bootstrap.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() . $this->config->item('css'); ?>bootstrap-responsive.css" />

<?php print($_styles) ?>

<script type="text/javascript"> var baseurl = '<?php echo base_url(); ?>';</script>
<script type="text/javascript" src="<?php echo base_url() . $this->config->item('js'); ?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . $this->config->item('js'); ?>jquery.js"></script>
<?php print($_scripts) ?>
<link href="http://bootsnipp.com/bundles/bootstrapper/css/bootstrap.min.css" media="all" type="text/css" rel="stylesheet">
<link href="http://bootsnipp.com/bundles/bootstrapper/css/nav-fix.css" media="all" type="text/css" rel="stylesheet">
<link href="http://bootsnipp.com/bundles/bootstrapper/css/bootstrap-responsive.min.css" media="all" type="text/css" rel="stylesheet">
<link href="http://bootsnipp.com/css/prettify.css" media="all" type="text/css" rel="stylesheet">
<link href="http://bootsnipp.com/css/bootsnipp.css" media="all" type="text/css" rel="stylesheet">
<link href="http://bootsnipp.com/css/codemirror.css" media="all" type="text/css" rel="stylesheet">
<link href="http://bootsnipp.com/css/jackedup.css" media=2"all" type="text/css" rel="stylesheet">
<script src="http://bootsnipp.com/bundles/bootstrapper/js/jquery-1.8.1.min.js"></script>
<script src="http://bootsnipp.com/bundles/bootstrapper/js/bootstrap.min.js"></script>
<script src="http://bootsnipp.com/js/prettify.js"></script>
<script src="http://bootsnipp.com/js/codemirror.js"></script>
<script src="http://bootsnipp.com/js/humane.min.js"></script>
</head>
<body>
    <div id="content">
      <?php if($titulo): ?><h1 class="titulo"><?php echo $titulo; ?></h1><?php endif; ?>
      <div class="navbar navbar-inverse nav">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="/">EGR</a>
            <div class="nav-collapse collapse">
              <ul class="nav">
                  <li class="divider-vertical"></li>
                  <li><a href="<?php echo base_url(); ?>member"><i class="icon-home icon-white"></i> Home</a></li>
                    <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Grupo <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>grupo">Cadastrar</a></li>
                        <li><a href="<?php echo base_url(); ?>grupo/listar_sel">Listar/Editar</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="nav-header"></li>
                        <li><a href="#"></a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                    cameraveradoressinimbu
                </li>-->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuários <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>auth/register">Cadastrar</a></li>
                        <li><a href="<?php echo base_url(); ?>#">Listar/Editar</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="nav-header">Other</li>
                        <li><a href="#">Cadastrar</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configurações <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>backend/users">Usuarios</a></li>
                        <li><a href="<?php echo base_url(); ?>backend/roles">Grupos</a></li>
                        <li><a href="<?php echo base_url(); ?>backend/uri_permissions">Permissões URL</a></li>
                        <li><a href="<?php echo base_url(); ?>backend/custom_permissions">Custom Permissões</a></li>
                        <!--<li><a href="<?php echo base_url(); ?>usuario/">Email Ativados</a></li>-->
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="nav-header">Other</li>
                        <li><a href="#">Cadastrar</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
              </ul>
              <div class="pull-right">
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $this->session->userdata('name')?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/user/preferences"><i class="icon-cog"></i> Preferences</a></li>
                            <li><a href="/help/support"><i class="icon-envelope"></i> Contact Support</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>/auth/logout"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
              </div>
            </div>
        </div>
    </div>
   </div>
      <div id="caixa-conteudo" class="bordas">
           <?php echo $conteudo; #Conteúdo da Página ?>        
      </div>
    </div>
    <div id="rodape">
        <p>Copyright <?php echo date("Y"); ?> PHP<p>
    </div>
</body>
</html>
