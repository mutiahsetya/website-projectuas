
<link rel="stylesheet" href="assets/css/ibarang.css">
<?php
//-----cek login----//
session_start();
    if (empty($_SESSION['username']))
    {
    header("location:index.php");
    }
//-------------------------//
include "config/koneksi.php";
?>
<html>
<head>
    <title> :: Menu Utama ::</title>
    <link rel-"stylesheet" href="assets//css/ibarang.css">
</head>

<body>
    <center>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> 
        <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_qlwqp9xi.json"  background="transparent"  speed="1"  style="width: 420px; height: 420px;"  loop  autoplay></lottie-player>
    </center>

<?php
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $nama_file = $_FILES['fupload']['name'];

    //---bila yang diinput lengkap--//
    if(!empty($lokasi_file)){
        move_uploaded_file($lokasi_file, "gambar/$nama_file");
        $a= mysqli_query($konek, "INSERT INTO barang (namabrg,
                                                    kategori,
                                                    harga,
                                                    jumlah,
                                                    warna,
                                                    gambar)
                                VALUES('$_POST[barang]',
                                        '$_POST[kategori]',
                                        '$_POST[harga]',
                                        '$_POST[jumlah]',
                                        '$_POST[warna]',
                                        '$nama_file')");
?>
<script>
    alert('data berhasil di simpan');
    window.location="form_barang.php";
</script>
<?php
    }
    //---bila tidak lengkap---//
    else{
?>

<h1 align=center>Maaf, Data yang anda masukan tidak lengkap,a<br>
Silahkan Kembali,</h1>
<br><br>
<center>
    <table>
    <form method=POST action=form_barang.php>
        <button>Kembali</button>
    </form>
    <form method=POST action=logout.php>
        <button>LogOut</button>
    </form>
    </table>
    </center>

    <?php
    }
    ?>
</body>
</html>