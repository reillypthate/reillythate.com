<?php

session_start();

$adminEnabled = true;

$server_name = "localhost";
$username = "root";
$password = "";
$database = "reillythate.com";

$conn = new mysqli($server_name, $username, $password, $database);

if($conn->connect_errno)
{
    die("Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $mysqli->connect_error);
}

?>