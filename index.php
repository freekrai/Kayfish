<?php
	include('_lib/runtime.php');
	// Defaults
	$section = $config['sections'][0];
	$page = 'index';
	if( isset($_GET['section'])){
		$salias = "sections/".$_GET['section']."/";
		if( file_exists($salias) && is_dir($salias) ){
			$section = $_GET['section'];
		}else{
			$page = $_GET['section'];
		}
/*
		if( in_array( $_GET['section'], $config['sections'], true ))
			$section = $_GET['section'];
		else
			$page = $_GET['section'];
*/
	}
	if( isset($_GET['page']))	$page = $_GET['page'];
	ob_start();
	$pagePath = "sections/$section/$page.php";
	if( file_exists( $pagePath ))
		include( $pagePath );
	else
		include("sections/visitor/404.php");
	$content = ob_get_contents();
	ob_end_clean();
	get_header();
	echo $content;
	get_footer();
?>