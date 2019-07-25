<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
	die('Direct Access Not Allowed.');
	exit();
}

$hostname = "localhost";
$username = "phpmyadmin";
$password = "kosongin";
$database = "truth_or_dare";

$connection = mysqli_connect($hostname, $username, $password, $database);


if ( mysqli_connect_errno() ) {
	die("Database Error: ".mysqli_connect_error());
}