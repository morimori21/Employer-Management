<?php
$host = 'localhost';
$database = 'crud';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}?>
