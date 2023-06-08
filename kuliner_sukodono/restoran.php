<html>
     <?php session_start();
      if (empty($_SESSION['username']))
       { echo " <script> alert('Login is required to view this page')
        document.location = 'login.php' </script>"; }
         ?> <head> <div class="page">
         <h1 class="heading">Menampilkan Tabel Restoran</h1>
         <link rel="stylesheet" type="text/css" href="table.css"> </div> 
        </head> 
        <body>
<a href="tambahrestoran.php" class="add">Tambahkan Data</a> 
<a href="dash.php" class="bk">Kembali</a>
<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Restoran</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Jam Buka - Jam Tutup</th>
                <th>Deskripsi</th>
                <th>Menu</th>
                <th>Rating Restoran</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM restoran");
            $nomor = 1;
            while ($data = mysqli_fetch_array($query_mysql)) {
            ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['telepon']; ?></td>
                    <td><?php echo $data['jam_buka_jam_tutup']; ?></td>
                    <td><?php echo $data['deskripsi']; ?></td>
                    <td><?php echo $data['menu']; ?></td>
                    <td><?php echo $data['rating_restoran']; ?></td>
                    <td><a href="hapusrestoran.php?id=<?php echo $data['id_restoran']; ?>" class="delete">Delete</a></td>
                    <td><a href="editrestoran.php?id=<?php echo $data['id_restoran']; ?>" class="edit">Edit</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</div>
</body>
 </html>
