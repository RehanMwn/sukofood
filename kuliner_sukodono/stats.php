<!DOCTYPE html>
<html>
<head>
    <title>Status User</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="page">
        <h1 class="heading">Status User</h1>
        <h3>Pilih Status Akun:</h3>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?? ''; ?>">
            <label><input type="radio" name="status" value="0" autocomplete="off">Aktif</label>
            <label><input type="radio" name="status" value="1" autocomplete="off">Blokir</label>

            <h3>Alasan:</h3>
            <input type="text" name="reason">

            <button type="submit" class="submit">Submit</button>
            <a href="user.php" class="back">Kembali</a>
        </form>
    </div>
    <?php
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

    // Jika form submit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $status = $_POST['status'];
      $reason = $_POST['reason'];

      $query_update = "UPDATE users SET is_blocked = '$status', block_reason = '$reason' WHERE id_user = '$id'";
$result = mysqli_query($conn, $query_update);

      if ($result) {
        // Berhasil mengupdate status akun pengguna
        if ($status == 1) {
          echo "<script>alert('Akun dengan ID '$id' telah diblokir.')document.location = 'user.php'</script>";
        } else {
          echo "<script>alert('Akun dengan ID '$id' telah diaktifkan kembali.') document.location = 'user.php'</script>";
        }
      } else {
        // Gagal mengupdate status akun pengguna
        echo "<script>alert('Terjadi kesalahan saat mengubah status akun pengguna.')</script>";
      }
    }

    // Tutup koneksi
    mysqli_close($conn);
    ?>
</body>
</html>