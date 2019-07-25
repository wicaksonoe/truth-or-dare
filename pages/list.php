<?php

if ( isset($_GET['method']) ) {
	$method = $_GET['method'];
} else {
	$method = NULL;
}

if ( isset($_GET['id']) ) {
	$id = $_GET['id'];
} else {
	$id = NULL;
}

switch ($method) {

	case 'create':
		require_once getcwd().'/components/listCreate.php';
		break;
		
	case 'update':
		require_once getcwd().'/components/listUpdate.php';
		break;

	case 'read':
		if ( $id == NULL ) { header('Location: '.$baseURL.'?pages=list'); }
		require_once getcwd().'/components/listRead.php';
		break;
		
	case 'delete':
		if ( $id == NULL ) { header('Location: '.$baseURL.'?pages=list'); }
		require_once getcwd().'/components/listDelete.php';
		break;
		
	default:
		require_once getcwd().'/components/listHome.php';
		break;
}