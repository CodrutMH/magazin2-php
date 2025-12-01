<?php
include '../config.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php");
    exit();
}

$res = mysqli_query($conn, "SELECT p.*, c.name AS cat_name FROM products p JOIN categories c ON p.category_id=c.id");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista produse</title>
</head>
<body>
<h2>Lista produse</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nume</th>
        <th>Categorie</th>
        <th>Preț</th>
        <th>Acțiuni</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($res)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['cat_name']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td>
            <a href="admin_edit_product.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a href="admin_delete_product.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
<p><a href="admin_home.php">Înapoi</a></p>
</body>
</html>
