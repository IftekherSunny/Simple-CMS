<?php
	include('header.php');
	include('dbconfig.php');
	include('xsscheck.php');
?>
<?php
	$query = "SELECT * FROM messages ORDER BY message_id DESC";
	$result = mysqli_query($connection, $query);
	
?>
			<table style="width: 90%; margin: 0 auto;">
				<tr>					
					<td style="padding-left: 20px;">
						<h2><font color="Green">All Message</font></h2>
						<?php 
						if(isset($_GET['msg'])) {
							if($_GET['msg'] == 1){
						?>
								<div style="width:500px">
								<p style="background-color: green; color: white;width: 300px;margin: 20px auto;text-align:center"><?php echo "Message has been successfully deleted."?></p>
								</div>
						<?php
							}
						}
						?>
						<table border="1" >							
							<tr style="background-color: #989898;">
								<th>#ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Message</th>
								<th>Action</th>
							</tr>
							<?php
								$count = 0;
								foreach ($result as $row){
									$count++;
							?>							
							<tr>
								<td><?php echo $count?></td>
								<td><?php echo str_replace($htmlNormalTags,$htmlreplaceTags,substr($row['name'],0,20))?></td>
								<td><?php echo str_replace($htmlNormalTags,$htmlreplaceTags,substr($row['email'],0,30))?></td>
								<td><?php echo str_replace($htmlNormalTags,$htmlreplaceTags,substr($row['message_content'],0,60)).'...'?></td>
								<td>
									<a class="btndetails" href="message_details.php?id=<?php echo $row['message_id']?>">Details</a>  
									<a class="btndelete" href="message_delete.php?id=<?php echo $row['message_id']?>">Delete</a>
								</td>
							</tr>
							<?php							
								}
								mysqli_free_result($result);
								if($count == 0) {
							?>
							<tr>
								<td colspan="5" style="text-align:center"><?php echo "No Message Here"?></td>
							</tr>
							<?php
								}
							?>
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