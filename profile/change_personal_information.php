<?php
require('../includes/is_logged_in.php');
require('../includes/connect.php');
require('../includes/header.php');

$usn = $_GET["user_name"];
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$email = $_SESSION["email"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update information</title>
	<link rel='stylesheet' type='text/css' media='screen' href='../css/index.css'>
</head>

<body>

	<!-- DISPLAYING ALL THE POSTS OF THE USER -->
	<?php
	echo ("	<div class='box'>");
	echo ("<form method='post'>");

	echo ("<h1>Update information</h1>");
	echo ("<input type='text' name='fname' value='$fname' placeholder='First Name'>");
	echo ("<input type='text' name='lname' value='$lname' placeholder='Last Name'>");
	echo ("<input type='text' name='email' value='$email' placeholder='Email' >");

	echo ("<input type='submit' name='submit' value='Update' >");
	echo ("</form></div>");

	if (isset($_POST['submit'])) {
		$new_fname = $_POST['fname'];
		$new_lname = $_POST['lname'];
		$new_email = $_POST['email'];

		$update_query = "UPDATE `users` SET `fname`='$new_fname',`lname`='$new_lname',`email`='$new_email' WHERE `username`='$usn'";
		$result = mysqli_query($conn, $update_query);

		if ($result) {
			header("location: edit_profile.php?user_name=$usn");
		} else {
			echo (mysqli_error($conn));
		}
	}
	?>
</body>

</html>