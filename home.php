<div class="page">
  <title>Home</title>
</head>
<body>
  <h1 class="sel" >Selamat datang di website kuliner Sukodono</h1>
  <p>Temukan berbagai kuliner lezat di daerah Sukodono.</p>

  <h2>Cari Kuliner</h2>
  <form method="post" action="">
    <label for="kategori">Berdasarkan:</label>
    <select id="kategori" name="kategori">
      <option value="nama_restoran">Nama restoran</option>
      <option value="menu">Menu</option>
      <option value="rating_restoran">Rating</option>
      <option value="alamat">Alamat</option>
    </select>
    <label for="search">Search:</label>
    <input type="text" name="search" id="search" autocomplete="off" placeholder="Cari...">
    <input type="submit" name="submit" value="Search">
  </form>

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

  // Cek apakah form pencarian telah di-submit
  if(isset($_POST['submit'])) {
    // Tangkap kata kunci pencarian dan kategori yang dipilih
    $search = $_POST['search'];
    $kategori = $_POST['kategori'];

    // Kolom yang akan digunakan dalam query
    $column = '';
    if ($kategori === 'nama_restoran') {
      $column = 'nama';
    } elseif ($kategori === 'rating_restoran') {
      $column = 'rating_restoran';
    } elseif ($kategori === 'alamat') {
    $column = 'alamat';
    } elseif ($kategori === 'menu') {
      $column = 'menu';
    }

    // Query pencarian
    $sql = "SELECT * FROM restoran WHERE $column LIKE '%$search%'";

    // Eksekusi query
    $result = mysqli_query($conn, $sql);

    // Cek apakah hasilnya ada
    if(mysqli_num_rows($result) > 0) {
      // Tampilkan hasil pencarian dalam kotak-kotak
      while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card">';
        echo '<h3>' . $row["nama"] . '</h3>';
        echo '<p>Deskripsi:' . $row["deskripsi"] . '</p>';
        echo '<p>Menu: ' . $row["menu"] . '</p>';
        echo '<p>Alamat: ' . $row["alamat"] . '</p>';
        echo '<p>Telepon: ' . $row["telepon"] . '</p>';
        echo '<p>Jam Pelayanan: ' . $row["jam_buka_jam_tutup"] . '</p>';
        echo '<p>Rating Restoran: ' . $row["rating_restoran"] . '</p>';
        echo '</div>';
      }

      // Simpan data histori pencarian ke dalam database
      $sql = "INSERT INTO histori (kategori, search) VALUES ('$kategori', '$search')";
      mysqli_query($conn, $sql);
    } else {
      // Tampilkan pesan bahwa tidak ditemukan hasil pencarian
      echo "Tidak ditemukan hasil pencarian";

      // Simpan data histori pencarian ke dalam database
      $sql = "INSERT INTO histori (kategori, search) VALUES ('$kategori', '$search')";
      mysqli_query($conn, $sql);
    }
  } else {
    // Query untuk menampilkan semua data restoran
    $sql = "SELECT * FROM restoran";

    // Eksekusi query
    $result = mysqli_query($conn, $sql);

    // Tampilkan semua data restoran dalam kotak-kotak
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card">';
        echo '<h3>' . $row["nama"] . '</h3>';
        echo '<p>Deskripsi:' . $row["deskripsi"] . '</p>';
        echo '<p>Alamat: ' . $row["alamat"] . '</p>';
        echo '<p>Telepon: ' . $row["telepon"] . '</p>';
        echo '<p>Jam Pelayanan: ' . $row["jam_buka_jam_tutup"] . '</p>';
        echo '<p>Rating Restoran: ' . $row["rating_restoran"] . '</p>';
        echo '</div>';
    }

    // Tutup koneksi
    mysqli_close($conn);
  }
  ?>
</div>