<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<title>Sign Up</title>
	<link rel="shortcut icon" href="../image/logo.png">
</head>
<body style="background:url('../image/background.png') repeat">
<div style="background-color: #F8F8F8; width: 500px; margin: 0 auto;">
	<div style="width: 350px; margin: 0 auto; padding: 15px;">
		<table>
				<tr>
					<td>
						<img src="../image/logo.png">
					</td>
					<td>
						<h1><font color="green">Sunny`s Blog</font></h1>
					</td>
				</tr>
		</table>
		
			<font color="#1b926c">
			<fieldset style="width: 320px;">
				<legend>Sign Up</legend>
				
				<h3 id="success"></h3>

				<form action="SignIn.php" method="post" name="projectForm" onsubmit="return validation()">
				
			<table>
				<tr>
					<td><b>First Name: </b> </td>
					<td><input type="text" name="firstName" id="firstName" size="28"></td>
					<td><b id="firstNameError"></b></td>
				</tr>				
				<tr>
					<td><b>Last Name: </b></td>
					<td><input type="text" name="lastName" id="lastName" size="28"></td>
					<td><b id="lastNameError"></b></td>
				</tr>
				<tr>
					<td><b>Age: </b></td>
					<td><input type="text" name="age" id="age" size="28"></td>
					<td><b id="ageError"></b></td>
				</tr>
				<tr>
					<td><b>Gender: </b></td>
					<td>
						<select style="width: 203px;" id="gender" name="gender">
						  <option value="selectGender">select a Gender</option>
						  <option value="Female">Female</option>
						  <option value="Male">Male</option>
						</select>
					</td>
					<td><b id="genderError"></b></td>
				</tr>
				<tr>
					<td><b>Biography: </b></td>
					<td><textarea name="biography" id="biography" rows="4" style="width: 196px; resize: none"></textarea>
					<b id="biographyError" style="display: inline-block; vertical-align: top;"></b></td>
				</tr>
				<tr>
					<td><b>Email: </b></td>
					<td><input type="text" name="email" id="email" size="28"></td>
					<td><b id="emailError"></b></td>
				</tr>
				<tr>
					<td><b>Password: </b></td>
					<td><input type="password" name="password" id="password" size="28"></td>
					<td><b id="passwordError"></b></td>
				</tr>
				<tr>
					<td><b>Confirm<br/> Password: </b></td>
					<td><input type="password" name="confirmPassword" id="confirmPassword" size="28"></td>
					<td><b id="confirmPasswordError"></b></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Sign Up" ></td>
				</tr>
			</table>
		</form>
			</fieldset>
			
		<p> Already have account? <a href="SignIn.php" ><strong> Sign In </strong></a></p>
		</font>
	</div>
</div>
	
	
	<!-- JavaScript ------------------------->
	<script type="text/javascript">
		function validation() {
			var FirstName = document.forms["projectForm"]["firstName"].value;
			if (FirstName == "" || FirstName == null) {
				document.getElementById('firstNameError').innerHTML = '<font color="red">*</font>';
				return false;
			}
			else {
				document.getElementById('firstNameError').innerHTML = '';
			}
			
			var LastName = document.forms["projectForm"]["lastName"].value;
			if (LastName == "" || LastName == null) {
				document.getElementById('lastNameError').innerHTML = '<font color="red">*</font>';
				return false;
			}
			else {
				document.getElementById('lastNameError').innerHTML = '';
			}
			
			var Age = document.forms["projectForm"]["age"].value;
			if (Age == "" || Age == null) {
				document.getElementById('ageError').innerHTML = '<font color="red">*</font>';
				return false;
			}
			else if (isNaN(Age)) {
				alert('Please, Enter a number');
				return false;
			}
			else {
				document.getElementById('ageError').innerHTML = '';
			}
			
			var Gender = document.forms["projectForm"]["gender"].value;
			if (Gender == "selectGender") {
				document.getElementById('genderError').innerHTML = '<font color="red">*</font>';
				return false;
			}
			else {
				document.getElementById('genderError').innerHTML = '';
			}
			
			var Biography = document.forms["projectForm"]["biography"].value;
			if (Biography == "" || Biography == null) {
				document.getElementById('biographyError').innerHTML = '<font color="red">*</font>';
				return false;
			}
			else {
				document.getElementById('biographyError').innerHTML = '';
			}
			
			var Email = document.forms["projectForm"]["email"].value;
			if(Email == "" || Email == null){
				  alert('Please, Enter a valid e-mail address');
				  return false;
			}
			else if(Email != "" || Email != null){
					var atpos=Email.indexOf("@");
				var dotpos=Email.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=Email.length)
				  {
				  alert('Please, Enter a valid e-mail address');
				  return false;
				  }
			}
			
			var Password = document.forms["projectForm"]["password"].value;
			if (Password == "" || Password == null) {
				document.getElementById('passwordError').innerHTML = '<font color="red">*</font>';
				return false;
			}
			else if (Password.length < 8 || Password.length > 28) {
				alert('Your password must be between 8 and 28 characters long.');
				return false;
			}
			else {
				document.getElementById('passwordError').innerHTML = '';
			}
			
			var ConfirmPassword = document.forms["projectForm"]["confirmPassword"].value;
			if (ConfirmPassword == "" || ConfirmPassword == null) {
				document.getElementById('confirmPasswordError').innerHTML = '<font color="red">*</font>';
				return false;
			}
			else if (Password != ConfirmPassword) {
				alert('Password and Confirm Password did not match');
				return false;
			}
			else {
				document.getElementById('confirmPasswordError').innerHTML = '';
				document.getElementById('success').innerHTML = 'successfully registered';
				alert('FName: '+FirstName+' LName: '+LastName+' Age: '+Age+' Gender: '+ Gender+' Biography: '+Biography);
			}
		}
	</script>
</body>
</html>