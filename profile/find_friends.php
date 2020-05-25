<?php
require('../includes/is_logged_in.php');
require('../includes/connect.php');
require('../includes/header.php');
$usn = $_SESSION["username"];
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$email = $_SESSION["email"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Find Friends</title>
	<link rel='stylesheet' type='text/css' media='screen' href='../css/index.css'>
</head>

<body>
	<?php
	$friend_usn = $_GET["friend_txt"];
	$get_friend_query = "SELECT * FROM `users` WHERE `username`='$friend_usn'";
	$get_friend_query_result = mysqli_query($conn, $get_friend_query);

	if ($get_friend_query_result) {
		while ($row = mysqli_fetch_array($get_friend_query_result)) {
			echo ("<div class='container'><div class='post request'>");
			echo ("<h3>" . $row["username"] . "</h3>" . "<a href='add_friend.php?friend_uname=$friend_usn'>Add Friend</a>");
			echo ('</div></div>');
		}
	} else {
		echo ("Invalid user name entered.");
		echo (mysqli_error($conn));
	}
	?>
</body>

</html>