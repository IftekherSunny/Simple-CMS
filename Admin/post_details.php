<?php
	include('header.php');
	include('dbconfig.php');
	include('xsscheck.php');
?>
<?php
	// holding id
	$id = $_GET['id'];
	$query = "SELECT * FROM posts WHERE post_id = '{$id}'";
	$result = mysqli_query($connection, $query);
	
?>
			<table style="width: 700px; margin: 0 auto;">
				<?php
					foreach ($result as $row){
				?>
				<tr>					
					<td style="padding-left: 10px;">
						<div style="border: 1px solid #d2d2d2;padding: 20px;">
							<h2 style="border-bottom: 1px solid #E8E8E8;padding-bottom:10px"><font color="Green">Post Details</font></h2>
							<div style="border: 1px solid green;padding:5px;margin-bottom:10px;background: #D0D0D0;">
								<b>Post Title: </b><?php echo str_replace($htmlNormalTags,$htmlreplaceTags,$row['post_title'])?>
							</div>

							<div style="border: 1px solid green;padding:5px;margin-bottom:40px;margin-top:30px; background: #D0D0D0;">
								<b>Post Content: </b>
									<p style="text-align: justify">
										<?php echo str_replace($htmlNormalTags,$htmlreplaceTags,$row['post_content'])?>
									</p>
							</div>
							
							<div style="border: 1px solid green;padding:5px;margin-bottom:10px;background: #D0D0D0;">
								<b>Category: </b> <?php echo str_replace($htmlNormalTags,$htmlreplaceTags,$row['post_category'])?>								
							</div>
									
							<br><br>
							<a href="post_edit.php?id=<?php echo $row['post_id']?>" class="readmore">Edit Post</a>

						</div>
					</td>
				</tr>
				<?php	
					}
					mysqli_free_result($result);
				?>
			</table>
<?php
	include('footer.php');
?>
<?php
	mysqli_close($connection);
?>