<!DOCTYPE html>
<html>
<?php session_start();
      if (empty($_SESSION['username']))
       { echo " <script> alert('Login is required to view this page')
        document.location = 'login.php' </script>"; }?>
<head>
    <title>Menampilkan Tabel Reviews</title>
    <link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>
    <div class="page">
        <h1 class="heading">Menampilkan Tabel Reviews</h1>
        <a href="tambahreview.php" class="add">Tambahkan Data</a>
        <a href="dash.php" class="bk">Kembali</a>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Restoran</th>
                        <th>Rating</th>
                        <th>Komentar</th>
                        <th>Tanggal Review</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "koneksi.php";
                    $query_mysql = mysqli_query($mysqli, "SELECT reviews.user_id, users.username, restoran.nama, reviews.rating, reviews.komentar, reviews.tanggal_review FROM reviews JOIN users ON reviews.user_id=users.id_user JOIN restoran ON reviews.restoran_id=restoran.id_restoran");
                    $nomor = 1;
                    while ($data = mysqli_fetch_array($query_mysql)) {
                    ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['rating']; ?></td>
                            <td><?php echo $data['komentar']; ?></td>
                            <td><?php echo $data['tanggal_review']; ?></td>
                            <td><a href="hapusreview.php?id=<?php echo $data['user_id']; ?>" class="delete">Delete</a></td>
                            <td><a href="editreview.php?id=<?php echo $data['user_id']; ?>" class="edit">Edit</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br>
        
    </div>

    
</body>
</html>
