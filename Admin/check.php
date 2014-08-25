<?php
	// Mysql connection
	$connection = mysqli_connect("localhost","root","J886402834","project");
	
	// check for die or not
	if (mysqli_connect_errno()){
		die("Database connection failed: ".
			mysqli_connection_error().
			"(".mysqli_connection_errno().")"
			);
	}
	
	// handle data from form posting
	//if (!isset($_POST['projectForm1'])){
		
		
		$query = "SELECT * FROM `users` ";
		
		$result = mysqli_query($connection, $query);
				
		if(!$result){
			echo "no data";
		}
	    
		while ($row = mysqli_fetch_row($result)){
			echo "<pre>";
		var_dump($row);
		echo "</pre>";
		}
		echo "<br/>";
		foreach($result as $row){
		echo "<pre>";
		var_dump($row);
		echo "</pre>";
		}
	
	mysqli_close($connection);
?>