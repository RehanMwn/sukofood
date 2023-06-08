echo '<div class="card">';
echo '<h3><a href="restoran.php?id_restoran=' . $row["id_restoran"] . '">' . $row["nama"] . '</a></h3>';
echo '<p>Deskripsi:' . $row["deskripsi"] . '</p>';
echo '<p>Alamat: ' . $row["alamat"] . '</p>';
echo '<p>Telepon: ' . $row["telepon"] . '</p>';
echo '<p>Jam Pelayanan: ' . $row["jam_buka_jam_tutup"] . '</p>';
echo '<p>Rating Restoran: ' . $row["rating_restoran"] . '</p>';
echo '</div>';