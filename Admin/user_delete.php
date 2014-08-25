<?php
	session_start();
	
	if ($_SESSION['admin'] != "admin") {
		header('Location: SignIn.php');
		exit();
	} else {
	
		include('dbconfig.php');
		$user_id = $_GET['id'];	
		
		// check minimun one user has
		$query = "SELECT * FROM users";			
		$result = mysqli_query($connection, $query);
		
		// count user
		$count = 0;
		
		foreach($result as $row) {
			$count++;
		}
		
		if ($user_id == 20) {
			mysqli_close($connection);	
			header('Location: user_list.php?msg=3');
		} elseif ($count != 1) {
			$query = "DELETE FROM users WHERE user_id = '{$user_id}'";			
			$result = mysqli_query($connection, $query);
			mysqli_close($connection);	
			header('Location: user_list.php?msg=1');
		} else {
			mysqli_close($connection);	
			header('Location: user_list.php?msg=2');	
		}
	
	}
?>