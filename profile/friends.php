<!-- THIS PAGE DISPLAYS ALL THE FRIENDS OF THE USER AND ALLOWS THE USER TO SEARCH FOR A FRIEND -->

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
	<title>Friends</title>
	<link rel='stylesheet' type='text/css' media='screen' href='../css/index.css'>
</head>

<body>

	<div class='container'>

		<!-- HERE SEARCH BAR IS IMPLEMENTED TO FIND A FRIEND -->
		<form class='addPost post' action="find_friends.php" method="GET">
			<input type='text' name='friend_txt' placeholder="Search for Friend">
			<input type="submit" name="find" value="find">
		</form>

	</div>

	<!-- HERE WE WILL DISPLAY ALL THE CURRENT FRIENDS OF THE USER. -->

	<?php
	echo ("<div class='container'><div class='post'>");
	echo ("<h4>Current Friends:</h4>");

	$get_friends_q = "SELECT * FROM `friendship` WHERE `Person_name`='$usn' AND `status`=1";
	$get_friends_result = mysqli_query($conn, $get_friends_q);

	if ($get_friends_result) {
		while ($row = mysqli_fetch_array($get_friends_result)) {
			echo ("<h3>" . $row["Friend_name"]."</h3>");
		}
	} else {
		echo (mysqli_error($conn));
	}
	echo ('</div></div>');


	?>

	<!--  Here we will display the friend requests -->
	<?php
	echo ("<div class='container'><div class='post'>");

	echo ("<h4>Friend Requests:</h4>");

	echo ('</div></div>');
	$get_request_q = "SELECT * FROM `friendship` WHERE `Friend_name`='$usn' AND `status`=0";
	$get_request_q_result = mysqli_query($conn, $get_request_q);
	if ($get_request_q_result) {
		while ($row = mysqli_fetch_array($get_request_q_result)) {
			$fname = $row['Person_name'];

			echo ("<div class='container'><div class='post request'>");
			echo ("<h3>" . $fname . "</h3>" . "<a href='accept_request.php?user_name=$usn&friend_name=$fname'>Accept</a>"
				. "  " . "<a href='delete_request.php?user_name=$usn&friend_name=$fname'>Delete</a>");
			echo ('</div></div>');
		}
	} else {
		echo (mysqli_error($conn));
	}
	?>
</body>

</html>