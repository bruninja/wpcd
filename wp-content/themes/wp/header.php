<!DOCTYPE html>

<html class="no-js" lang="pt-br">
<head><title><?php wp_title(''); ?></title>
<meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="Especializado em direito penal econômico, o escritório Charles Dias, mantém-se fiel ao compromisso de fazer da advocacia criminal uma missão social." />
<meta name="keywords" content="Charles Dias, Helder Mendes, advocacia criminal, direito penal, Charles Dias Advogador" />
<meta name="Bruno Carvalho" content="http://bruno.url.ph/" />
<link rel="icon" href="res/img/logo-ico.ico" />
<link rel="canonical" href="http://charlesdias.adv.br/" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/res/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/res/bootstrap/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/res/css/site.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/res/css/menu.css" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/res/script/jquery.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/res/bootstrap/script/bootstrap.min.js"></script>


<link rel="stylesheet" type="text/css" href="	<?php echo get_template_directory_uri(); ?>/res/css/banner.css">

</head>
<body>
	<div class="main">
			<div id="topo">
				<div class="container borda-bottom">
					<div class="pull-right">
						<span class="dados"><i class="fa fa-phone-square"></i>(98) 3199-1212 | (98) 3304-1211</span>
					</div>
				</div>
				<div id="menu">
					<div class="container">
						<div class="row">
							<div class="navbar-header">
								<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
									<img alt="Charle Dias Advogados" src="<?php echo get_template_directory_uri(); ?>/res/img/charles-dias.jpg" class="img-responsive logo" />
								</a>
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="fa fa-bars"></span>&nbsp;&nbsp;MENU
								</button>
							</div>
							<div class="navbar-collapse collapse">
								<ul id="menu-nav" class="nav navbar-nav navbar-right">
									<li><a href="<?php echo get_home_url(); ?>">HOME</a></li>
									<?php wp_list_pages( array( 'title_li' => '' ) ); ?>
									<li><a href="<?php echo get_template_directory_uri(); ?>/contato.html">CONTATO</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>
			</div>
