<?php 

// Data Base Connection
$host = "localhost";
$usename = "root";
$password = "";
$dbname = "consultant";

$conn = new mysqli($host, $usename, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}


?>