<?php
session_start();
include 'connect.php'; 

if (!isset($_SESSION['id'])) {
    header("Location: ../php/login.php");
    exit();
}

$pid = $_SESSION['id'];
$query = "SELECT * FROM accounts WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $pid);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_row(); 
?>
