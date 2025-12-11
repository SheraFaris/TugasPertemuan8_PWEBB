<?php
$host = "localhost";
$user = "root";      // ganti kalau perlu
$pass = "";          // ganti kalau perlu
$db   = "db_pendaftaran";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
