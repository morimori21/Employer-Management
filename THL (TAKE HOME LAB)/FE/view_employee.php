<?php include '../php/view.php'; ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background: linear-gradient(135deg, #393e46, #222831);
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 1.5em;
            font-weight: bold;
        }
        .nav-list {
            list-style: none;
            display: flex;
        }
        .nav-list li {
            margin-right: 20px;
        }
        .nav-list a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar">
    <div class="logo">Employee Information System</div>
    <ul class="nav-list">
        <li><a href="home.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</nav>

<h1>Employee List</h1>
<table>
    <thead>
        <tr>
            <th>Employee_Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Department</th>
            <th>Degree</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= htmlspecialchars($employee[0]) ?></td>
                <td><?= htmlspecialchars($employee[1]) ?></td>
                <td><?= htmlspecialchars($employee[2]) ?></td>
                <td><?= htmlspecialchars($employee[3]) ?></td>
                <td><?= htmlspecialchars($employee[4]) ?></td>
                <td><?= htmlspecialchars($employee[5]) ?></td>
                <td><?= htmlspecialchars($employee[6]) ?></td>
                <td><?= htmlspecialchars($employee[7]) ?></td>
                <td><?= htmlspecialchars($employee[8]) ?></td>
                <td><?= htmlspecialchars($employee[9]) ?></td>
                <td><?= htmlspecialchars($employee[10]) ?></td>
                <td>
                    <a href="edit_employee.php?empid=<?= urlencode($employee[0]) ?>">Edit</a> |
                    <a href="view_salary.php?employee_id=<?= urlencode($employee[0]) ?>">View Salary</a> |
                    <form method="POST" action="../php/del_employee.php" style="display:inline;">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($employee[0]) ?>">
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
