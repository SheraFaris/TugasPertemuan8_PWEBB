<?php
require 'db.php';

if (!isset($_GET['id'])) {
    header("Location: list-mahasiswa.php");
    exit;
}

$id = (int) $_GET['id'];

// ambil data lama
$q   = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id=$id");
$data = mysqli_fetch_assoc($q);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nim     = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
    $alamat  = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $sql = "UPDATE mahasiswa 
            SET nama='$nama', nim='$nim', jurusan='$jurusan', alamat='$alamat'
            WHERE id=$id";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: list-mahasiswa.php");
        exit;
    } else {
        $error = "Gagal mengubah: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
</head>
<body>

<h2>Edit Data Mahasiswa</h2>
<p><a href="list-mahasiswa.php">Kembali ke daftar</a></p>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post">
    <p>
        <label>Nama<br>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
        </label>
    </p>
    <p>
        <label>NIM<br>
            <input type="text" name="nim" value="<?= htmlspecialchars($data['nim']); ?>" required>
        </label>
    </p>
    <p>
        <label>Jurusan<br>
            <input type="text" name="jurusan" value="<?= htmlspecialchars($data['jurusan']); ?>" required>
        </label>
    </p>
    <p>
        <label>Alamat<br>
            <textarea name="alamat" rows="3"><?= htmlspecialchars($data['alamat']); ?></textarea>
        </label>
    </p>
    <p>
        <button type="submit">Update</button>
    </p>
</form>

</body>
</html>
