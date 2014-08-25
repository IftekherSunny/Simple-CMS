<?php
	include('header.php');
	include('Admin/dbconfig.php');
?>
<?php
	$name = null;
	$email = null;
	$website = null;
	$message = null;

	if(isset($_POST['submit'])){
		
			// holding error
			$errorMsg = array();
			// holding success
			$successMes = array();

			// holding contact message value
			$name = mysqli_real_escape_string($connection,$_POST['name']);
			$email = mysqli_real_escape_string($connection,$_POST['email']);
			$message = mysqli_real_escape_string($connection,$_POST['message']);
			$website = null;

			if (empty($_POST['name'])){
				$errorMsg[] = "Name can not be empty.";
			} elseif (empty($_POST['email'])){
				$errorMsg[] = "Email can not be empty.";
			} elseif (empty($_POST['message'])){
				$errorMsg[] = "Message can not be empty.";
			} else {

				if(!empty($_POST['website'])) {
					$website = mysqli_real_escape_string($connection,$_POST['website']);
				}			
			
				$query = "INSERT INTO messages (`name`, `email`, `website`, `message_content`) VALUES ('{$name}','{$email}','{$website}','{$message}')";
			
				$result = mysqli_query($connection, $query);
				if (!$result){
					echo "error ";
				}else{
					$successMes[] = "Your message has been sent successfully.";
				}
			}
	}
?>
			<br />
			<table style="width: 800px;margin: 0 auto; text-align: justify">
				<tr>					
					<td style="padding: 30px;">
						<h2><font color="Green">Contact </font></h2>

						<?php
							if (!empty($errorMsg)){
								foreach($errorMsg as $err) {
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
								<td><b>Name: </b></td>
								<td><input type="text" name="name" id="name" size="93" value="<?php echo $name;?>"></td>
								<td><b><font color="Red">*</font></b></td>
							</tr>
							<tr>
								<td><b>Email: </b></td>
								<td><input type="text" name="email" id="email" size="93" value="<?php echo $email;?>"></td>
								<td><b><font color="Red">*</font></b></td>
							</tr>
							<tr>
								<td><b>Website: </b></td>
								<td><input type="text" name="website" id="website" size="93" value="<?php echo $website;?>"></td>
							</tr>
							<tr>
								<td><b>Messages: </b></td>
								<td><textarea name="message" id="message" rows="12" cols="71"><?php echo $message;?></textarea><b style="display: inline-block;vertical-align: top;"><font color="Red">*</font></b></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="submit" value="Send Messages"></td>
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