<?php
include 'config.php';

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Eroare la înregistrare.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<form method="post">
    <h2>Register</h2>
    <input type="text" name="username" placeholder="username" required><br>
    <input type="email" name="email" placeholder="email" required><br>
    <input type="password" name="password" placeholder="parola" required><br>
    <button type="submit" name="register">Register</button>
    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
</form>
</body>
</html>
