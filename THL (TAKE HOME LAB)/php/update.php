<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = $_POST['pid'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];


    $query = "UPDATE accounts SET fullname = ?, username = ?, email = ?, password = ?, address = ?, contact = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssi", $fullname, $username, $email, $password, $address, $contact, $pid);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Account successfully updated";
    } else {
        $_SESSION['message'] = "Error updating account: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

header("Location: ../FE/home.php");
exit();
