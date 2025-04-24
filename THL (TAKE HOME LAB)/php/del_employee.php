<?php
include 'connect.php'; // Ensure this path is correct for DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $empid = (int)$_POST['id'];  

   
        $stmt = $conn->prepare("DELETE FROM employee WHERE id = ?");
        $stmt->bind_param("i", $empid);

        if ($stmt->execute()) {
            header("Location: ../FE/view_employee.php");
            exit();
        } else {
            echo "Error: Could not delete employee.";
        }

        $stmt->close();
    } else {
        echo "Invalid or missing employee ID.";
    }
}
?>
