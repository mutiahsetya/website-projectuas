<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
// ----- Cek Login ----- //
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>:: Menu Utama ::</title>
    <link rel="stylesheet" href="assets/css/menu.css">
</head>
<body>
    <center>
        <p align="center"><font size="12"><b>MENU UTAMA</b></font></p>
        <?php
        echo "<h5>Login Sebagai : " . htmlspecialchars($_SESSION['username']) . "</h5>";
        ?>

        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_1pxqjqps.json"
                       background="transparent"
                       speed="1"
                       style="width: 400px; height: 400px;"
                       loop autoplay>
        </lottie-player>

        <form method="POST" action="form_barang.php">
            <button>Tambah Barang</button>
        </form>

        <form method="POST" action="tampil_barang.php">
            <button>Tampil Barang</button>
        </form>

        <form method="POST" action="logout.php">
            <button>LogOut</button>
        </form>
    </center>
</body>
</html>
