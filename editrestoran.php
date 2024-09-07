<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Siswa</title>
</head>

<body>
    <h1>Edit Data</h1>
    <?php
    // memanggil file koneksi database
    include_once("koneksi.php");

    // memeriksa apakah parameter id tersedia pada permintaan GET
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // mengeksekusi query SELECT untuk mendapatkan data siswa berdasarkan id
        $result = mysqli_query($mysqli, "SELECT * FROM restoran WHERE id_restoran=$id");

        // memeriksa apakah data siswa ditemukan
        if (mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_array($result);
            ?>
            <form method="POST" action="editrestoran.php?id=<?php echo $data['id_restoran']; ?>">
                <table>
                    <tr>
                        <td>Nama Restoran:</td>
                        <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Alamat:</td>
                        <td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Telepon:</td>
                        <td><input type="text" name="telepon" value="<?php echo $data['telepon']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Jam Pelayanan:</td>
                        <td><input type="text" name="jam_buka_jam_tutup" value="<?php echo $data['jam_buka_jam_tutup']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Deskripsi:</td>
                        <td><input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Menu:</td>
                        <td><input type="text" name="menu" autocomplete="off" value="<?php echo $data['menu']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Rating Restoran:</td>
                        <td><input type="text" name="rating_restoran" value="<?php echo $data['rating_restoran']; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Simpan"></td>
                    </tr>
                </table>
            </form>
            <?php

            // memeriksa method permintaan
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // memeriksa input data
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $telepon = $_POST['telepon'];
                $jam_buka_jam_tutup = $_POST['jam_buka_jam_tutup'];
                $deskripsi = $_POST['deskripsi'];
                $menu = $_POST['menu'];
                $rating_restoran = $_POST['rating_restoran'];

                // mengupdate data siswa berdasarkan id
                $result = mysqli_query($mysqli, "UPDATE restoran SET nama='$nama', alamat='$alamat', telepon='$telepon', jam_buka_jam_tutup='$jam_buka_jam_tutup', deskripsi='$deskripsi', menu='$menu', rating_restoran='$rating_restoran' WHERE id_restoran=$id");

                // memeriksa apakah operasi UPDATE berhasil atau gagal
                if ($result) {
                    // jika berhasil, redirect ke halaman restoran.php
                    header("Location: restoran.php");
                } else {
                    // jika gagal, tampilkan pesan kesalahan
                    echo "Gagal mengubah data restoran.";
                }
            }
        } else {
            // jika data siswa tidak ditemukan, redirect ke halaman restoran.php
            header("Location: restoran.php");
        }
    } else {
        // jika parameter id tidaktersedia, redirect ke halaman restoran.php
            header("Location: restoran.php");
        }
    ?>
</body>

</html>