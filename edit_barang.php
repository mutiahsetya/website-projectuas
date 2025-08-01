<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php");
    exit;
}

include "config/koneksi.php";

$edit = mysqli_query($konek, "SELECT * FROM barang WHERE idbarang='$_GET[id]'");
$row = mysqli_fetch_array($edit);
?>
<html>
<head>
    <title>:: Edit Barang ::</title>
    <link rel="stylesheet" href="assets/css/ebarang.css">
</head>
<body>
<center>
    <h2>Edit Barang</h2>
    <h5>Login Sebagai: <?= $_SESSION['username']; ?></h5>
    <div class="glass">
        <form method="POST" enctype="multipart/form-data" name="update" action="update_barang.php">
            <input type="hidden" name="id" value="<?= $row['idbarang']; ?>">
            <table align="center" border="0" id="table1">
                <tr>
                    <td>Nama Barang</td>
                    <td><input type="text" name="barang" size="30" value="<?= $row['namabrg']; ?>"></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori">
                        <?php
                        $tampil = mysqli_query($konek, "SELECT * FROM kategori ORDER BY nama_kategori");
                        while ($c = mysqli_fetch_array($tampil)) {
                            if ($row['id_kategori'] == $c['id_kategori']) {
                                echo "<option value='$c[id_kategori]' selected>$c[nama_kategori]</option>";
                            } else {
                                echo "<option value='$c[id_kategori]'>$c[nama_kategori]</option>";
                            }
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga" size="15" value="<?= $row['harga']; ?>"></td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td><input type="text" name="jumlah" size="15" value="<?= $row['jumlah']; ?>"></td>
                </tr>
                <tr>
                    <td>Warna</td>
                    <td><input type="text" name="warna" size="15" value="<?= $row['warna']; ?>"></td>
                </tr>
                <tr>
                    <td>Gambar Saat Ini</td>
                    <td><img src="gambar/<?= $row['gambar']; ?>" width="200" height="200"></td>
                </tr>
                <tr>
                    <td>Ganti Gambar</td>
                    <td><input type="file" name="fupload"></td>
                </tr>
                <tr>
                    <td colspan="2">#Jika tidak ingin mengubah gambar, silakan abaikan saja</td>
                </tr>
                <tr>
                    <td colspan="2"><input id="update" type="submit" value="Perbarui"></td>
                </tr>
            </table>
        </form>
        <br><br>
        <table>
            <tr>
                <td>
                    <form method="POST" action="menu.php">
                        <button>Menu Utama</button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="tampil_barang.php">
                        <button>Tampil Barang</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</center>
</body>
</html>
