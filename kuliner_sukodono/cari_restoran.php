<?php
// memanggil file koneksi database
include_once("koneksi.php");

// memeriksa apakah ada parameter keyword yang dikirimkan melalui AJAX
if(isset($_POST['keyword'])){
    $keyword = $_POST['keyword'];

    // mencari restoran yang cocok dengan kata kunci
    $result = mysqli_query($mysqli, "SELECT * FROM restoran WHERE nama LIKE '%$keyword%'");
    if(mysqli_num_rows($result) > 0){
        // menampilkan daftar restoran yang ditemukan sebagai opsi pada select restoran_id
        echo '<option value="">-- Pilih Restoran --</option>';
        while($row = mysqli_fetch_array($result)){
            echo '<option value="'.$row['id_restoran'].'">'.$row['nama'].'</option>';
        }
    } else {
        // jika tidak ada restoran yang cocok dengan kata kunci
        echo '<option value="">Tidak ada restoran yang ditemukan.</option>';
    }
}
?>