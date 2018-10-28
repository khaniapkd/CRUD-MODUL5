<?php
// koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'db_absensi');

// perintah delete
$queryDelete = "DELETE FROM asisten WHERE kode_asisten = 'HAM'";

// untuk menjalankan perintah delete
$result = mysqli_query($conn, $queryDelete);
?>


// $querySelect = "SELECT * FROM absensi ORDER BY date DESC";
// $querySelect = "SELECT DISTINCT nama, tanggal FROM absensi ORDER BY tanggal DESC";
// $queryInsert = "INSERT INTO asisten (kode_asisten, nama, no_hp) VALUES ('HAM', 'Muhammad Ilham', '082345179223')";
// $queryUpdate = "UPDATE asisten SET no_hp='082175788920' WHERE kode_asisten='HAM'";
