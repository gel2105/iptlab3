<?php

$host = "localhost";
$port = "3306"; 
$username = "root";
$password = "";
$db_name = "ipt101";

$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
