<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $email     = $_POST['email'];
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi
    $phone     = $_POST['phone'];
    $address   = $_POST['address'];
    $gender    = $_POST['gender'];
    $dob       = $_POST['dob'];

    // Cek apakah email sudah terdaftar
    $cekEmail = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($cekEmail) > 0) {
        echo "<script>alert('Email sudah terdaftar!'); window.location='register.html';</script>";
        exit;
    }

    $sql = "INSERT INTO users (first_name, last_name, email, password, phone, address, gender, dob) 
            VALUES ('$first_name', '$last_name', '$email', '$password', '$phone', '$address', '$gender', '$dob')";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Registrasi berhasil!'); window.location='index.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>