<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Pragma" content="no-cache" />
<meta name="robots" content="noindex,nofollow" />
<title><?php echo lang('sistema'). ($titulo? ' &raquo; ' . strip_tags($titulo):''); ?></title>
<link rel="shortcut icon" href="<?php echo base_url() . $this->config->item('imagens'); ?>favicon.ico" />
<?php print($_styles) ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() . $this->config->item('css'); ?>style.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() . $this->config->item('css'); ?>bootstrap.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() . $this->config->item('css'); ?>bootstrap-responsive.css" />

<?php print($_styles) ?>

<script type="text/javascript"> var baseurl = '<?php echo base_url(); ?>';</script>
<script type="text/javascript" src="<?php echo base_url() . $this->config->item('js'); ?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . $this->config->item('js'); ?>jquery.js"></script>

<?php print($_scripts) ?>
</head>
<body>
	<div id="geral">
            <div id="conteudo">
                <div id="sombra">
                    <div id="caixa-conteudo" class="bordas">
                        <?php echo $conteudo; #Conteúdo da Página ?>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
