<!-- 
	Taking username and password as input from user.
	Checking with database.
	If username and password match is found ,
	fname, lname, email, username, userid these session variables are created
	and the user is logged into the system.

	If user does not have an account, link is provided for sign up page.
-->


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Cache-control" content="no-cache">
	<title>Login Page</title>
	<link rel='stylesheet' type='text/css' media='screen' href='css/index.css'>

</head>

<body>
	<!-- HTML FORM FOR TAKING INPUT FROM USER ABOUT LOGIN DETAILS -->
	<div class="box">
		<form method="POST">
			<h1>LOGIN</h1>
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password" id="password" pattern=".{8,}" title="Eight or more characters">
			<?php
			require("includes/connect.php");

			if (isset($_POST["login"])) {
				$usn = trim($_POST["username"]);
				$pass = md5($_POST['password']);
				$login_q = "SELECT * FROM `users` WHERE `username`='$usn' AND `password`='$pass'";
				$result = mysqli_query($conn, $login_q);
				if ($row = mysqli_fetch_array($result)) {
					session_start();

					// creating session variables
					$_SESSION["fname"] = $row['fname'];
					$_SESSION["lname"] = $row['lname'];
					$_SESSION["email"] = $row['email'];
					$_SESSION["username"] = $row['username'];
					$_SESSION['userid'] = $row['user_id'];
					header("location: profile/user_profile.php");
				} else {
					echo ("<h5>Invalid username and/or password</h2>");
					echo ("<h5>Invalid username and/or password</h2>");
				}
			}
			?> <input type="submit" name="login" value="Login">
		</form>

		<h3>Don't have an account?
			<a href="register.php">Register here</a>
		</h3>
	</div>
</body>

</html>