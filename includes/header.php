<?php
$usn = $_SESSION["username"];
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$email = $_SESSION["email"];
?>
<header>
	<div class="side dropdown">
		<div>
			<a> <?php echo ($usn); ?></a>
			<img class='dropdown' src='https://s.gravatar.com/avatar/<?php echo (md5(strtolower(trim($email)))); ?>'>
		</div>
		<div class="dropdown-content">
			<?php
			echo ("<a href=' user_profile.php'>$fname $lname</a>");
			echo ("<a href=' edit_profile.php?user_name=$usn'>Edit Profile</a>");
			echo ("<a href='friends.php?user_name=$usn'>Friends</a>");
			echo ("<a href='../includes/logout.php'>Logout</a>"); ?>
		</div>
	</div>
</header>