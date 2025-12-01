<?php
include '../config.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_username'] = $row['username'];
            header("Location: admin_home.php");
            exit();
        }
    }
    $error = "Date de autentificare greșite.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body>
<form method="post">
    <h2>Login Admin</h2>
    <input type="text" name="username" placeholder="username" required><br>
    <input type="password" name="password" placeholder="parola" required><br>
    <button type="submit" name="login">Login</button>
    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
</form>
</body>
</html>
