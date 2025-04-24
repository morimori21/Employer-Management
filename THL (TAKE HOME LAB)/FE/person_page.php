<?php include '../php/person.php'; ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Details</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            margin: 0;
        }
        h1 { color: #333; }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover { text-decoration: underline; }
        form {
            background-color: rgba(200, 200, 200, 0.5);
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            margin: auto;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
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

<h1>Personal Details:</h1>
<a href="home.php">Back to Home</a>

<form action="../php/update.php" method="post">
    <input type="hidden" name="pid" value="<?php echo htmlspecialchars($data[0]); ?>">
    <input type="text" name="fullname" placeholder="Full name" value="<?php echo htmlspecialchars($data[1]); ?>" required>
    <input type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($data[2]); ?>" required>
    <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($data[3]); ?>" required>
    <input type="password" name="password" placeholder="Password" value="<?php echo htmlspecialchars($data[4]); ?>" required>
    <input type="text" name="address" placeholder="Address" value="<?php echo htmlspecialchars($data[5]); ?>" required>
    <input type="text" name="contact" placeholder="Contact" value="<?php echo htmlspecialchars($data[6]); ?>" required>
    <input type="submit" value="Update Info">
</form>
</body>
</html>
