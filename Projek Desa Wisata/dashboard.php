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
            <a href="#" class="d-block"><?php echo $user ['first_name']." ". $user['last_name']; ?></a>
            <a href="edit_profile.php" class="d-block">Edit Profile</a>
            <a href="pemesanan.php" class="d-block">Pemesanan</a>
            <a href="data_pemesanan.php" class="d-block">Data Pemesanan</a>
          </div>
        </div>
      </div>
    </asside>

      <div class="content-wrapper p-4">
        <h2>Profil Saya</h2>
        <table class="table table-striped">
        <tr><td style="width: 200px"><p><strong>Nama</td><td>:</td><td></strong> <?php echo $user['first_name']." ". $user['last_name']; ?></p></td></tr>
        <tr><td style="width: 200px"><p><strong>Email</td><td>:</td><td></strong> <?php echo $user['email']; ?></p></td></tr>
        <tr><td style="width: 200px"><p><strong>No. Telp</td><td>:</td><td></strong> <?php echo $user['phone']; ?></p></td></tr>
        <tr><td style="width: 200px"><p><strong>Alamat</td><td>:</td><td></strong> <?php echo $user['address']; ?></p></td></tr>
        <tr><td style="width: 200px"><p><strong>Jenis Kelamin</td><td>:</td><td></strong> <?php echo ucfirst($user['gender']); ?></p></td></tr>
        <tr><td style="width: 200px"><p><strong>Tanggal Lahir</td><td>:</td><td></strong> <?php echo $user['dob']; ?></p></td></tr>
</table>

        <form action="upload.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Upload Foto Profil</label>
              <input type="file" name="foto" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Upload</button>
        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>