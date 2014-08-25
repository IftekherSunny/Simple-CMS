<?php
	include('header.php');
	include('dbconfig.php');
?>
<?php
	
	$query = "SELECT * FROM users";
	$result = mysqli_query($connection, $query);
	
?>
			
			<table style="width: 800px; margin: 0 auto;">
				<tr>					
					<td style="padding-left: 50px;">
						<h2><font color="Green">User List</font></h2>
						
						<?php 
						if(isset($_GET['msg'])) {
							if($_GET['msg'] == 1){
						?>
								<div style="width:500px">
								<p style="background-color: green; color: white;width: 300px;margin: 20px auto;text-align:center"><?php echo "User has been deleted successfully."?></p>
								</div>
						<?php
							}
						?>
						<?php 
							if($_GET['msg'] == 2){
						?>
								<div style="width:500px">
								<p style="background-color: #c63d0f; color: white;width: 300px;margin: 20px auto;text-align:center"><?php echo "Minimum one user registered";?></p>
								</div>
						<?php
								}
						?>
						<?php 
							if($_GET['msg'] == 3){
						?>
								<div style="width:500px">
								<p style="background-color: #c63d0f; color: white;width: 300px;margin: 20px auto;text-align:center"><?php echo "You can not delete this user."?></p>
								</div>
						<?php
								}
							}
						?>
						<table border="1">
							<tr style="background-color: #989898;">
								<th>#ID</th>
								<th>User Name</th>
								<th>Password</th>
								<th>Action</th>
							</tr>
						<?php 
							$count = 1;
							foreach ($result as $row){
						?>
							<tr>
								<td><?php echo $count?></td>
								<td><?php echo htmlspecialchars($row['username'])?></td>
								<td><?php echo $row['password']?></td>
								<td>
									<a class="btnedit" href="user_edit.php?id=<?php echo $row['user_id']?>">Edit</a>  
									<a class="btndelete" href="user_delete.php?id=<?php echo $row['user_id']?>">Delete</a></td>
							</tr>	
							<?php
								$count++;
							}
							?>
						</table>
						<?php
							mysqli_free_result($result);
						?>
					</td>
				</tr>
			</table>
			
<?php
	include('footer.php');
?>
<?php
	mysqli_close($connection);
?>