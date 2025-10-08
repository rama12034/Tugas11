<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
  $nama_barang = $_POST['nama_barang'];
  $stok = $_POST['stok'];
  $harga = $_POST['harga'];
  $tanggal_expired = $_POST['tanggal_expired'];

  if ($nama_barang != "" && $stok != "" && $harga != "" && $tanggal_expired != "") {
    $query = "INSERT INTO barang (nama_barang, stok, harga, tanggal_expired)
              VALUES ('$nama_barang', '$stok', '$harga', '$tanggal_expired')";
    mysqli_query($conn, $query);
    header("Location: index.php");
  } else {
    echo "<script>alert('Semua field wajib diisi!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Barang</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="bg-white p-8 rounded-xl shadow-lg w-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Tambah Barang</h1>
    <form method="post">
      <input type="text" name="nama_barang" placeholder="Nama Barang" class="w-full mb-3 p-2 border rounded" required>
      <input type="number" name="stok" placeholder="Stok" class="w-full mb-3 p-2 border rounded" required>
      <input type="number" name="harga" placeholder="Harga" class="w-full mb-3 p-2 border rounded" required>
      <input type="date" name="tanggal_expired" class="w-full mb-3 p-2 border rounded" required>
      <button type="submit" name="simpan" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Simpan</button>
    </form>
    <a href="index.php" class="block text-center mt-4 text-blue-500">Kembali</a>
  </div>
</body>
</html>
