<?php
// file untuk koneksi ke database
include_once("config.php");

// Mengambil kode asisten dari URL
$kode_asisten = $_GET['kode_asisten'];

// menghapus data asisten dari tabel
$result = mysqli_query($mysqli, "DELETE FROM tb_asisten WHERE kode_asisten='$kode_asisten'");

// Kembali ke halaman index
header("Location:index.php");
?>
