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
        <h2>Edit Profil Saya</h2>
        <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <table border="0" cellpadding="5">
            <tr>
                <td>First Name</td>
                <td><input type="text" name="first_name" id="first_name" required value="<?php echo $user['first_name'];?>" "></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="last_name" id="last_name" required value="<?php echo $user['last_name'];?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" id="email" required value="<?php echo $user['email'];?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="password" required value="<?php echo $user['password'];?>" disabled></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" id="phone" required value="<?php echo $user['phone'];?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="address" id="address" required ><?php echo $user['address'];?></textarea></td>
            </tr>
            <tr>
                <td>Gender</td>
                    <td><input type="radio" name="gender" id="gender" required value="Pria" <?php echo ($user['gender'] == 'pria') ? 'checked' : '';?> id="gender">Pria
                    <input type="radio" name="gender" id="gender" required value="Wanita" <?php echo ($user['gender'] == 'wanita') ? 'checked' : '';?> id="gender">Wanita</td>
            </tr>
            <tr>
                <td>Date Of Birth</td>
                <td><input type="date" name="dob" value="<?php echo $user['dob'];?>" id="dob" required></td>
            </tr>
            <tr>
                <td colspan="1" align="center">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </td>
            </tr>
        </table>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>