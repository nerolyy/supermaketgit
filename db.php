<?php
$servername = "localhost";
$username = "root";
$password = "root"; 
$dbname = "supermarket";
$port = 8889; 

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Успех";  
}
?>
