<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Information System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            margin: 0 auto;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .header {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .button {
            display: block;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            text-decoration: none;
            margin: 10px auto;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .welcome {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (!isset($_SESSION['loggedin'])): ?>
        <div class="card">
            <div class="header">Employee Information System</div>
            <a class="button" href="../FE/login_page.php">Login</a>
            <a class="button" href="../FE/register_page.php">Register</a>
        </div>
        <?php else: ?>
        <div class="card">
            <div class="header">Welcome, <?= htmlspecialchars($_SESSION['username']) ?></div>
            <a class="button" href="../php/logout.php">Logout</a>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
