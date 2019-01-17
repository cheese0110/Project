<?php
$servername = "localhost";
$username = "it57660079";
$password = "rftPHJJk";
$db = "it57660079";

$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
        die("Connect failed:".mysqli_connect_error());
}
$conn->set_charset("utf8");

?>

