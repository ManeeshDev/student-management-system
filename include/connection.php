<?php

	$serverName = 'localhost';
	$dbuserName = 'root';
	$dbPassword = '';
	$dbName 	= 'student';

	$con = mysqli_connect($serverName,$dbuserName,$dbPassword,$dbName);

	//checking the connection
	if (!$con) {
		die('Database Connection Failed.!' . mysqli_connect_error());
	}

	mysqli_select_db($con,$dbName);
?>
