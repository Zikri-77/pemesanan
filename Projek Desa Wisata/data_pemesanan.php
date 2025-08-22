<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Atur zona waktu ke Jakarta
date_default_timezone_set("Asia/Jakarta");

$user_id = $_SESSION['user_id'];
$result = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$user_id'");
$user = mysqli_fetch_assoc($result);

// Cek data pemesanan terakhir user
$queryPemesanan = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE email = '".$user['email']."' ORDER BY id DESC LIMIT 1");
$pemesanan = mysqli_fetch_assoc($queryPemesanan);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Struk Pemesanan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
  <style>
    body {
      background: #f4f6f9;
    }
    .invoice {
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,.1);
    }
    .invoice h2 {
      font-weight: bold;
    }
    .invoice .table th {
      background: #007bff;
      color: #fff;
      text-align: center;
    }
    .badge-success {
      font-size: 14px;
      padding: 8px 12px;
      border-radius: 12px;
    }
    .total-box {
      background: #f8f9fa;
      border-radius: 10px;
      padding: 15px;
    }
  </style>
</head>
<body>

<div class="container my-5">
  <?php if ($pemesanan) : ?>
    <section class="invoice">

      <!-- Header -->
      <div class="row mb-4">
        <div class="col-12 text-center">
          <h2><i class="fas fa-globe"></i> Smart Tourism</h2>
          <small class="text-muted">Tanggal: <?php echo date("d/m/Y H:i"); ?> WIB</small>
          <hr>
        </div>
      </div>

      <!-- Info Pemesan -->
      <div class="row mb-4">
        <div class="col-sm-4">
          <h6>Dari:</h6>
          <address>
            <strong>Smart Tourism Team</strong><br>
            Jl. Wisata No. 123<br>
            Email: info@smarttourism.com<br>
            Telepon: +62 812-3456-7890
          </address>
        </div>
        <div class="col-sm-4">
          <h6>Kepada:</h6>
          <address>
            <strong><?php echo htmlspecialchars($pemesanan['first_name']." ".$pemesanan['last_name']); ?></strong><br>
            <?php echo nl2br(htmlspecialchars($pemesanan['alamat'])); ?><br>
            Telepon: <?php echo htmlspecialchars($pemesanan['phone']); ?><br>
            Email: <?php echo htmlspecialchars($pemesanan['email']); ?>
          </address>
        </div>
        <div class="col-sm-4">
          <h6>Detail Invoice:</h6>
          <b>No. Invoice:</b> INV-<?php echo date("YmdHis", strtotime($pemesanan['tgl_pemesanan'])); ?><br>
          <b>Tgl Pemesanan:</b> <?php echo date("d-m-Y H:i", strtotime($pemesanan['tgl_pemesanan'])); ?> WIB<br>
          <b>Status:</b> <span class="badge bg-success">Lunas</span>
        </div>
      </div>

      <!-- Detail Paket -->
      <div class="table-responsive mb-4">
        <table class="table table-bordered text-center">
          <thead>
          <tr>
            <th>Paket</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td><?php echo ucfirst($pemesanan['jenis_paket']); ?></td>
            <td>Rp <?php echo number_format($pemesanan['total_bayar']/$pemesanan['jumlah_paket'],0,",","."); ?></td>
            <td><?php echo $pemesanan['jumlah_paket']; ?></td>
            <td>Rp <?php echo number_format($pemesanan['total_bayar'],0,",","."); ?></td>
          </tr>
          </tbody>
        </table>
      </div>

      <!-- Total -->
      <div class="row">
        <div class="col-md-6">
          <p class="lead">Metode Pembayaran:</p>
          <p><i class="fas fa-money-bill-wave"></i> Transfer Bank / Tunai</p>
        </div>
        <div class="col-md-6">
          <div class="total-box">
            <p class="lead mb-2">Total Bayar</p>
            <h3 class="text-success">Rp <?php echo number_format($pemesanan['total_bayar'],0,",","."); ?></h3>
          </div>
        </div>
      </div>

      <!-- Tombol Aksi -->
      <div class="row mt-4">
        <div class="col-12 text-center">
          <a href="javascript:window.print()" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a>
          <a href="dashboard.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </div>

    </section>
  <?php else : ?>
    <div class="alert alert-warning text-center p-5 rounded shadow">
      <h4><i class="fas fa-info-circle"></i> Tidak ada data pemesanan</h4>
      <p>Anda belum melakukan pemesanan paket wisata.</p>
      <a href="dashboard.php" class="btn btn-primary mt-3">Kembali ke Dashboard</a>
    </div>
  <?php endif; ?>
</div>

</body>
</html>
