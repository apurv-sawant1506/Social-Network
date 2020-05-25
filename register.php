<!-- 
Firstname, last name , email ,username and password
This information is taken from the user and stored in the database.
The password is encrypted using md5 encryption.


If the user already has an account, then a link is provided to sign in page.
-->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Cache-control" content="no-cache">
	<title>Register Page</title>
	<link rel='stylesheet' type='text/css' media='screen' href='css/index.css'>
</head>

<body>
	<div class="box">
		<form method="POST">
			<h1>REGISTER</h1>
			<input type='text' name='fname' placeholder="First Name">
			<input type='text' name='lname' placeholder="Last Name">
			<input type='text' name='username' placeholder="Username">
			<input type='email' name='email' placeholder="Email">
			<input type="password" name="password" placeholder="Password" id="password" pattern=".{8,}" title="Eight or more characters">
			<input type="password" name="rpassword" placeholder="Retype Password" id="password" pattern=".{8,}" title="Eight or more characters">
			<?php
			require('includes/connect.php');
			if (isset($_POST['register'])) {
				$fname = trim($_POST["fname"]);
				$lname = trim($_POST["lname"]);
				$usn = trim($_POST["username"]);
				$email = trim($_POST['email']);
				$pass = md5($_POST['password']); //using md5 encryption for password.
				$rpass = md5($_POST['rpassword']);
				if ($pass != $rpass) {
					echo ("<h5>Passwords don't match</h2>");
				} else {
					$query_admin = mysqli_query($conn, "SELECT * FROM test WHERE email = '$email'");

					$insert_q = "INSERT INTO `users`(`fname`,`lname`,`username`, `email`, `password`) VALUES ('$fname','$lname','$usn','$email','$pass')";
					$result = mysqli_query($conn, $insert_q);
					if ($result) {
						header("location: index.php");
					} else {
						echo (mysqli_error($conn));
					}
				}
			}
			?> <input type='submit' name='register' value='Register'>
		</form>
		<h3>Already have an account?
			<a href="index.php">Login here</a>
		</h3>
	</div>
</body>

</html>