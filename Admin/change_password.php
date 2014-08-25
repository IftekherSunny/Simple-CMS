<?php
	include('header.php');
	include('dbconfig.php');
?>

<?php
	// holding username
	$username = $_SESSION['username'];
	
	if(isset($_POST['submit'])){
		
	// holding error
	$errorPassword = array();
	// holding success
	$successMes = array();
	
	if (empty($_POST['oldPassword'])){
		$errorPassword[] = "Old password can not be empty.";
	}
	if (empty($_POST['newPassword'])){
		$errorPassword[] = "New password can not be empty.";
	}
	if (empty($_POST['confirmPassword'])){
		$errorPassword[] = "Confirm password can not be empty.";
	}
	elseif ($_POST['newPassword'] != $_POST['confirmPassword'] ){
		$errorPassword[] = "New & Confirm password do not match.";
	}else {
			$query = "SELECT password FROM users WHERE username = '{$username}'";
			
			$result = mysqli_query($connection, $query);
			
			foreach ($result as $row){
				if ($row["password"] != md5($_POST['oldPassword']) ){
					$errorPassword[] = "Old password do not match with current password.";
				} else {
					$confirmPassword = mysqli_real_escape_string($connection,$_POST['confirmPassword']);
					$newpassword = md5($confirmPassword);
					$query = "UPDATE users SET password='{$newpassword}' WHERE username = '{$username}'";
					
					$result = mysqli_query($connection, $query);
					$successMes[] = "Password has been updated successfully.";
					}					
				}
		}		
	}
?>
			<table style="width: 450px; margin: 0 auto;">
				<tr>					
					<td style="padding-left: 50px;">
						<h2 style="margin-bottom: -20px;"><font color="Green">Change Password</font></h2>
						<br/>
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
									<td><b>Old Password: </b></td>
									<td><input type="password" name="oldPassword" id="oldPassword"></td>
								</tr>
								<tr>
									<td><b>New Password: </b></td>
									<td><input type="password" name="newPassword" id="password"></td>
								</tr>
								<tr>
									<td><b>Confirm Password: </b></td>
									<td><input type="password" name="confirmPassword" id="confirmPassword"></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name="submit" value="Save"></td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
<?php
	include('footer.php');
?>
<?php
	mysqli_close($connection);
?>