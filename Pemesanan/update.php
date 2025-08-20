<?php
include "koneksi.php";

$id           = $_POST['id'];
$nama         = $_POST['nama'];
$email        = $_POST['email'];
$phone        = $_POST['phone'];
$alamat       = $_POST['alamat'];
$jumlah_paket = $_POST['jumlah_paket'];
$jenis_paket  = $_POST['jenis_paket'];

$harga = 0;
if ($jenis_paket == "premium") {
    $harga = 1000000;
} elseif ($jenis_paket == "standart") {
    $harga = 750000;
} elseif ($jenis_paket == "hemat") {
    $harga = 500000;
}

$total_bayar = $jumlah_paket * $harga;

$sql = "UPDATE pemesanan SET 
        nama='$nama', email='$email', phone='$phone', alamat='$alamat',
        jumlah_paket='$jumlah_paket', jenis_paket='$jenis_paket', total_bayar='$total_bayar'
        WHERE id=$id";

if ($koneksi->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
?>
