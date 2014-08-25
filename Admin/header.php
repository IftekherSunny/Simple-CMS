<?php
	session_start();
	
	if ($_SESSION['admin'] != "admin") {
		header('Location: SignIn.php');
		exit();
	}	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard - Sunny`s Blog </title>
	<link rel="shortcut icon" href="../image/logo.png">
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	
</head>
<body style="background:url('../image/background.png') repeat;font-family: arial;
	font-size: 16px;line-height: 30px;color: #000">
<div style="background-color: #F8F8F8; width: 960px; margin: 15px auto;">
	<div style="width: 350px; margin: 0 auto; padding: 15px;">
			<table>
				<tr>
					<td>
						<img src="../image/logo.png">
					</td>
					<td>
						<h1><font color="green">Sunny`s Blog </h1>
					</td>
				</tr>
			</table>
	</div>
	<hr style=" border-bottom: 2px solid #1b926c;">	
	<div style="padding: 10px; background-color: green; color: #EDEDED;">
		<table >
			<tr class="nav">
				<td>
					<a href="index.php"> Home </a> &nbsp;|
				</td>
				<td>
					<a href="user_list.php"> User List </a> &nbsp;|
				</td>
				<td>
					<a href="add_user.php"> Add User </a> &nbsp;|
				</td>
				<td>
					<a href="change_password.php"> Change Password </a> &nbsp;|
				</td>				
				<td>
					<a href="all_post.php"> All Post </a> &nbsp;|
				</td>
				<td>
					<a href="add_post.php"> Add Post </a> &nbsp;|
				</td>
				<td>
					<a href="messages.php"> Messages </a> &nbsp;|
				</td>
				<td>
					<a href="../index.php"> Visit Blog </a> &nbsp;|
				</td>
				<td>
					<a href="sign_out.php"> Sign Out </a>
				</td>
			</tr>
		</table>
	</div>	
	
		<br><br><br>