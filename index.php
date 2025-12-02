<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Magazin Online</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f7f7f7;
        }
        header {
            background: #333;
            padding: 20px;
            color: white;
            text-align: center;
            font-size: 28px;
        }
        .container {
            margin: 40px auto;
            width: 90%;
            max-width: 900px;
            text-align: center;
        }
        .box {
            background: white;
            padding: 30px;
            margin: 20px;
            border-radius: 10px;
            display: inline-block;
            width: 260px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }
        .box a {
            display: block;
            text-decoration: none;
            color: black;
            font-size: 20px;
            margin-top: 20px;
            padding: 10px;
            border: 2px solid black;
            border-radius: 6px;
            transition: 0.3s;
        }
        .box a:hover {
            background: black;
            color: white;
        }
        footer {
            margin-top: 50px;
            text-align: center;
            color: #777;
            padding: 20px;
        }
    </style>
</head>
<body>

<header>
    MAGAZIN ONLINE
</header>

<div class="container">
    <div class="box">
        <h2>Magazin</h2>
        <p>Vezi produsele disponibile.</p>
        <a href="categories.php">Intră în magazin</a>
    </div>

    <div class="box">
        <h2>Cont utilizator</h2>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>

    <div class="box">
        <h2>Admin Panel</h2>
        <a href="admin/login_admin.php">Login Admin</a>
        <a href="admin/register_admin.php">Register Admin</a>
    </div>
</div>

<footer>
    &copy; 2025 Magazin Online
</footer>

</body>
</html>
