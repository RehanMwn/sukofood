<?php


// cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
  // jika belum login, redirect ke halaman login
  header('Location: login.php');
  exit();
}

// ambil data user dari database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kuliner_sukodono";

// buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// cek koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// ambil data user dari tabel users berdasarkan username
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

// jika data user ditemukan, tampilkan informasi profil user
if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();
  ?>

<!DOCTYPE html>
<html>
<head>
  <title>Profil User</title>
</head>
<body>
  <div class="container">
    <div class="login">
      <h1>Profil User</h1>
      <p>Nama lengkap: <?php echo $user['nama']; ?><a href="editprofil.php?id=<?php echo $user['id_user']; ?>" class="edit">  Ubah Profil</a></p>
      <p>Umur: <?php echo $user['umur']; ?></p>
      <p>Jenis Kelamin: <?php echo $user['jenis_kel']; ?></p>
      <p>Alamat: <?php echo $user['alamat']; ?></p>
      <p>Username: <?php echo $user['username']; ?></p>
      <p>Password: <?php echo $user['password']; ?></p>
      <style>
        .edit {
          color: #bbb;
          text-decoration: none;
          font-size: 16px;
        }
      </style>
    </div>
  </div>
</body>
</html>

  <?php
} else {
  // jika data user tidak ditemukan, redirect ke halaman login
  header('Location: login.php');
  exit();
}

// tutup koneksi
$conn->close();
?>
<script>
function confirmLogout() {
  var confirmation = confirm("Apakah Anda yakin ingin logout?");
  if (confirmation) {
    window.location.href = "logout.php";
  }
}
</script>