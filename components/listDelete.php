<?php
	require_once getcwd() . '/connection/connection.php';

	$id       = mysqli_real_escape_string($connection, $_GET['id']);
	
	$query = "DELETE FROM permainan
						WHERE id=$id";

	$query_result = mysqli_query($connection, $query);

	if (!$query_result) {
		echo "<br>Input data gagal.<br>";
		echo mysqli_error($connection);

		mysqli_close($connection);
	} else {
		mysqli_close($connection);
		header('Location: ' . $baseURL . '?pages=list');
	}
