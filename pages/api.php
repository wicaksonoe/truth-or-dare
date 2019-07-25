<?php

require_once getcwd().'/connection/connection.php';

if ( isset( $_GET['mode'] ) ) {
	$mode = mysqli_real_escape_string( $connection, $_GET['mode'] );
} else {
	$mode = random_int(1, 2);
}

$query = "SELECT kategori_permainan, konten_permainan FROM permainan WHERE kategori_permainan=$mode ORDER BY RAND() LIMIT 1";

$query_result = mysqli_query($connection, $query);

$result_data = mysqli_fetch_assoc($query_result);

mysqli_close($connection);

echo json_encode($result_data);
