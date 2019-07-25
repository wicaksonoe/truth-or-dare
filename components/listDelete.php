<?php
	require_once getcwd() . '/connection/connection.php';
	
	try {
		
		$conn = new DB();
		$array_data = $conn->delete( $_GET['id'] );
		
	} catch (\PDOException $e) {
		echo $e->getMessage();
	}
	
	$conn->close();
	header('Location: ' . $baseURL . '?pages=list');