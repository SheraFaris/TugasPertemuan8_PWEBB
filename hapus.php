<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id=$id");
}

header("Location: list-mahasiswa.php");
exit;
