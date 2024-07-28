<?php
$servername = "sql306.infinityfree.com";
$username = "username";
$password = "password";
$dbname = "db_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
