<?php
require('../includes/is_logged_in.php');
require('../includes/connect.php');
require('../includes/header.php');

$usn = $_GET["user_name"];
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$email = $_SESSION["email"];

?>

<?php
if (isset($_POST['submit'])) {
	$new_password = md5($_POST['password']); //encrypting the password
	$update_password_query = "UPDATE `users` SET `password`='$new_password' WHERE `username`='$usn'";
	$result = mysqli_query($conn, $update_password_query);
	if ($result) {
		header("location: edit_profile.php?user_name=$usn");
	} else {
		echo (mysqli_error($conn));
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Change Password</title>
	<link rel='stylesheet' type='text/css' media='screen' href='../css/index.css'>
</head>

<body>
	<div class="box">
		<form method='post'>
			<input type='text' name='password' placeholder="Enter new password" />
			<br>
			<input type='submit' name='submit' value='Update Password' />
		</form>
	</div>
</body>

</html>