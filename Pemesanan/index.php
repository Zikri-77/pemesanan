<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pemesanan Paket Wisata</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="container-fluid py-3">

  <h2 class="mb-3">Data Pemesanan Paket Wisata</h2>
  <a href="form_inputan.php" class="btn btn-primary mb-3">+ Tambah Pemesanan</a>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th>Jumlah Paket</th>
        <th>Jenis Paket</th>
        <th>Total Bayar</th>
        <th>Tanggal Pemesanan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $koneksi->query("SELECT * FROM pemesanan ORDER BY id DESC");
      $no = 1;
      while($row = $result->fetch_assoc()){
        echo "<tr>
                <td>$no</td>
                <td>{$row['nama']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['alamat']}</td>
                <td>{$row['jumlah_paket']}</td>
                <td>{$row['jenis_paket']}</td>
                <td>Rp " . number_format($row['total_bayar'],0,',','.') . "</td>
                <td>{$row['tgl_pemesanan']}</td>
                <td>
                  <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                  <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin hapus data?')\">Delete</a>
                </td>
              </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
