<!-- THESE ARE SOME IMPORTANT FILES THAT MUST BE INCLUDED -->

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
	<title>Edit Profile</title>
	<link rel='stylesheet' type='text/css' media='screen' href='../css/index.css'>
</head>

<body>

	<!-- DISPLAYING ALL THE POSTS OF THE USER -->
	<div class='container'>
		<div class='post'>
			<a target="_blank" href='https://en.gravatar.com/'>Profile Photo</a>
			<?php
			echo ("<a href='change_personal_information.php?user_name=$usn'>Personal Information</a>");
			echo ("<a href='change_password.php?user_name=$usn'>Password</a>");
			echo ("<h3>Your posts:</h3>");
			echo ('</div></div>');



			////////////////////////////////////////////////////////////////////////////
			$get_posts_q = "SELECT * FROM `posts` WHERE `uploaded_by`='$usn' ORDER BY `time` DESC";
			$get_posts_q_result = mysqli_query($conn, $get_posts_q);

			if ($get_posts_q_result) {
				while ($row = mysqli_fetch_array($get_posts_q_result)) {
					$caption = $row['Caption'];
					$posted_by = $row['uploaded_by'];
					echo ("<div class='container'><div class='post'>");
					echo ("<h3>" . $posted_by . "</h3>");
					echo ("<img src='../images/" . $row['photo'] . "' >"); // // echo ("<br>");
					echo ("<h4>" . $caption . "</h4>");
					echo ('</div></div>');
				}
			} else {
				echo (mysqli_error($conn));
			}
			/////////////////////////////////////////////////////////////////////////////////////
			?>
</body>

</html>