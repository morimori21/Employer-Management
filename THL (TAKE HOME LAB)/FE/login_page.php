<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #222831, #00adb5);
            color: #fff;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            color: #00adb5;
            font-size: 2em;
            margin-bottom: 20px;
        }

        a {
            color: #00adb5;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        form {
            background: linear-gradient(180deg, #393e46, #222831);
            border-radius: 10px;
            padding: 30px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            background-color: transparent;
            color: #fff;
        }

        input[type="submit"] {
            background: linear-gradient(135deg, #00adb5, #eeeeee);
            color: #222831;
            border: none;
            border-radius: 5px;
            padding: 12px 15px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background: linear-gradient(135deg, #eeeeee, #00adb5);
        }

        p {
            margin-top: 20px;
            font-size: 14px;
        }

        p a {
            color: #00adb5;
        }

        p a:hover {
            color: #eeeeee;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <form action="../php/login.php" method="post">
        <h1>Login</h1>

        <?php
        if (isset($_SESSION['error_message'])) {
            echo "<div class='alert error'>" . $_SESSION['error_message'] . "</div>";
            unset($_SESSION['error_message']);
        }

        if (isset($_SESSION['success_message'])) {
            echo "<div class='alert success'>" . $_SESSION['success_message'] . "</div>";
            unset($_SESSION['success_message']);
        }
        ?>

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
        <p>Don't have an account? <a href="register_page.php">Register</a></p>
    </form>

    <script>

        setTimeout(function () {
            document.querySelectorAll('.alert').forEach(alert => {
                alert.style.display = 'none';
            });
        }, 3000); 
    </script>
</body>

</html>
