<?php
	include('header.php');
	include('dbconfig.php');
?>
<?php
	// Declare variable
	$postTitle = null;
	$postContent = null;
	$postCategory = null;

	if(isset($_POST['submit'])){
		
			// holding error
			$errorPassword = array();
			// holding success
			$successMes = array();

			// Holding posted content
			$postTitle = mysqli_real_escape_string($connection,$_POST['postTitle']);
			$postContent = mysqli_real_escape_string($connection,$_POST['postContent']);
			$postCategory = mysqli_real_escape_string($connection,$_POST['category']);

			if (empty($postTitle)){
				$errorPassword[] = "Post title can not be empty.";
			}
			elseif (empty($postContent)){
				$errorPassword[] = "Post content can not be empty.";
			}
			elseif ($postCategory == "select a category"){
				$errorPassword[] = "Select a category.";
			} 
			else {
				
				$query = "INSERT INTO posts(`post_title`, `post_content`, `post_category`) VALUES ('{$postTitle}','{$postContent}','{$postCategory}')";
			
				$result = mysqli_query($connection, $query);
				if (!$result){
					echo "error ";
				}else{
					$successMes[] = "Post has been published successfully.";
				}
			}
	}
?>
	
			<table style="width: 550px; margin: 0 auto;">
				<tr>					
					<td style="padding-left: 10px;">
						<h2><font color="Green">Add Post</font></h2>
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
								<td><b>Post Title: </b></td>
								<td><input type="text" name="postTitle" id="postTitle" size="65" value="<?php echo $postTitle?>"></td>
							</tr>
							<tr>
								<td><b>Post Content: </b></td>
								<td><textarea name="postContent" id="postContent" rows="12" cols="10" style="resize: none;width: 420px;"><?php echo $postContent?></textarea></td>
							</tr>
							<tr>
								<td><b>Category: </b></td>
								<td>
									<select name="category">
										<option value="select a category">select a category</option>
										<option value="Java">Java</option>
										<option value="C#">C#</option>
										<option value="C">ANSI C</option>
										<option value="C++">C++</option>
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="submit" value="Add Post"></td>
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