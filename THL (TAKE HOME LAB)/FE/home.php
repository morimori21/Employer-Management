<?php
session_start();
include '../php/connect.php';
if (!isset($_SESSION['username'])) {
    header("Location: ../php/login.php");
    exit();
}
$result = mysqli_query($conn, "SELECT * FROM accounts");
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    $message = null;
}
$userName = $_SESSION['username']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            margin:0;
        }
        h1 {
            color: #333;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin: 20px;
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
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #393e46;
            color: #fff;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="logo">Employee Information System</div>
    <ul class="nav-list">
        <li><a href="home.php">Home</a></li>
        <li><a href="add_employee.php">Add Employee</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</nav>

<h1>Registration Details</h1>

<!-- Display Flash Message -->
<?php if ($message) : ?>
    <div class="alert"><?php echo htmlspecialchars($message); ?></div>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Contact #</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?php echo htmlspecialchars($row['fullname']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['address']); ?></td>
            <td><?php echo htmlspecialchars($row['contact']); ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- Logout and User Profile -->
<div>
    <a href="../php/logout.php" style="background-color: #a42424; color: #fff; padding: 5px 10px; border-radius: 5px;">Logout</a>
    <a href="person_page.php" style="margin-left: 10px;"><?php echo htmlspecialchars($userName); ?>'s Info</a>
</div>

</body>
</html>


