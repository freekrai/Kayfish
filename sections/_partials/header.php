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
	<link href="/assets/bootstrap.css" rel="stylesheet">
	<link href="/assets/core.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script src="http://autobahn.tablesorter.com/jquery.tablesorter.min.js"></script>
	<script src="/assets/js/bootstrap-dropdown.js"></script>
	<script src="/assets/js/bootstrap-twipsy.js"></script>
	<script src="/assets/js/bootstrap-scrollspy.js"></script>
	<script src="/assets/js/app.js"></script>
	<link rel="shortcut icon" href="/assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/assets/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/assets/images/apple-touch-icon-114x114.png">
</head>
<body>
<header>
    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="/"><?php echo $config['base_title']; ?></a>
          <ul class="nav">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="/signup">Signup</a></li>
          </ul>
<?php	if( is_logged_in() ){	?>
		<ul class="nav secondary-nav">
			<li><a href="/logout">Logout</a></li>
		</ul>
<?php	}else{	?>          
          <form action="/login" class="pull-right">
            <input class="input-small" type="text" placeholder="Username" name="username">
            <input class="input-small" type="password" placeholder="Password" name="pass">
            <button class="btn" type="submit">Sign in</button>
          </form>
<?php	}	?>
        </div>
      </div>
    </div>
</header>
<section>