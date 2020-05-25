<?php
require("../includes/is_logged_in.php");
require("../includes/connect.php");
$usn = $_SESSION["username"];
$friend_usn = $_GET["friend_uname"];

$add_friend_q = "INSERT INTO `friendship`(`Person_name`, `Friend_name`, `status`) VALUES ('$usn','$friend_usn',0)";
$add_friend_result = mysqli_query($conn, $add_friend_q);

if ($add_friend_result) {
    header("location: user_profile.php");
} else {
    echo (mysqli_error($conn));
}
