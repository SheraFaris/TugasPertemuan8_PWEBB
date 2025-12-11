<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nim     = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
    $alamat  = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $sql = "INSERT INTO mahasiswa (nama, nim, jurusan, alamat)
            VALUES ('$nama', '$nim', '$jurusan', '$alamat')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: list-mahasiswa.php");
        exit;
    } else {
        $error = "Gagal menyimpan: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran Mahasiswa</title>
</head>
<body>

<h2>Form Pendaftaran Mahasiswa</h2>
<p><a href="list-mahasiswa.php">Kembali ke daftar</a></p>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post">
    <p>
        <label>Nama<br>
            <input type="text" name="nama" required>
        </label>
    </p>
    <p>
        <label>NIM<br>
            <input type="text" name="nim" required>
        </label>
    </p>
    <p>
        <label>Jurusan<br>
            <input type="text" name="jurusan" required>
        </label>
    </p>
    <p>
        <label>Alamat<br>
            <textarea name="alamat" rows="3"></textarea>
        </label>
    </p>
    <p>
        <button type="submit">Simpan</button>
    </p>
</form>

</body>
</html>
