<!DOCTYPE html>
<html>

<head>
    <title>Edit Data User</title>
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
        $result = mysqli_query($mysqli, "SELECT * FROM users WHERE id_user=$id");

        // memeriksa apakah data siswa ditemukan
        if (mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_array($result);
            ?>
            <form method="POST" action="edituser.php?id=<?php echo $data['id_user']; ?>">
                <table>
                    <tr>
                        <td>Nama Lengkap:</td>
                        <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" value="<?php echo $data['username']; ?>"autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>password:</td>
                        <td><input type="password" name="password" value="<?php echo $data['password']; ?>"autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>Umur:</td>
                        <td><input type="text" name="umur" value="<?php echo $data['umur']; ?>"autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin:</td>
                        <td><input type="text" name="jenis_kel" value="<?php echo $data['jenis_kel']; ?>"autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>Alamat:</td>
                        <td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Simpan"></td>
                    </tr>
                </table>
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
            </form>
            <?php

            // memeriksa method permintaan
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // memeriksa input data
                $nama = $_POST['nama'];
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $umur = $_POST['umur'];
                $jenis_kel = $_POST['jenis_kel'];
                $alamat = $_POST['alamat'];

                // mengupdate data siswa berdasarkan id
                $result = mysqli_query($mysqli, "UPDATE users SET nama='$nama', username='$username', password='$password', umur='$umur', jenis_kel='$jenis_kel', alamat='$alamat' WHERE id_user=$id");

                // memeriksa apakah operasi UPDATE berhasil atau gagal
                if ($result) {
                    // jika berhasil, redirect ke halaman restoran.php
                    header("Location: user.php");
                } else {
                    // jika gagal, tampilkan pesan kesalahan
                    echo "Gagal mengubah data restoran.";
                }
            }
        } else {
            // jika data siswa tidak ditemukan, redirect ke halaman restoran.php
            header("Location: user.php");
        }
    } else {
        // jika parameter id tidaktersedia, redirect ke halaman restoran.php
            header("Location: user.php");
        }
    ?>
</body>

</html>