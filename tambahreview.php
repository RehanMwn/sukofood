<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Review</title>
</head>
<body>
    <h1>Form Tambah Review</h1>
    <hr>
    <hr>
    <form method="post">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>
                    <select name="username" required>
                        <option value="">- Pilih Username -</option>
                        <?php
                        include_once("koneksi.php");
                        $user_query = mysqli_query($mysqli, "SELECT username FROM users");
                        while ($row = mysqli_fetch_array($user_query)) {
                            ?>
                            <option value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama Restoran</td>
                <td>:</td>
                <td>
                    <select name="restoran" required>
                        <option value="">- Pilih Nama Restoran -</option>
                        <?php
                        include_once("koneksi.php");
                        $restoran_query = mysqli_query($mysqli, "SELECT nama FROM restoran");
                        while ($row = mysqli_fetch_array($restoran_query)) {
                            ?>
                            <option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Rating</td>
                <td>:</td>
                <td>
                    <input type="number" name="rating" min="1" max="5" required>
                </td>
            </tr>
            <tr>
                <td>Komentar</td>
                <td>:</td>
                <td>
                    <textarea name="komentar" required></textarea>
                </td>
            </tr>
            <tr>
                <td>Tanggal Review</td>
                <td>:</td>
                <td>
                    <input type="date" name="tanggal_review" required>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" value="Tambah Review" name="submit"> <!-- Menambahkan name="submit" -->
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
include_once("koneksi.php");

if(isset($_POST['submit'])) { // Mengubah kondisi menjadi if(isset($_POST['submit']))
    $username = $_POST['username'];
    $restoran = $_POST['restoran'];
    $rating = $_POST['rating'];
    $komentar = $_POST['komentar'];
    $tanggal_review = $_POST['tanggal_review'];

    // memeriksa apakah username dan restoran tersedia di database
    $user_query = mysqli_query($mysqli, "SELECT id_user FROM users WHERE username='$username'");
    if(mysqli_num_rows($user_query) != 1) {
        echo "Data user tidak ditemukan.";
        exit;
    }

    $row = mysqli_fetch_array($user_query);
    $user_id = $row['id_user'];

    $restoran_query = mysqli_query($mysqli, "SELECT id_restoran FROM restoran WHERE nama='$restoran'");
    if(mysqli_num_rows($restoran_query) != 1) {
        echo "Data restoran tidak ditemukan.";
        exit;
    }

    $row = mysqli_fetch_array($restoran_query);
    $restoran_id = $row['id_restoran'];

    // memeriksa input data dan menyimpan data review ke database
    $query = "INSERT INTO reviews (user_id, restoran_id, rating, komentar, tanggal_review) VALUES ($user_id, $restoran_id, '$rating', '$komentar', '$tanggal_review')";
    $result = mysqli_query($mysqli, $query);

    // memeriksa apakah operasi INSERT berhasil atau gagal
    if ($result) {
        // jika berhasil, tampilkan pesan sukses
        header("Location: review.php");
    } else {
        // jika gagal, tampilkan pesan error
        echo "Terjadi kesalahan saat menyimpan data review: " . mysqli_error($mysqli);
    }

    // menutup koneksi database
    mysqli_close($mysqli);
}
?>
