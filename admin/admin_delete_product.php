<?php
include '../config.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php");
    exit();
}

$id = (int)$_GET['id'];
mysqli_query($conn, "DELETE FROM products WHERE id='$id'");
header("Location: admin_products_list.php");
exit();
