<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
session_start();
include 'config/koneksi.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($konek, $_POST['username']);
    $password = $_POST['password'];

    $query = mysqli_query($konek, "SELECT * FROM login WHERE username='$username'");
    $data = mysqli_fetch_assoc($query);

    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("Location: menu.php");
        exit();
    } else {
        header("Location: index.php?pesan=gagal");
        exit();
    }
} else {
    header("Location: index.php?pesan=invalid");
    exit();
}
?>
