<!DOCTYPE html>
<html>
<head>
    <title>Menampilkan Tabel Users</title>
    <link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>
    <?php
    session_start();
    if (empty($_SESSION['username'])) {
        echo "<script>
                alert('Login is required to view this page');
                document.location = 'login.php'
            </script>";
    }
    ?>
    <div class="page">
        <h1 class="heading">Menampilkan Tabel Users</h1>
        <a href="tambahuser.php" class="add">Tambahkan Data</a>
        <a href="dash.php" class="bk">Kembali</a>
        <table class="table">
            <thead>
                <tr>
                    <th>no</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th colspan="3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $query_mysql = mysqli_query($mysqli, "SELECT * FROM users");
                $nomor = 1;
                while ($data = mysqli_fetch_array($query_mysql)) {
                ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['password']; ?></td>
                        <td><?php echo $data['umur']; ?></td>
                        <td><?php echo $data['jenis_kel']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><a href="hapususer.php?id=<?php echo $data['id_user']; ?>" class="delete">Delete</a></td>
                        <td><a href="edituser.php?id=<?php echo $data['id_user']; ?>" class="edit">Edit</a></td>
                        <td><a href="stats.php"class="stats">Active</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>