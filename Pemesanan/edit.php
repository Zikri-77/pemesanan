<?php
include "koneksi.php";
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pemesanan WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Pemesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="container py-4">

  <h2>Edit Pemesanan Paket Wisata</h2>
  <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="<?= $data['email'] ?>" required>
    </div>
    <div class="mb-3">
      <label>No. Telepon</label>
      <input type="text" name="phone" class="form-control" value="<?= $data['phone'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control" required><?= $data['alamat'] ?></textarea>
    </div>
    <div class="mb-3">
      <label>Jumlah Paket</label>
      <input type="number" name="jumlah_paket" class="form-control" min="1" value="<?= $data['jumlah_paket'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Jenis Paket</label>
      <select name="jenis_paket" class="form-select" required>
        <option value="premium" <?= $data['jenis_paket']=='premium'?'selected':'' ?>>Premium (Rp. 1.000.000)</option>
        <option value="standart" <?= $data['jenis_paket']=='standart'?'selected':'' ?>>Standart (Rp. 750.000)</option>
        <option value="hemat" <?= $data['jenis_paket']=='hemat'?'selected':'' ?>>Hemat (Rp. 500.000)</option>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
