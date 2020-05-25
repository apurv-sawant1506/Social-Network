<?php
require('../includes/is_logged_in.php');
require('../includes/connect.php');
$usn = $_GET["user_name"];

if (isset($_POST["insert"])) {
    $target = "../images/" . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];

    $update_q = "UPDATE `users` SET `user_profile`='$image' WHERE `user_name`='$usn'";
    $update_result = mysqli_query($conn, $update_q);
    if (!$update_result) {
        echo (mysqli_error($conn));
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        header('location: user_profile.php');
    } else {
        echo ("There was a problem");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Photo</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" id="image" />
        <br>
        <input type="submit" name="insert" value="Insert" />
    </form>
</body>

</html>