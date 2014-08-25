<?php
	session_start();
	
	if ($_SESSION['admin'] != "admin") {
		header('Location: SignIn.php');
		exit();
	}else {
	
		include('dbconfig.php');
		$post_id = $_GET['id'];
		
		$query = "DELETE FROM posts WHERE post_id = '{$post_id}'";			
		$result = mysqli_query($connection, $query);
		mysqli_close($connection);	
		header('Location: all_post.php?msg=1');
	
	}
	
?>