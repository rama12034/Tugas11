<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
  $cek = mysqli_num_rows($query);

  if ($cek > 0) {
    $_SESSION['user'] = $username;
    header("location:index.php");
  } else {
    echo "<script>alert('Username atau Password salah!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="bg-white p-8 rounded-xl shadow-lg w-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required class="w-full mb-3 p-2 border rounded">
      <input type="password" name="password" placeholder="Password" required class="w-full mb-3 p-2 border rounded">
      <button type="submit" name="login" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Login</button>
    </form>
    <p class="text-center mt-4">Belum punya akun? <a href="register.php" class="text-blue-500">Daftar</a></p>
  </div>
</body>
</html>
