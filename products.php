<?php
include 'config.php';

$cat_id = (int)$_GET['cat_id'];
$cat = mysqli_query($conn, "SELECT * FROM categories WHERE id='$cat_id'");
$cat_data = mysqli_fetch_assoc($cat);

$products = mysqli_query($conn, "SELECT * FROM products WHERE category_id='$cat_id'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Produse</title>
</head>
<body>
<h2>Produse din categoria: <?php echo $cat_data['name']; ?></h2>
<ul>
<?php while ($p = mysqli_fetch_assoc($products)) { ?>
    <li>
        <?php echo $p['name']; ?> - <?php echo $p['price']; ?> lei
        <a href="product_details.php?id=<?php echo $p['id']; ?>">Detalii</a>
    </li>
<?php } ?>
</ul>
<p><a href="categories.php">Înapoi la categorii</a></p>
<p><a href="cart.php">Vezi coșul</a></p>
</body>
</html>
