<?php
include 'config.php';
$cats = mysqli_query($conn, "SELECT * FROM categories");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Categorii</title>
</head>
<body>
<h2>Categorii produse</h2>
<ul>
<?php while ($c = mysqli_fetch_assoc($cats)) { ?>
    <li>
        <a href="products.php?cat_id=<?php echo $c['id']; ?>">
            <?php echo $c['name']; ?>
        </a>
    </li>
<?php } ?>
</ul>

<p><a href="cart.php">Vezi coșul</a></p>

<?php if (isset($_SESSION['user_id'])) { ?>
    <p>Bun venit, <?php echo $_SESSION['username']; ?> | <a href="logout.php">Logout</a></p>
<?php } else { ?>
    <p><a href="login.php">Login</a></p>
<?php } ?>
</body>
</html>
