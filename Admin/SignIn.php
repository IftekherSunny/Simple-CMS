<?php
	// database connection
	require_once 'dbconfig.php';

	session_start();
	if ($_SESSION['admin'] == "admin"){
		header('Location: index.php');
	}

	// holding error
	$errorBundle = array();	

	// handle data from form posting
	if (isset($_POST['projectForm1'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(empty($username)) {
			$errorBundle[] = "Username can not be empty.";
		} elseif (empty($password)){
			$errorBundle[] = "Password can not be empty.";
		} else {

			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='{$username}' and password='{$password}';";
		
			$result = mysqli_query($connection, $query);
			
			
			if(!$result){
				
			}
			
			$row = mysqli_fetch_row($result);
			
			if ($row > 0){
				$_SESSION['admin'] = "admin";
				$_SESSION['username'] = $username;
				header('Location: index.php');
			} else {
				$errorBundle[] = "Invalid username/Password.";
			}
		}
	}
	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign In</title>
	<link rel="shortcut icon" href="../image/logo.png">
</head>
<body style="background:url('../image/background.png') repeat">
<div style="background-color: #F8F8F8; width: 500px; margin: 0 auto;margin-top: 9%">
	<div style="width: 350px; margin: 0 auto; padding: 15px;padding-bottom: 50px;">
			<table>
				<tr>
					<td>
						<img src="../image/logo.png">
					</td>
					<td>
						<h1><font color="green">Sunny`s Blog</font></h1>
					</td>
				</tr>
			</table>
			<font color="#1b926c">
			<fieldset style="width: 320px;">
				<legend>Sign In</legend>
				
				<p style="text-align: center; color: red; margin-top: -5px; margin-bottom: -3px;">
					<?php
						if (!empty($errorBundle)){
							foreach ($errorBundle as $err){
								echo $err;
							}
						}
					?>				
				</p>

				<form action="" method="post" name="projectForm" onsubmit="return validation()">
				
				<table>	
				<tr>
					<td><b style="color: #1b926c">Username: </b></td>
					<td><input type="text" name="username" id="username" size="30" autofocus></td>
					<td><b id="usernameError"></b></td></td>
				</tr>
				<tr>
					<td><b style="color: #1b926c">Password: </b></td>
					<td><input type="password" name="password" id="password" size="30"></td>
					<td><b id="passwordError"></b></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="projectForm1" value="Sign In" ></td>
				</tr>
			</table>
		</form>
			</fieldset>
			
		
		</font>
	</div>
</div>
	
	
	
	
</body>
</html>
<?php
	mysqli_close($connection);
?>