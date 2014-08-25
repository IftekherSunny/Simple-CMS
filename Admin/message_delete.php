<?php
	session_start();
	
	if ($_SESSION['admin'] != "admin") {
		header('Location: SignIn.php');
		exit();
	} else {
	
		include('dbconfig.php');
		$message_id = $_GET['id'];	
		
		$query = "DELETE FROM messages WHERE message_id = '{$message_id}'";			
		$result = mysqli_query($connection, $query);
		mysqli_close($connection);	
		header('Location: messages.php?msg=1');
	
	}
	
?>