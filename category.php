<?php
	include('header.php');
	include('Admin/dbconfig.php');
	include('Admin/xsscheck.php');
?>
<?php
	// holding cat
	$cat = $_GET['cat'];
	$query = "SELECT * FROM posts WHERE post_category = '{$cat}' ORDER BY post_id DESC";
	$result = mysqli_query($connection, $query);
	
?>
			<br />
			<h2 style="width: 300px; margin: 0 auto; color: green; padding: 20px 0px;"><i style="border-bottom: 1px solid #C0C0C0;">Category By <?php echo $cat; ?></i></h2>
			<table style="width: 800px;margin: 0 auto; text-align: justify">
				<?php
					$count = 0;
					foreach ($result as $row){
					 $count++;
				?>
				<tr>					
					<td style="padding-top: 20px;">
					<div style="border: 1px solid #d2d2d2;padding: 20px;">
							<h2 style="border-bottom: 1px solid #E8E8E8;padding-bottom:10px"><font color="Green"><?php echo str_replace($htmlNormalTags,$htmlreplaceTags,$row['post_title'])?></font></h2>										
							<p><?php echo str_replace($htmlNormalTags,$htmlreplaceTags,substr($row['post_content'],0,700)).'...'?></p>
						<a href="single_page.php?id=<?php echo $row['post_id']?>" class="readmore">Read More</a> 
						<p style="border-top: 2px solid #E8E8E8;margin-top:50px"><b>Category In:</b> <a href="category.php?cat=<?php echo urlencode($row['post_category']);?>" style="color: green; font-weight: bold;text-decoration: none;"><?php echo $row['post_category'];?></a></p>
					</div>
					</td>
				</tr>
				<?php	
					}
					mysqli_free_result($result);
					if ($count == 0){
				?>
				<tr>
					<td style="padding: 30px;">
						<h2><?php echo "No Post Here"?></h2>
					</td>
				</tr>
				<?php				
					}
				?>
			</table>
<?php
	include('footer.php');
?>
<?php
	mysqli_close($connection);
?>