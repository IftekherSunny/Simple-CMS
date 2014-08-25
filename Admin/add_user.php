<?php
	include('header.php');
	include('dbconfig.php');
?>
<?php
	$username = "";
	if(isset($_POST['submit'])){
		
			// holding error
			$errorPassword = array();
			// holding success
			$successMes = array();
			
			if (empty($_POST['username'])){
				$errorPassword[] = "Username can not be empty.";
			}
			if (empty($_POST['password'])){
				$errorPassword[] = "Password can not be empty.";
			}
			if (empty($_POST['confirmPassword'])){
				$errorPassword[] = "Confirm password can not be empty.";
			}
			elseif ($_POST['password'] != $_POST['confirmPassword'] ){
				$errorPassword[] = "Password & Confirm password do not match.";
			}else {
			$username = mysqli_real_escape_string($connection,$_POST['username']);
			$password = mysqli_real_escape_string($connection,$_POST['password']);
			$password = md5($password);
			
			$query = "SELECT username FROM users WHERE username = '{$username}'";			
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_row($result);
			if ($row > 0 ) {
				$errorPassword[] = "Already have same user";
			}else {
				$query = "INSERT INTO users(`username`, `password`) VALUES ('{$username}','{$password}')";
			
				$result = mysqli_query($connection, $query);
				if (!$result){
					echo "error ";
				}else{
					$successMes[] = "User has been added successfully.";
			}
			}
			
		}
	}
?>
			<table style="width: 450px; margin: 0 auto;">
				<tr>					
					<td style="padding-left: 50px;">
						<h2><font color="Green">Add User</font></h2>
						<?php
							if (!empty($errorPassword)){
								foreach($errorPassword as $err) {
						?>
									<p style="background-color: #c63d0f; color: white;margin-top: -5px; text-align: center"><?php echo $err?></p>
						<?php
								}
							}
						?>
						<?php
							if (!empty($successMes)){
								foreach($successMes as $mes) {
						?>
									<p style="background-color: green; color: white;margin-top: -5px; text-align:center"><?php echo $mes?></p>								
						<?php
								}
							}
						?>
						<form action="" method="post"> 
						<table>
							<tr>
								<td><b>Username: </b></td>
								<td><input type="text" name="username" id="username" value="<?php echo $username;?>"></td>
							</tr>
							<tr>
								<td><b>Password: </b></td>
								<td><input type="password" name="password" id="password"></td>
							</tr>
							<tr>
								<td><b>Confirm Password: </b></td>
								<td><input type="password" name="confirmPassword" id="confirmPassword"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="submit" value="Add"></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
<?php
	include('footer.php');
?>
<?php
	mysqli_close($connection);
?>