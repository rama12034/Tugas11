<?php
include 'koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
  $nama_barang = $_POST['nama_barang'];
  $stok = $_POST['stok'];
  $harga = $_POST['harga'];
  $tanggal_expired = $_POST['tanggal_expired'];

  mysqli_query($conn, "UPDATE barang SET 
    nama_barang='$nama_barang',
    stok='$stok',
    harga='$harga',
    tanggal_expired='$tanggal_expired'
    WHERE id_barang='$id'");

  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Barang</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="bg-white p-8 rounded-xl shadow-lg w-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Edit Barang</h1>
    <form method="post">
      <input type="text" name="nama_barang" value="<?= $row['nama_barang'] ?>" class="w-full mb-3 p-2 border rounded" required>
      <input type="number" name="stok" value="<?= $row['stok'] ?>" class="w-full mb-3 p-2 border rounded" required>
      <input type="number" name="harga" value="<?= $row['harga'] ?>" class="w-full mb-3 p-2 border rounded" required>
      <input type="date" name="tanggal_expired" value="<?= $row['tanggal_expired'] ?>" class="w-full mb-3 p-2 border rounded" required>
      <button type="submit" name="update" class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">Update</button>
    </form>
    <a href="index.php" class="block text-center mt-4 text-blue-500">Kembali</a>
  </div>
</body>
</html>
