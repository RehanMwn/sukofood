</table>
    <h3>Tambahkan User</h3>
    <form method="post" action="">
    <table>
        <tr>
            <td width="130">Nama User:</td>
            <td><input type="text" name="nama_user" required autocomplete="off"></td>
        </tr>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" required autocomplete="off"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" required autocomplete="off"></td>
        </tr>
        <tr>
            <td>Umur:</td>
            <td><input name="umur" required autocomplete="off"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin:</td>
            <td><select for="jenis_kel" name="jenis_kel">
    <option value="laki-laki">Laki-laki</option>
    <option value="perempuan">Perempuan</option>
    </select required><td>
        </tr>
        <tr>
            <td>Alamat:</td>
            <td><input type="text" name="alamat" required autocomplete="off"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value ="Simpan" name="proses"></td>
        </tr>
    </table>
    </form>
<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($mysqli,"insert into users set
    nama = '$_POST[nama_user]',
    username = '$_POST[username]',
    password = '$_POST[password]',
    umur = '$_POST[umur]',
    jenis_kel = '$_POST[jenis_kel]',
    alamat = '$_POST[alamat]'");
    echo "Data user baru berhasil tersimpan."; 
    header("location:user.php");
}



?>