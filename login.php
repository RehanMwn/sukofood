<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="lcss.css">
</head>
<body>
  <div class="container">
    <h1 class="login">Login</h1>
    <form method="post">
      <label class="label" for="username">Username:</label><br>
      <input class="input" type="text" name="username" required autocomplete="off"><br><br>
      <label class="label" for="password">Password:</label><br>
      <input class="input" type="password" name="password" required autocomplete="off"><br>
      <input type="checkbox" onclick="myFunction()"> Show Password <br><br>
      <button class="submit" type="submit">Login</button><br><br>
      <button class="back" type="button" onclick="history.back()">Kembali</button>
      <a href="forgotpw.php">Forgot Password?</a>
      <a href="daftar.php">Sign up</a> 
    </form>
    <?php if (isset($error)): ?>
      <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
  </div>
</body>
</html>
<?php
// Memulai session
session_start();

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kuliner_sukodono";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

// Jika form login disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  // Query ke database untuk cek username dan password
  $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Jika username dan password benar, simpan session dan redirect ke halaman selanjutnya
    $_SESSION['username'] = $username;
    header('Location: index.php');
    exit;
  } else {
    // Jika username dan password salah, tampilkan pesan error
    $error = 
     "<script>
      alert('username atau pasword salah');
    </script>";
  }
}

  

// Tampilkan pesan error jika ada
if (isset($error)) {
  echo '<p class="error">' . $error . '</p>';
}
?>
<script>
        function myFunction() {
            var x = document.getElementsByName("password")[0];
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    
