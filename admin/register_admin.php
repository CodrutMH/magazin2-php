<?php
include '../config.php';

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO admins (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $sql)) {
        header("Location: login_admin.php");
        exit();
    } else {
        $error = "Eroare la înregistrare.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Admin</title>
</head>
<body>
<form method="post">
    <h2>Register Admin</h2>
    <input type="text" name="username" placeholder="username" required><br>
    <input type="password" name="password" placeholder="parola" required><br>
    <button type="submit" name="register">Register</button>
    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
</form>
</body>
</html>
