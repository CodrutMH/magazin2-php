<?php
include 'config.php';

$id = (int)$_GET['id'];
$product_q = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
$product = mysqli_fetch_assoc($product_q);

if (!$product) {
    die("Produs inexistent.");
}

if (isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['user_id'])) {
        $_SESSION['redirect_after_login'] = "product_details.php?id=" . $id;
        header("Location: login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $quantity = (int)$_POST['quantity'];

    $check = mysqli_query($conn, "SELECT * FROM tbl_cart 
                                  WHERE user_id='$user_id' AND product_id='$id'");
    if ($row = mysqli_fetch_assoc($check)) {
        $new_q = $row['quantity'] + $quantity;
        mysqli_query($conn, "UPDATE tbl_cart SET quantity='$new_q'
                             WHERE id='" . $row['id'] . "'");
    } else {
        mysqli_query($conn, "INSERT INTO tbl_cart (user_id, product_id, quantity)
                             VALUES ('$user_id', '$id', '$quantity')");
    }

    $msg = "Produs adăugat în coș.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detalii produs</title>
</head>
<body>
<h2><?php echo $product['name']; ?></h2>
<p>Preț: <?php echo $product['price']; ?> lei</p>
<p><?php echo $product['description']; ?></p>

<form method="post">
    Cantitate: <input type="number" name="quantity" value="1" min="1">
    <button type="submit" name="add_to_cart">Adaugă în coș</button>
</form>
<?php if (!empty($msg)) echo "<p>$msg</p>"; ?>

<p><a href="cart.php">Vezi coșul</a></p>
<p><a href="categories.php">Înapoi la categorii</a></p>
</body>
</html>
