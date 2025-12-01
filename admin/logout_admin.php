<?php
include '../config.php';
unset($_SESSION['admin_id'], $_SESSION['admin_username']);
header("Location: login_admin.php");
exit();
