<?php
	require_once getcwd().'/connection/connection.php';

	if ( isset($_POST['id']) ) {
		$id       = mysqli_real_escape_string($connection, $_POST['id']);
		$kategori = mysqli_real_escape_string($connection, $_POST['kategori']);
		$konten   = mysqli_real_escape_string($connection, $_POST['konten']);

		$query = "UPDATE permainan
							SET kategori_permainan=$kategori, konten_permainan='$konten'
							WHERE id=$id";

		$query_result = mysqli_query($connection, $query);

		if ( !$query_result ) {
			echo "<br>Input data gagal.<br>";
			echo mysqli_error($connection);
		} else {
			header('Location: '.$baseURL.'?pages=list');
		}
	} else {
		header('location: '.$baseURL.'?pages=list');
	}