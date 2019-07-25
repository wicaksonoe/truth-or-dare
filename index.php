<?php
//  DELETE THIS IF ON PRODUCTION MODE
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
// +++++++++++++++++++++++++++++++++++++++
$baseURL = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";

if ( isset($_GET['pages']) ) {
	$pages = $_GET['pages'];
} else {
	$pages = NULL;
}

switch ($pages) {
	case 'list':
		require_once getcwd().'/pages/list.php';
		break;
	
	case 'api':
		require_once getcwd().'/pages/api.php';
		break;	

	default:
		require_once getcwd().'/pages/home.php';
		break;
}