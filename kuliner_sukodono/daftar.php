<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
    <link rel="stylesheet" href="daftarcss.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <h1>Sign Up</h1>
            <form method="post" action="">
                
                    <label class="label" for="nama">Nama Lengkap:</label><br>
                    <input class="input" type="text" name="nama" required autocomplete="off"><br><br>
                    <label class="label" for="umur">Umur:</label><br>
                    <input class="input" type="text" name="umur" required autocomplete="off"><br><br>
                    <label class="label" for="jenis_kel">Jenis Kelamin:</label>
                    <select for="jenis_kel" name="jenis_kel">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select required><br><br>
                    <label class="label" for="alamat">Alamat:</label><br>
                    <input class="input" type="text" name="alamat" required autocomplete="off"><br><br>
                    <label class="label" for="username">Username:</label><br>
                    <input class="input" type="text" name="username" required autocomplete="off"><br><br>
                    <label class="label" for="password">Password:</label><br>
                    <input class="input" type="password" name="password" required autocomplete="off"><br>
                <div class="form-group">
                    <input type="checkbox" onclick="myFunction()"> Show Password <br>
                </div>
                <button class="submit" type="submit">Signup</button><br>
                <a class="ah" href="login.php">Login</a>
            </form>
        </div>
    </div>
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
</body>
</html>

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
</body>
</html>
<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "kuliner_sukodono";
$conn = mysqli_connect($host, $user, $password, $database);
 
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
 
// Proses pendaftaran
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jenis_kel = $_POST['jenis_kel'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Enkripsi password menggunakan MD5
 
    // Cek apakah username sudah digunakan
    $cek_username = mysqli_query($conn, "SELECT * FROM users WHERE username='".$username."'");
    if (mysqli_num_rows($cek_username) > 0) {
        echo "<script>alert('Username sudah digunakan, silahkan gunakan username lain.');</script>";
    } else {
        // Simpan data user ke database
        $insert = mysqli_query ($conn, "INSERT INTO users (nama,umur,jenis_kel,alamat, username, password) VALUES ('$nama', '$umur' , '$jenis_kel','$alamat', '$username', '$password')");
        if ($insert) {
            echo "<script>alert('Pendaftaran berhasil, silahkan login.');</script>";
            echo "<meta http-equiv='refresh' content='0; url=login.php'>";
        } else {
            echo "<script>alert('Pendaftaran gagal, silahkan coba lagi.');</script>";
        }
    }
}
?>
