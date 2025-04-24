<?php 
include '../php/connect.php'; 

if (!isset($_GET['empid']) || !is_numeric($_GET['empid'])) {
    die("Invalid employee ID.");
}

$empid = (int)$_GET['empid'];
$query = "SELECT * FROM employee WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $empid);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <form method="POST" action="../php/save_changes.php">
        <input type="hidden" name="id" value="<?= $employee['id'] ?>">

        <label for="new_firstname">First Name:</label>
        <input type="text" name="new_firstname" value="<?= htmlspecialchars($employee['firstName']) ?>" required>

        <label for="new_lastname">Last Name:</label>
        <input type="text" name="new_lastname" value="<?= htmlspecialchars($employee['lastName']) ?>" required>

        <label for="new_email">Email:</label>
        <input type="email" name="new_email" value="<?= htmlspecialchars($employee['email']) ?>" required>

        <label for="new_birthday">Birthday:</label>
        <input type="date" name="new_birthday" value="<?= htmlspecialchars($employee['birthday']) ?>" required>

        <label for="new_gender">Gender:</label>
        <input type="text" name="new_gender" value="<?= htmlspecialchars($employee['gender']) ?>" required>

        <label for="new_contact">Contact:</label>
        <input type="text" name="new_contact" value="<?= htmlspecialchars($employee['contact']) ?>" required>

        <label for="new_address">Address:</label>
        <input type="text" name="new_address" value="<?= htmlspecialchars($employee['address']) ?>" required>

        <label for="new_dept">Department:</label>
        <input type="text" name="new_dept" value="<?= htmlspecialchars($employee['dept']) ?>" required>

        <label for="new_degree">Degree:</label>
        <input type="text" name="new_degree" value="<?= htmlspecialchars($employee['degree']) ?>" required>

        <label for="new_position">Position:</label>
        <input type="text" name="new_position" value="<?= htmlspecialchars($employee['position']) ?>" required>

        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
