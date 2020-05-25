<!-- HERE WE DELETE THE APPROPRIATE ROW FROM THE DATABASE TABLE -->
<?php
require("../includes/is_logged_in.php");
require("../includes/connect.php");
?>

<?php
$sender = $_GET["friend_name"];
$reciever = $_GET["user_name"];

$delete_q = "DELETE FROM `friendship` WHERE `Person_name`='$sender' AND `Friend_name`='$reciever'";
$delete_q_result = mysqli_query($conn, $delete_q);

if ($delete_q_result) {
    header("location: user_profile.php");
} else {
    echo (mysqli_error($conn));
}
?>