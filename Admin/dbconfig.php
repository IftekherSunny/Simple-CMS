<?php 
	// Mysql connection
	$connection = mysqli_connect("localhost","sunny","sunny","project");
	
	// check for die or not
	if (mysqli_connect_errno()){
		die("Database connection failed: ".
			mysqli_connection_error().
			"(".mysqli_connection_errno().")"
			);
	}
?>