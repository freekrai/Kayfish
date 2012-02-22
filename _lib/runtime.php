<?php
//	runtime file, used for system startup.
	session_start();
	require_once('config.php');
	require_once('_lib/session.class.php');
	require_once('_lib/skeleton.class.php');
	require_once('_lib/items.class.php');
	require_once('_lib/htmlhelper.class.php');
	require_once('_lib/functions.php');
	require_once('_lib/cache.class.php');
	require_once('_lib/xmllogger.class.php');
	require_once('_lib/db.class.php');
	require_once('_lib/forms.class.php');
//	require_once('_lib/posts.php');
	date_default_timezone_set('America/Los_Angeles');
	if (DEBUG) {
#		error_reporting(E_ALL);
#		ini_set('display_errors','On');
		error_reporting(E_ALL | E_STRICT);
		ini_set('display_errors', 1);
	} else {
		error_reporting(0);
		@ini_set('display_errors', 0);
	}
//If not using a DB, then just comment this out:
	$kfdb = new kfdb($config['dbhost'],$config['dbuser'],$config['dbpass'],$config['dbname']);
	define( "DBH", $kfdb->conn );	
	$globals = array('kfdb','config');