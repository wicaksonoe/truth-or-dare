<?php
	require_once getcwd().'/connection/connection.php';

	if ( isset($_POST['id']) ) {
		try {
		
			$conn = new DB();
			$array_data = $conn->update( $_POST['id'], $_POST['kategori'], $_POST['konten'] );
			
		} catch (\PDOException $e) {
			echo $e->getMessage();
		}
		
		$conn->close();
		header('Location: ' . $baseURL . '?pages=list');
	} else {
		header('location: '.$baseURL.'?pages=list');
	}