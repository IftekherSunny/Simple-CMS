<?php
	include('header.php');
	include('dbconfig.php');
?>
<?php	

	// holding id
	$post_id = $_GET['id'];
		
	// holding success msg
	$successMsg = array();
	// holding error msg
	$errorMsg = array();

	// holding selected category value
	$isNoCategorySelected = null;
	$isJavaSelected = null;
	$isCsharpSelected = null;
	$isAnsiCSelected = null;
	$isCplusSelected = null;
	
	if(isset($_GET['id'])){
		// display username on the username field 
		$query = "SELECT * FROM posts WHERE post_id = {$post_id}";		
		$result = mysqli_query($connection, $query);
		foreach($result as $row){
			$post_title = $row['post_title'];
			$post_content = $row['post_content'];
			$post_category = $row['post_category'];
		}

		if ($post_category == "Java") {
			$isJavaSelected = "selected";
		} elseif ($post_category == "C#") {
			$isCsharpSelected = "selected";
		} elseif ($post_category == "C") {
			$isAnsiCSelected = "selected";
		} elseif ($post_category == "C++") {
			$isCplusSelected = "selected";
		} else {
			$isNoCategorySelected = "selected";
		}
	}
	
	if(isset($_POST['submit'])){
		
		// holding error
		$errorPassword = array();
		// holding success
		$successMes = array();

		$post_title = $_POST['postTitle'];
		$post_content = $_POST['postContent'];
		$post_category = $_POST['category'];

		// Holding posted content
		$postTitle = htmlspecialchars (mysqli_real_escape_string($connection,$_POST['postTitle']));
		$postContent = htmlspecialchars (mysqli_real_escape_string($connection,$_POST['postContent']));
		$postCategory = mysqli_real_escape_string($connection,$_POST['category']);

		if (empty($postTitle)){
			$errorMsg[] = "Post title can not be empty.";
		}
		elseif (empty($postContent)){
			$errorMsg[] = "Post content can not be empty.";
		}
		elseif ($postCategory == "select a category"){
			$errorMsg[] = "Select a category.";
			$isNoCategorySelected = "selected";
			$isJavaSelected = null;
			$isCsharpSelected = null;
			$isAnsiCSelected = null;
			$isCplusSelected = null;
		} 
		else {
			
			$query = "UPDATE posts SET post_title='{$postTitle}',post_content='{$postContent}',post_category='{$postCategory}' WHERE post_id = {$post_id}";		
			
			$result = mysqli_query($connection, $query);
			if (!$result){
				echo "error ";
			}else{
				$successMes[] = "Post has been updated successfully.";
			}
		}

	}
?>
			<table style="width: 550px; margin: 0 auto;">
				<tr>					
					<td style="padding-left: 10px;">
						<h2><font color="Green">Edit Post</font></h2>
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
							if (!empty($successMes)){
								foreach($successMes as $msg) {
						?>
									<p style="background-color: green; color: white;margin-top: -5px; text-align:center"><?php echo $msg?></p>								
						<?php
								}
							}
						?>
					<form action="" method="post">
						<table>
							<tr>
								<td><b>Post Title: </b></td>
								<td><input type="text" name="postTitle" id="postTitle" size="65" value="<?php echo $post_title ?>"></td>
							</tr>
							<tr>
								<td><b>Post Content: </b></td>
								<td><textarea name="postContent" id="postContent" rows="12" cols="10" style="resize: none;width: 420px;"><?php echo $post_content ?></textarea>
								</td>
							</tr>
							<tr>
								<td><b>Category: </b></td>
								<td>
									<select name="category">
										<option <?php echo $isNoCategorySelected;?> value="select a category">select a category</option>
										<option <?php echo $isJavaSelected;?> value="Java">Java</option>
										<option <?php echo $isCsharpSelected;?> value="C#">C#</option>
										<option <?php echo $isAnsiCSelected;?> value="C">ANSI C</option>
										<option <?php echo $isCplusSelected;?> value="C++">C++</option>
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="submit" value="Update Post"></td>
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
	mysqli_free_result($result);
	mysqli_close($connection);
?>