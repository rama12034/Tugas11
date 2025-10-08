<?php
$host = "localhost";
$user = "xirpl1-28";
$pass = "0096763002";
$db   = "db_xirpl1-28_3";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>
