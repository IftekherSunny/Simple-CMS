<?php
	include('header.php');
	include('dbconfig.php');
?>
<?php	

	// holding id
	$user_id = $_GET['id'];
		
	// holding success msg
	$successMsg = array();
	// holding error msg
	$errorMsg = array();
	
	// display username on the username field 
	$query = "SELECT username FROM users WHERE user_id = {$user_id}";		
	$result = mysqli_query($connection, $query);
	foreach($result as $row){
		$username = $row['username'];
	}
	
	if(isset($_POST['submit'])){
	
		if (empty($_POST['password'])) {
			$errorMsg[] = "Password can not be empty.";
		} else {
			// holding password
			$password = mysqli_real_escape_string($connection,$_POST['password']);
			$password = md5($password);
			
			$query = "UPDATE users SET password='{$password}' WHERE user_id = {$user_id}";		
			$result = mysqli_query($connection, $query);
			if(!$result){
				echo "Error";
			}else {
				$successMsg[] = "Password has been successfully updated";
			}
		}
	
	}
?>
			<table style="width: 450px; margin: 0 auto;">
				<tr>					
					<td style="padding-left: 50px;">
						<h2><font color="Green">User Edit</font></h2>
						<?php 
							if(!empty($errorMsg)){
								foreach($errorMsg as $err) {
						?>
								<div style="width:500px">
								<p style="background-color: #c63d0f; color: white;width: 300px;margin: 20px auto;text-align:center"><?php echo $err?></p>
								</div>
						<?php	
								}
							}
						?>
						
						<?php
							if (!empty($successMsg)){
								foreach($successMsg as $msg) {
						?>
									<p style="background-color: green; color: white;margin-top: -5px; text-align:center"><?php echo $msg?></p>								
						<?php
								}
							}
						?>
						
						<form action="" method="post">
							<table>
								<tr>
									<td> <b>User Name: </b></td>
									<td> <input type="text" name="username" value="<?php echo $username;?>" readonly style="background-color: #ededed;"></td>
								</tr>
								<tr>
									<td><b>Password: </b> </td>
									<td><input type="password" name="password" value="" autofocus> </td>
								</tr>
								<tr>
									<td></td>
									<td> <input type="submit" name="submit" value="Update"></td>
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