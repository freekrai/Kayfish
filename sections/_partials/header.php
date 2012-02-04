<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<title><?php echo $config['base_title']; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link href="/assets/css/bootstrap.css" rel="stylesheet">
	<link href="/assets/css/core.css" rel="stylesheet">
	<link href="/assets/css/bootstrap-responsive.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="http://autobahn.tablesorter.com/jquery.tablesorter.min.js"></script>
	<script src="/assets/js/bootstrap.js"></script>
	<script src="/assets/js/app.js"></script>
	<link rel="shortcut icon" href="/assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/assets/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/assets/images/apple-touch-icon-114x114.png">
</head>
 <body data-spy="scroll" data-target=".subnav" data-offset="50">
<header>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="/"><?php echo $config['base_title']; ?></a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="active"><a href="/">Home</a></li>
						<li><a href="/grid">Scaffolding</a></li>
						<li><a href="/test">Components</a></li>
						<li><a href="/fluid">Fluid</a></li>
						<li><a href="/blank">Start</a></li>						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</li>
					</ul>
					<form class="navbar-search pull-left" action="">
						<input type="text" class="search-query span2" placeholder="Search">
					</form>
					<ul class="nav pull-right">
						<li><a href="#">Link</a></li>
						<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div>
</header>
<section>