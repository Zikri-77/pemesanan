<?php
    include ("koneksi.php");
    // menyimpan data idke dalam variabel
    $id_mhs = $_GET['id_mhs'];
    // query untuk hapus data
    $query = "DELETE from mahasiswa where id_mhs='$id_mhs'";
    mysqli_query($koneksi, $query);
    // alihkan ke index.php untuk menampilkan data
    header("location:index.php");
?>