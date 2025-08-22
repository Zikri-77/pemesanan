<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$result = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$user_id'");
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard User</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        </ul>
      </nav>

    <asside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
          <span class="brand-text font-weight-light">User Dashboard</span>
        </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="uploads/<?php echo $user_id.".png";?>" class="img-circle elevation-2" alt="User Image" width="40">
          </div>
          <div class="info">
            <a href="dashboard.php" class="d-block"><?php echo $user ['first_name']." ". $user['last_name']; ?></a>
            <a href="edit_profile.php" class="d-block">Edit Profile</a>
            <a href="pemesanan.php" class="d-block">Pemesanan</a>
            <a href="data_pemesanan.php" class="d-block">Data Pemesanan</a>
          </div>
        </div>
      </div>
    </asside>

    <div class="content-wrapper p-4">
        <h2>Form Pemesanan Paket Wisata</h2>
  <form action="simpan_pemesanan.php" method="post">
    <div class="mb-3">
      <label>Nama Depan</label>
      <input type="text" name="first_name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Nama Belakang</label>
      <input type="text" name="last_name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>No. Telepon</label>
      <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label>Jumlah Paket</label>
      <input type="number" id="jumlah_paket" name="jumlah_paket" class="form-control" min="1" required>
    </div>
    <div class="mb-3">
      <label>Jenis Paket</label>
      <select id="jenis_paket" name="jenis_paket" class="form-select" required>
        <option value="">--Pilih Paket--</option>
        <option value="premium">Premium (Rp. 1.000.000)</option>
        <option value="standart">Standart (Rp. 750.000)</option>
        <option value="hemat">Hemat (Rp. 500.000)</option>
      </select>
    </div>

    <!-- Preview Total Bayar -->
    <div class="mb-3">
      <label>Total Bayar</label>
      <input type="text" id="total_bayar" class="form-control" readonly>
    </div>

    <a href="struk.php"><button type="submit" class="btn btn-success">Pesan</button></a>
    <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
  </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
<script>
// Harga paket
const hargaPaket = {
  premium: 1000000,
  standart: 750000,
  hemat: 500000
};

const jumlahInput = document.getElementById("jumlah_paket");
const paketSelect = document.getElementById("jenis_paket");
const totalBayarInput = document.getElementById("total_bayar");

// Fungsi hitung total
function hitungTotal() {
  const jumlah = parseInt(jumlahInput.value) || 0;
  const jenis = paketSelect.value;
  let total = 0;

  if (jenis && hargaPaket[jenis]) {
    total = jumlah * hargaPaket[jenis];
  }

  totalBayarInput.value = total > 0 ? "Rp " + total.toLocaleString("id-ID") : "";
}

// Event listener
jumlahInput.addEventListener("input", hitungTotal);
paketSelect.addEventListener("change", hitungTotal);
</script>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>