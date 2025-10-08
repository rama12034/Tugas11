<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
  if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Username sudah digunakan!');</script>";
  } else {
    mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
    echo "<script>alert('Pendaftaran berhasil! Silakan login.');window.location='login.php';</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="bg-white p-8 rounded-xl shadow-lg w-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required class="w-full mb-3 p-2 border rounded">
      <input type="password" name="password" placeholder="Password" required class="w-full mb-3 p-2 border rounded">
      <button type="submit" name="register" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">Daftar</button>
    </form>
    <p class="text-center mt-4">Sudah punya akun? <a href="login.php" class="text-blue-500">Login</a></p>
  </div>
</body>
</html>
