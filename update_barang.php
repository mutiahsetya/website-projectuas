<?php
//----------------------//
session_start();
    if (empty($_SESSION['username']))
    {
        header("location:index.php");
    }
//----------------//
include "config/koneksi.php";

        $lokasi_file = $_FILES['fupload']['tmp_name'];
        $nama_file = $_FILES['fupload']['name'];

        //apabila gambar tidak diganti//
        if (empty($lokasi_file)){
            mysqli_query($konek, "UPDATE barang SET namabrg ='$_POST[barang]',
                                                    kategori = '$_POST[kategori]',
                                                    harga = '$_POST[harga]',
                                                    jumlah = '$_POST[jumlah]',
                                                    warna = '$_POST[warna]',
                                                WHERE idbarang = '$_POST[id]'");
        }
        //apabila gambar diganti//
        else{
            move_uploaded_file($lokasi_file,"gambar/$nama_file");
            mysqli_query($konek,"UPDATE barang SET namabrg ='$_POST[barang]',
                                                    kategori = '$_POST[kategori]',
                                                    harga = '$_POST[harga]',
                                                    jumlah = '$_POST[jumlah]',
                                                    warna = '$_POST[warna]',
                                                    gambar = '$nama_file'
                                                WHERE idbarang = '$_POST[id]' ");
        }

        header('location:tampil_barang.php');
        ?>
