<?php 
require 'function.php';

$id = $_GET["id"];
$mhs = query("SELECT * FROM tbl_mhs WHERE id = $id")[0];

if(isset($_POST["submit"])){
if(update($_POST)>0){
    echo"<script>
    alert('Data Berhasil Diperbaharui');
    document.location.href = 'index.php';
    </script>";
} else{
    echo"<script>
    alert('Gagal Perbaru Data');
    document.location.href = 'index.php';
    </script>";
}

}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Update Data Mahasiswa</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<h1><p class="text-center">Update Data Mahasiswa</p></h1>
<button type="button" onclick="location.href='index.php'" class="btn btn-success">Kembali</button>

<form action="" method="post">
<input type = "hidden" name ="id" value="<?= $mhs["id"];?>">

  <div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <input type="text" class="form-control" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>">
  </div>

  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" name="nama" id="nama" required value="<?= $mhs["nama_mhs"]; ?>">
  </div>

  <div class="mb-3">
      <label for="jk" class="form-label">Jenis Kelamin</label>
  <select type="jk" name="jk" required value="<?= $mhs["jk"]; ?>">
    <?php
        $sql = "SELECT *FROM tbl_jk";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)!=''){
            while ($data = mysqli_fetch_array($result, MYSQLI_NUM)){
                ?>
                <option value = "<?php echo $data[1]?>"> <?php echo $data[1]?> </option>
                <?php
            }
        }else{
            ?>
            <option>Data Tidak Tersedia</option>
            <?php 
        }
    ?>
  </select>
</div>

<div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="alamat" required value="<?= $mhs["alamat"]; ?>">
  </div>

  <div class="mb-3">
      <label for="prodi" class="form-label">Program Studi</label>
  <select type="prodi" name="prodi" required value="<?= $mhs["prodi"]; ?>">
    <?php
        $sql = "SELECT *FROM tbl_prodi";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)!=''){
            while ($data = mysqli_fetch_array($result, MYSQLI_NUM)){
                ?>
                <option value = "<?php echo $data[1]?>"> <?php echo $data[1]?> </option>
                <?php
            }
        }else{
            ?>
            <option>Data Tidak Tersedia</option>
            <?php 
        }
    ?>
  </select>
</div>

<div class="mb-3">
    <label for="foto" class="form-label">Foto</label>
    <br>
    <input type="file" class="form" name="foto" id="foto" required value="<?= $mhs["foto"]; ?>">
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">E-Mail</label>
    <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" required value="<?= $mhs["email"]; ?>">
  </div>

  <div class="form-text">Pastikan Data Telah Diisi Dengan Benar</div>
  <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Apakah Data Telah Sesuai?');">Confirm</button>
</form>
</body>
</html>