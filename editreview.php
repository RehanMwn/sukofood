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
        $result = mysqli_query($mysqli, "SELECT * FROM reviews WHERE user_id=$id");

        // memeriksa apakah data siswa ditemukan
        if (mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_array($result);
            ?>
            <form method="POST" action="editreview.php?id=<?php echo $data['user_id']; ?>">
                <table>
                    <tr>
                        <td>Reviewer:</td>
                        <td><input type="text" name="reviewer" value="<?php echo $data['reviewer']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Rating:</td>
                        <td><input type="text" name="rating" value="<?php echo $data['rating']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Komentar:</td>
                        <td><input type="text" name="komentar" value="<?php echo $data['komentar']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Review:</td>
                        <td><input type="text" name="tanggal_review" value="<?php echo $data['tanggal_review']; ?>"></td>
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
                $reviewer = $_POST['reviewer'];
                $rating = $_POST['rating'];
                $komentar = $_POST['komentar'];
                $tanggal_review = $_POST['tanggal_review'];
                // mengupdate data siswa berdasarkan id
                $result = mysqli_query($mysqli, "UPDATE reviews SET reviewer='$reviewer', rating='$rating', komentar='$komentar', tanggal_review='$tanggal_review' WHERE user_id=$id");

                // memeriksa apakah operasi UPDATE berhasil atau gagal
                if ($result) {
                    // jika berhasil, redirect ke halaman restoran.php
                    header("Location: review.php");
                } else {
                    // jika gagal, tampilkan pesan kesalahan
                    echo "Gagal mengubah data restoran.";
                }
            }
        } else {
            // jika data siswa tidak ditemukan, redirect ke halaman restoran.php
            header("Location: review.php");
        }
    } else {
        // jika parameter id tidaktersedia, redirect ke halaman restoran.php
            header("Location: review.php");
        }
    ?>
</body>

</html>