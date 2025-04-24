<?php
include '../php/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $empid = $_POST['id'];
    $new_firstname = $_POST['new_firstname'];
    $new_lastname = $_POST['new_lastname'];
    $new_email = $_POST['new_email'];
    $new_birthday = $_POST['new_birthday'];
    $new_gender = $_POST['new_gender'];
    $new_contact = $_POST['new_contact'];
    $new_address = $_POST['new_address'];
    $new_dept = $_POST['new_dept'];
    $new_degree = $_POST['new_degree'];
    $new_position = $_POST['new_position'];

    $query = "UPDATE employee SET firstname=?, lastname=?, email=?, birthday=?, gender=?, contact=?, address=?, dept=?, degree=?, position=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssssi", 
        $new_firstname, $new_lastname, $new_email, $new_birthday, 
        $new_gender, $new_contact, $new_address, $new_dept, 
        $new_degree, $new_position, $empid
    );

    if ($stmt->execute()) {
        header("Location: ../FE/view_employee.php");
        exit();
    } else {
        echo "Error updating employee details: " . $stmt->error;
    }
}
?>
