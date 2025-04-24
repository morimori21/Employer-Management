<?php
session_start();
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['email'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password']; 
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];

        $sql = "SELECT * FROM accounts WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $accounts = $result->fetch_all();

        if (!empty($accounts)) {
            $_SESSION['flash_message'] = "Account already exists";
            $_SESSION['flash_message_type'] = "error";
        } else {
  
            $sql = "INSERT INTO accounts (id, fullname, username, email, password, address, contact) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $fullname, $username, $email, $password, $address, $contact);
            $stmt->execute();

            $_SESSION['flash_message'] = "Account successfully created!";
            $_SESSION['flash_message_type'] = "success";
        }
    } else {
        $_SESSION['flash_message'] = "Fill in the forms";
        $_SESSION['flash_message_type'] = "error";
    }

    header("Location: ../FE/index.php");
    exit();
}
?>
