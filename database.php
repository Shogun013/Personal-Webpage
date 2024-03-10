<?php
$hostname = "localhost"; 
$dbUser = "id21974227_llorenz";
$dbPassword = "2310050598Lor#";
$dbName = "id21974227_personal_db";

$conn = mysqli_connect($hostname, $dbUser, $dbPassword, $dbName); 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); 
}
?>