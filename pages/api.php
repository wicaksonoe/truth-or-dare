<?php

	require_once getcwd().'/connection/connection.php';

	if ( isset( $_GET['mode'] ) ) {
		$mode = $_GET['mode'];
	} else {
		$mode = random_int(1, 2);
	}

	try {
			
		$conn = new DB();
		$data = $conn->getForApi($mode);

	} catch (\PDOException $e) {
		echo $e->getMessage();
	}

	$conn->close();

	echo json_encode($data);