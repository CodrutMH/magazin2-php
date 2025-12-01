<?php
include 'config.php';
unset($_SESSION['user_id'], $_SESSION['username']);
header("Location: categories.php");
exit();
