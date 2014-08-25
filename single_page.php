<?php
	include('header.php');
	include('Admin/dbconfig.php');
	include('Admin/xsscheck.php');
?>
<?php
	// holding id
	$id = $_GET['id'];
	$query = "SELECT * FROM posts WHERE post_id = '{$id}'";
	$result = mysqli_query($connection, $query);
	
?>
			<table style="width: 800px;margin: 0 auto; text-align: justify">
				<?php
					foreach ($result as $row){
				?>
				<tr>					
					<td style="padding-top: 50px;">
					<div style="border: 1px solid #d2d2d2;padding: 20px;">
							<h2 style="border-bottom: 1px solid #E8E8E8;padding-bottom:10px"><font color="Green"><?php echo str_replace($htmlNormalTags,$htmlreplaceTags,$row['post_title'])?></font></h2>										
							<p><?php echo str_replace($htmlNormalTags,$htmlreplaceTags,$row['post_content']);?></p> 
						<p style="border-top: 2px solid #E8E8E8;margin-top:50px"><b>Category In:</b> <a href="category.php?cat=<?php echo urlencode($row['post_category']);?>" style="color: green; font-weight: bold;text-decoration: none;"><?php echo $row['post_category'];?></a></p>
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