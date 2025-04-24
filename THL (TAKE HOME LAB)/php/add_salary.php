<?php
include 'connect.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = isset($_GET['employee_id']) ? (int)$_GET['employee_id'] : null;

    $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
    $payment_date = isset($_POST['payment_date']) ? $_POST['payment_date'] : null;


    if ($employee_id && $amount > 0 && $payment_date) {
        $sss_contribution = round(0.05 * $amount, 2);
        $philhealth_contribution = round(0.05 * $amount, 2);
        $net_amount = round($amount - $sss_contribution - $philhealth_contribution, 2);

        $stmt = $conn->prepare("
            INSERT INTO salary (employee_id, amount, payment_date, 
                                sss_deduction, philhealth_deduction, net_amount)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        if ($stmt) {
            $stmt->bind_param("idssss", $employee_id, $amount, $payment_date, $sss_contribution, $philhealth_contribution, $net_amount);

            if ($stmt->execute()) {
    
                header("Location: ../FE/view_salary.php?employee_id=" . $employee_id);
                exit();
            } else {
                echo "Error adding salary: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Failed to prepare statement: " . $conn->error;
        }
    } else {
        echo "Invalid input data.";
    }
} else {
    echo "Invalid request method.";
}
?>
