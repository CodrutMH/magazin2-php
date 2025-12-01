<?php
include '../config.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php");
    exit();
}

$id = (int)$_GET['id'];

if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category_id = (int)$_POST['category_id'];
    $price = (float)$_POST['price'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);

    $sql = "UPDATE products 
            SET category_id='$category_id', name='$name', description='$description', price='$price', image='$image'
            WHERE id='$id'";
    mysqli_query($conn, $sql);
    $msg = "Produs actualizat.";
}

$prod = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
$data = mysqli_fetch_assoc($prod);
$cats = mysqli_query($conn, "SELECT * FROM categories");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editează produs</title>
</head>
<body>
<h2>Editează produs</h2>
<form method="post">
    <input type="text" name="name" value="<?php echo $data['name']; ?>" required><br>
    <select name="category_id" required>
        <?php while ($c = mysqli_fetch_assoc($cats)) { ?>
            <option value="<?php echo $c['id']; ?>" <?php if ($c['id'] == $data['category_id']) echo 'selected'; ?>>
                <?php echo $c['name']; ?>
            </option>
        <?php } ?>
    </select><br>
    <input type="text" name="price" value="<?php echo $data['price']; ?>" required><br>
    <textarea name="description"><?php echo $data['description']; ?></textarea><br>
    <input type="text" name="image" value="<?php echo $data['image']; ?>"><br>
    <button type="submit" name="update">Salvează</button>
</form>
<?php if (!empty($msg)) echo "<p>$msg</p>"; ?>
<p><a href="admin_home.php">Înapoi</a></p>
</body>
</html>
