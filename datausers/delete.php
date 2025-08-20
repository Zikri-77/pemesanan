<?php
    include ("koneksi.php");
    // menyimpan data idke dalam variabel
    $id = $_GET['id'];
    // query untuk hapus data
    $query = "DELETE from users where id='$id'";
    mysqli_query($koneksi, $query);
    // alihkan ke index.php untuk menampilkan data
    header("location:index.php");
?>