<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
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
        form {
            background-color: rgba(200, 200, 200, 0.5); /* Reduced opacity here */
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
    
    
    <style>

        



        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            
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
        form {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            width: 300px;
            margin: auto;
        }
        input[type="text"],
        input[type="email"],
        input[type="gender"] {
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
    </style>
</head>
<nav class="navbar">
    <div class="logo">Employee Information System</div>
    <ul class="nav-list">
        <li><a href="home.php">Home</a></li>
        <li><a href="view_employee.php">View Employee</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</nav>

<body>
    <form action="../php/add.php" method="post">
        <input type="text" name="firstname" placeholder="Firstname" required>
        <input type="text" name="lastname" placeholder="Lastname" required>
        <input type="email" name="email" placeholder="Email" required><br>
        <label>Birthday</label>
        <input type="date" name="birthday" placeholder="Birthday" required>
        <input type="text" name="gender" placeholder="Gender" required>
        <input type="number" name="contact" placeholder="Contact Number" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="dept" placeholder="Department" required>
        <input type="text" name="degree" placeholder="Degree" required>
        <input type="text" name="position" placeholder="Position" required>
        <input type="submit" value="Add">
    </form>  

    <a href="view_employee.php">View</a>

    <?php if (isset($_SESSION['message'])): ?>
        <p class="message"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif; ?>
</body>
</html>