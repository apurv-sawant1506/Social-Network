<?php
$servername = "localhost";
$username = "root";
$pass = "";
$db = "social-network";

$conn = mysqli_connect($servername, $username, $pass, $db) or die("Error connecting server");
if (!$conn) {
	die("Database connection failed: " . mysqli_connect_error());
}
