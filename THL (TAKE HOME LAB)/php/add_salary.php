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

        // First, check if a salary record already exists for the employee
        $checkStmt = $conn->prepare("SELECT salary_id FROM salary WHERE employee_id = ?");
        $checkStmt->bind_param("i", $employee_id);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            // Salary exists, perform update
            $updateStmt = $conn->prepare("
                UPDATE salary 
                SET amount = ?, payment_date = ?, 
                    sss_deduction = ?, philhealth_deduction = ?, net_amount = ?
                WHERE employee_id = ?
            ");
            if ($updateStmt) {
                $updateStmt->bind_param("dsssdi", $amount, $payment_date, $sss_contribution, $philhealth_contribution, $net_amount, $employee_id);
                if ($updateStmt->execute()) {
                    header("Location: ../FE/view_salary.php?employee_id=" . $employee_id);
                    exit();
                } else {
                    echo "Error updating salary: " . $updateStmt->error;
                }
                $updateStmt->close();
            } else {
                echo "Failed to prepare update statement: " . $conn->error;
            }
        } else {
            // Salary doesn't exist, perform insert
            $insertStmt = $conn->prepare("
                INSERT INTO salary (employee_id, amount, payment_date, sss_deduction, philhealth_deduction, net_amount)
                VALUES (?, ?, ?, ?, ?, ?)
            ");
            if ($insertStmt) {
                $insertStmt->bind_param("idssss", $employee_id, $amount, $payment_date, $sss_contribution, $philhealth_contribution, $net_amount);
                if ($insertStmt->execute()) {
                    header("Location: ../FE/view_salary.php?employee_id=" . $employee_id);
                    exit();
                } else {
                    echo "Error inserting salary: " . $insertStmt->error;
                }
                $insertStmt->close();
            } else {
                echo "Failed to prepare insert statement: " . $conn->error;
            }
        }

        $checkStmt->close();
    } else {
        echo "Invalid input data.";
    }
} else {
    echo "Invalid request method.";
}
?>
