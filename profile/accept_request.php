<!-- HERE WE HAVE TO ACCEPT THE REQUEST. -->
<!-- UPDATE THE DATABASE STATUS FROM 0 TO 1 -->

<?php
require("../includes/is_logged_in.php");
require("../includes/connect.php");
?>

<?php
$sender = $_GET["friend_name"];
$reciever = $_GET["user_name"];

$insert_q = "UPDATE `friendship` SET `status`=1 WHERE `Person_name`='$sender' AND `Friend_name`='$reciever'";
$insert_q_result = mysqli_query($conn, $insert_q);

if ($insert_q_result) {
    header("location: user_profile.php");
} else {
    echo (mysqli_error($conn));
}
?>