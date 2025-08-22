<?php
$host = "localhost";
$user = "root"; // sesuaikan
$pass = "";     // sesuaikan
$db   = "db_mhs";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>