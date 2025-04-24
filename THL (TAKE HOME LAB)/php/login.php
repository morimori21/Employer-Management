<?php
session_start();
include'connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM accounts WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $user['id']; 
            $_SESSION['username'] = $user['username'];
            header("Location: ../FE/home.php"); 
            exit();
        } else {
            $_SESSION['error'] = "Incorrect username/password!";
            header("Location: ../FE/login_page.php"); 
            exit();
        }

        $stmt->close();
    }
}?>
