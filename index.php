<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("location:login.php");
}
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Barang</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <div class="p-6 max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-4">Daftar Barang</h1>
    <a href="tambah.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Barang</a>
    <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2">Logout</a>

    <table class="w-full mt-6 border border-gray-300 text-center">
      <tr class="bg-gray-200">
        <th class="p-2 border">No</th>
        <th class="p-2 border">Nama Barang</th>
        <th class="p-2 border">Stok</th>
        <th class="p-2 border">Harga</th>
        <th class="p-2 border">Expired</th>
        <th class="p-2 border">Aksi</th>
      </tr>

      <?php
      $no = 1;
      $data = mysqli_query($conn, "SELECT * FROM barang");
      while ($row = mysqli_fetch_assoc($data)) {
      ?>
        <tr>
          <td class="border p-2"><?= $no++ ?></td>
          <td class="border p-2"><?= $row['nama_barang'] ?></td>
          <td class="border p-2"><?= $row['stok'] ?></td>
          <td class="border p-2"><?= $row['harga'] ?></td>
          <td class="border p-2"><?= $row['tanggal_expired'] ?></td>
          <td class="border p-2">
            <a href="ubah.php?id=<?= $row['id_barang'] ?>" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
            <a href="hapus.php?id=<?= $row['id_barang'] ?>" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>
</body>
</html>
