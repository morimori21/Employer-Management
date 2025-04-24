<?php
session_start();
include 'connect.php'; 

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['firstname']) && !empty($_POST['lastname'])) {
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $dept = $_POST['dept'];
        $degree = $_POST['degree'];
        $position = $_POST['position'];

        $check_query = "SELECT * FROM employee WHERE firstname = ? AND lastname = ?";
        $stmt = $conn->prepare($check_query);
        $stmt->bind_param("ss", $firstName, $lastName);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['message'] = "Employee already exists";
        } else {
   
            $insert_query = "INSERT INTO employee (firstname, lastname, email, birthday, gender, contact, address, dept, degree, position) 
                             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("ssssssssss", $firstName, $lastName, $email, $birthday, $gender, $contact, $address, $dept, $degree, $position);

            if ($stmt->execute()) {
                $_SESSION['message'] = "Employee record successfully added!";
            } else {
                $_SESSION['message'] = "Error: Could not add employee.";
            }
        }
        $stmt->close();
        header("Location: ../FE/add_employee.php");
        exit();
    } else {
        $_SESSION['message'] = "Please fill in all required fields.";
        header("Location: ../FE/add_employee.php");     
        exit();
    }
}?>
