<?php
	include('header.php');
	include('dbconfig.php');
	include('xsscheck.php');
?>
<?php
	$query = "SELECT * FROM posts ORDER BY post_id DESC";
	$result = mysqli_query($connection, $query);
	
?>
			<table class="dashboard-table">
				<tr>					
					<td>
						<h2><font color="Green">All Post</font></h2>
						<?php 
						if(isset($_GET['msg'])) {
							if($_GET['msg'] == 1){
						?>
								<div style="width:500px">
								<p style="background-color: green; color: white;width: 300px;margin: 20px auto;text-align:center"><?php echo "User has been deleted successfully."?></p>
								</div>
						<?php
							}
						}
						?>
						<table border="1" >							
							<tr style="background-color: #989898;">
								<th>#ID</th>
								<th>Post Title</th>
								<th>Post Content</th>
								<th>Category</th>
								<th>Action</th>
							</tr>
							<?php
								$count = 0;
								foreach ($result as $row){
									$count++;
							?>							
							<tr>
								<td><?php echo $count?></td>
								<td><?php echo str_replace($htmlNormalTags,$htmlreplaceTags,substr($row['post_title'],0,25)).'...'?></td>
								<td><?php echo str_replace($htmlNormalTags,$htmlreplaceTags,substr($row['post_content'],0,40)).'...'?></td>
								<td><?php echo $row['post_category']?></td>
								<td>
									<a class="btnedit" href="post_edit.php?id=<?php echo $row['post_id']?>">Edit</a>
									<a class="btndetails" href="post_details.php?id=<?php echo $row['post_id']?>">Details</a> 
									<a class="btndelete" href="post_delete.php?id=<?php echo $row['post_id']?>">Delete</a>
								</td>
							</tr>
							<?php							
								}
								mysqli_free_result($result);
								if($count == 0) {
							?>
							<tr>
								<td colspan="5" style="text-align:center"><?php echo "No Post Here"?></td>
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