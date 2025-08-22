<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Cari user berdasarkan email
    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password dengan password_hash
        if (password_verify($password, $row['password'])) {
            // Simpan session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email']   = $row['email'];
            $_SESSION['nama']    = $row['first_name'] . " " . $row['last_name'];

            header("Location: dashboard.php");
            exit;
        } else {
            echo "<script>alert('Password salah!'); window.location='login.html';</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan!'); window.location='login.html';</script>";
    }
}
?>