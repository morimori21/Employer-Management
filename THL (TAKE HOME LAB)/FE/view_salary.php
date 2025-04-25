<?php
include '../php/connect.php';  
$employee_id = isset($_GET['employee_id']) ? (int)$_GET['employee_id'] : 0;
$salaries = [];
if ($employee_id) {
    $stmt = $conn->prepare("SELECT * FROM salary WHERE employee_id = ?");
    $stmt->bind_param("i", $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $salaries = $result->fetch_all(MYSQLI_NUM);
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Salaries</title>
</head>
<body>
    <a href="home.php">Home</a>
    <h1>View Salaries</h1>
    <p>You are viewing salary for Employee ID: <?= htmlspecialchars($employee_id) ?></p>

    <?php if (!empty($salaries)): ?>
        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>Salary ID</th>
                    <th>Employee ID</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>SSS</th>
                    <th>Philhealth</th>
                    <th>Total Payout</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salaries as $salary): ?>
                    <tr>
                        <td><?= htmlspecialchars($salary[0]) ?></td>
                        <td><?= htmlspecialchars($salary[1]) ?></td>
                        <td><?= htmlspecialchars($salary[2]) ?></td>
                        <td><?= htmlspecialchars($salary[3]) ?></td>
                        <td><?= htmlspecialchars($salary[4]) ?></td>
                        <td><?= htmlspecialchars($salary[5]) ?></td>
                        <td><?= htmlspecialchars($salary[6]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="color: red;">This employee has no salary yet.</p>
    <?php endif; ?>

    <h2>Add Salary</h2>

    <form method="POST" action="../php/add_salary.php?employee_id=<?= $employee_id ?>">
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" required>
        <label for="payment_date">Payment Date:</label>
        <input type="date" id="payment_date" name="payment_date" required>
        <button type="submit">Save Salary</button>
    </form>
</body>
</html>
