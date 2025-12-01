<?php
include '../config.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
</head>
<body>
<h2>Bun venit, <?php echo $_SESSION['admin_username']; ?></h2>
<ul>
    <li><a href="admin_add_product.php">Adaugă produs</a></li>
    <li><a href="admin_products_list.php">Lista produse</a></li>
    <li><a href="logout_admin.php">Logout</a></li>
</ul>
</body>
</html>
