<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Bruno Carvalho(http://bruno.url.ph/">

	<title><?php wp_title(''); ?></title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" style="background-color: #373435; padding-top: 10px; border-bottom: #373435;">
		<div class="container">

			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<img class="img-responsive" src="<?php echo home_url('/'); ?>wp-content/themes/charles-dias/assets/images/logo_pb.png" alt="" />

				<center>

					<!-- <a class="navbar-brand" href="<?php echo home_url('/'); ?>" style="font-family: 'Cinzel', serif; font-weight: 900; font-size: xx-large;">Charles Dias</a>
					<br>
					<a style="font-family: 'Cinzel', serif; font-weight: 900; color: #FFD700; font-size: large; text-decoration: none;" href="#">Advogados Associados</a>
				 -->
				</center>
			</div>
			<div class="col-md-1"></div>

			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="http://charlesdias.adv.br/">Home</a></li>
					<li><a href="http://charlesdias.adv.br/apresentacao/">Apresentação</a></li>
					<li><a href="http://charlesdias.adv.br/advogados/">Advogados</a></li>
					<li><a class="btn" href=""><i class="fa fa-phone-square" aria-hidden="true"></i> (98) 3199-1212 | (98) 3304-1211</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->
