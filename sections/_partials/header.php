<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $config['base_title']; ?></title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="<?php echo $config['base_url']; ?>"/>
	<link rel="shortcut icon" href="<?php echo $config['base_url']; ?>/assets/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo $config['base_url']; ?>/assets/apple-touch-icon.png">
	<link rel="stylesheet" href="<?php echo $config['base_url']; ?>/assets/css/main.css?version=1" />
<?/*	Your choice of style... main or style
	<link rel="stylesheet" href="<?php echo $config['base_url']; ?>/assets/css/style.css?v=2">
*/?>
	<!-- JavaScript -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="<?php echo $config['base_url']; ?>/assets/js/respond.min.js"></script>
	<script src="<?php echo $config['base_url']; ?>/assets/js/libs/modernizr-1.7.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='<?php echo $config['base_url']; ?>/assets/js/libs/jquery-1.5.1.min.js'>\x3C/script>")</script>
	<script src="<?php echo $config['base_url']; ?>/assets/js/plugins.js"></script>
	<script src="<?php echo $config['base_url']; ?>/assets/js/script.js"></script>
	<!-- end scripts-->
	<!--[if lt IE 7 ]>
	<script src="<?php echo $config['base_url']; ?>/assets/js/libs/dd_belatedpng.js"></script>
	<script>DD_belatedPNG.fix("img, .png_bg");</script>
	<![endif]-->
</head>
<body>
<div id="container">
	<header>
		<hgroup>
			<h1>Grouped Heading 1</h1>
			<h2>Grouped Heading 2</h2>
		</hgroup>
		<nav>
			<ul>
				<li><a href="#1">navigation item #1</a></li>
				<li><a href="#2">navigation item #2</a></li>
				<li><a href="#3">navigation item #3</a></li>
			</ul>
		</nav>
	</header>