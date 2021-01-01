<?php

session_start();

// Print any session messages.
if (isset($_SESSION['message']))
{
    echo($_SESSION['message']);
    $_SESSION['message'] = null;
}

$adminEnabled = true;
/*

$server_name = "localhost";
$username = "root";
$password = "";
$database = "reillythate.com";

$conn = new mysqli($server_name, $username, $password, $database);

if($conn->connect_errno)
{
    die("Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $mysqli->connect_error);
}
*/

//  
//  Using Doctrine\DBAL for MYSQL functionality.
//  
//  
$connectionParams = array(
    'dbname' => 'reillythate.com',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);
try
{
    $conn->connect();
} catch (Exception $e)
{
    echo $e->getMessage() . PHP_EOL;
    var_dump(memory_get_peak_usage());
}
$conn->getConfiguration()->setSQLLogger(null);

?>