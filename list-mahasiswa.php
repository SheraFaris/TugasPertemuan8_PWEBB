<?php
require 'db.php';
$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <style>
        table { border-collapse: collapse; width: 400px; }
        th, td { border: 1px solid #333; padding: 4px 8px; }
        th { background: #ccc; }
    </style>
</head>
<body>

<h2>Mahasiswa yang sudah mendaftar</h2>
<p><a href="form-tambah.php">Tambah baru</a></p>

<table>
    <tr>
        <th>no</th>
        <th>Nama</th>
        <th>Tindakan</th>
    </tr>
    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['nama']); ?></td>
            <td>
                <a href="form-edit.php?id=<?= $row['id']; ?>">Edit</a> -
                <a href="hapus.php?id=<?= $row['id']; ?>"
                   onclick="return confirm('Yakin hapus data ini?');">Hapus</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
