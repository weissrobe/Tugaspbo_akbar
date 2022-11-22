<?php
require 'function.php';
$mahasiswa = query("SELECT * FROM tbl_mhs");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

</head>
<body>
<h1><p class="text-center">Data Mahasiswa</p></h1>
<br>
<a href="tambah.php">Tambahkan Mahasiswa</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">NIM</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Alamat</th>
      <th scope="col">Prodi</th>
      <th scope="col">Foto</th>
      <th scope="col">Email</th>
      <th scope="col">Fungsi</th>
    </tr>
  </thead>    

  <?php $i = 1; ?>
<?php foreach($mahasiswa as $row) : ?>
  <tbody>
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $row["nim"] ?></td>
      <td><?= $row["nama_mhs"] ?></td>
      <td><?= $row["jk"] ?></td>
      <td><?= $row["alamat"] ?></td>
      <td><?= $row["prodi"] ?></td>
      <td><img src="img/<?= $row["foto"]; ?>" width="50"></td>
      <td><?= $row["email"] ?></td>
      <td>
        <a href="update.php?id=<?= $row["id"]; ?>">Edit</a> |
        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Hapus Data Yang Dipilih?');">Hapus</a>
      </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
</body>
</html>