<?php
include '../config.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php");
    exit();
}

if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category_id = (int)$_POST['category_id'];
    $price = (float)$_POST['price'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);

    $sql = "INSERT INTO products (category_id, name, description, price, image)
            VALUES ('$category_id', '$name', '$description', '$price', '$image')";
    if (mysqli_query($conn, $sql)) {
        $msg = "Produs adăugat.";
    } else {
        $msg = "Eroare la adăugare produs.";
    }
}

$cats = mysqli_query($conn, "SELECT * FROM categories");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Adaugă produs</title>
</head>
<body>
<h2>Adaugă produs</h2>
<form method="post">
    <input type="text" name="name" placeholder="Nume produs" required><br>
    <select name="category_id" required>
        <option value="">Alege categorie</option>
        <?php while ($c = mysqli_fetch_assoc($cats)) { ?>
            <option value="<?php echo $c['id']; ?>"><?php echo $c['name']; ?></option>
        <?php } ?>
    </select><br>
    <input type="text" name="price" placeholder="Preț" required><br>
    <textarea name="description" placeholder="Descriere"></textarea><br>
    <input type="text" name="image" placeholder="URL imagine"><br>
    <button type="submit" name="add">Adaugă</button>
</form>
<?php if (!empty($msg)) echo "<p>$msg</p>"; ?>
<p><a href="admin_home.php">Înapoi</a></p>
</body>
</html>
