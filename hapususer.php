<?php
// memanggil file koneksi database
include_once("koneksi.php");

// memeriksa apakah parameter id tersedia pada permintaan GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // mengeksekusi query DELETE untuk menghapus data siswa berdasarkan id
    $result = mysqli_query($mysqli, "DELETE FROM users WHERE id_user=$id");

    // memeriksa apakah operasi DELETE berhasil atau gagal
    if ($result) {
        // mengatur ulang auto increment id pada tabel
        mysqli_query($mysqli, "ALTER TABLE users AUTO_INCREMENT=1");

        // redirect ke halaman utama
        header("Location:user.php");
    } else {
        // jika gagal, tampilkan pesan kesalahan
        echo "Gagal menghapus data.";
    }
} else {
    // jika parameter id tidak tersedia, redirect ke halaman utama
    header("Location:user.php");
}
?>