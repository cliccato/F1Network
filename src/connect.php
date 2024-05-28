<?php
$dbhost = 'localhost:3306';
$dbname = 'f1network2';
$dbuser = 'root';
$dbpass = '';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die('Error connecting to server: ' . $conn->connect_error);
}
?>
