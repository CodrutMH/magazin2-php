<?php
include 'config.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            if (!empty($_SESSION['redirect_after_login'])) {
                $url = $_SESSION['redirect_after_login'];
                unset($_SESSION['redirect_after_login']);
                header("Location: $url");
                exit();
            }

            header("Location: categories.php");
            exit();
        }
    }
    $error = "Date de autentificare greșite.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<form method="post">
    <h2>Login</h2>
    <input type="text" name="username" required><br>
    <input type="password" name="password" required><br>
    <button type="submit" name="login">Login</button>
    <p><a href="register.php">Nu ai cont? Register</a></p>
    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
</form>
</body>
</html>
