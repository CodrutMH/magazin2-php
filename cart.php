<?php
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['update_cart'])) {
    foreach ($_POST['qty'] as $cart_id => $qty) {
        $qty = (int)$qty;
        if ($qty <= 0) {
            mysqli_query($conn, "DELETE FROM tbl_cart WHERE id='$cart_id' AND user_id='$user_id'");
        } else {
            mysqli_query($conn, "UPDATE tbl_cart SET quantity='$qty' 
                                 WHERE id='$cart_id' AND user_id='$user_id'");
        }
    }
}

if (isset($_GET['delete'])) {
    $del_id = (int)$_GET['delete'];
    mysqli_query($conn, "DELETE FROM tbl_cart WHERE id='$del_id' AND user_id='$user_id'");
}

if (isset($_GET['empty'])) {
    mysqli_query($conn, "DELETE FROM tbl_cart WHERE user_id='$user_id'");
}

$sql = "SELECT c.id as cart_id, c.quantity, p.name, p.price
        FROM tbl_cart c
        JOIN products p ON c.product_id = p.id
        WHERE c.user_id='$user_id'";
$res = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Coș cumpărături</title>
</head>
<body>
<h2>Coșul tău</h2>
<form method="post">
<table border="1" cellpadding="5">
    <tr>
        <th>Produs</th>
        <th>Preț</th>
        <th>Cantitate</th>
        <th>Total</th>
        <th>Acțiune</th>
    </tr>
    <?php
    $grand_total = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $total = $row['price'] * $row['quantity'];
        $grand_total += $total;
    ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['price']; ?> lei</td>
        <td>
            <input type="number" name="qty[<?php echo $row['cart_id']; ?>]" 
                   value="<?php echo $row['quantity']; ?>" min="0">
        </td>
        <td><?php echo $total; ?> lei</td>
        <td>
            <a href="cart.php?delete=<?php echo $row['cart_id']; ?>">Șterge</a>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="3"><strong>Total general</strong></td>
        <td colspan="2"><strong><?php echo $grand_total; ?> lei</strong></td>
    </tr>
</table>
<br>
<button type="submit" name="update_cart">Actualizează coșul</button>
</form>

<p>
    <a href="cart.php?empty=1">Golește coșul</a> |
    <a href="categories.php">Continuă cumpărăturile</a> |
    <a href="logout.php">Logout</a>
</p>
</body>
</html>
