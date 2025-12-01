<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "magazin2";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Conexiune eșuată: " . mysqli_connect_error());
}
?>
