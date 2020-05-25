<!-- INCLUDE DELETE POST BUTTON AFTER DISPLAYING EACH POST.
TRY NOT TO REDIRECT TO ANOTHER PAGE FOR PASSWORD CHANGE. -->
<?php

//including some required files
require('../includes/is_logged_in.php');
require('../includes/connect.php');
require('../includes/header.php');

$usn = $_SESSION["username"];
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$email = $_SESSION["email"];

//code of inserting image to database

if (isset($_POST["upload"])) {
	$target = "../images/" . basename($_FILES['image']['name']);
	$image = $_FILES['image']['name'];
	$caption = $_POST['caption'];

	$insert_query = "INSERT INTO `posts`(`uploaded_by`, `Caption`, `photo`) VALUES ('$usn','$caption','$image')";
	$insert_result = mysqli_query($conn, $insert_query);
	if (!$insert_result) {
		echo (mysqli_error($conn));
	}

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		header('location: user_profile.php');
	} else {
		echo ("There was a problem");
	}
} //inserting image done

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Profile</title>
	<link rel='stylesheet' type='text/css' media='screen' href='../css/index.css'>
</head>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#blah').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

<body>
	<form class="addPost post" method="post" enctype="multipart/form-data">
		<!-- <input type="file" name="image"> -->
		<div class="input">
			<label for="file-input">
				<img src="../icons/imageColored.png" />
			</label>

			<input id="file-input" type="file" name="image" />


		</div>
		<input type=" text" name="caption" placeholder="Caption">
		<input type="submit" name="upload" value="upload">
	</form>
	<?php
	//displaying the posts
	$fetch_q = "SELECT * FROM `posts` WHERE (`uploaded_by` IN
		(SELECT `Friend_name` FROM `friendship` WHERE
		`Person_name`='$usn' AND `status` = 1)) OR uploaded_by='$usn' ORDER BY `time` DESC";
	$result = mysqli_query($conn, $fetch_q);

	if ($result) {
		while ($row = mysqli_fetch_array($result)) {
			$caption = $row['Caption'];
			$posted_by = $row['uploaded_by'];
			echo ("<div class='container'><div class='post'>");
			echo ("<h3>" . $posted_by . "</h3>");
			echo ("<img src='../images/" . $row['photo'] . "' >");
			echo ("<h4>" . $caption . "</h4>");
			echo ('</div></div>');
		}
	} else {
		echo (mysqli_error($conn));
	}
	?>
</body>

</html>