<?php
    include("koneksi.php");
    // Menyimpan data ke dalam variabel
    $first_name = $_POST['first_name']?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $dob = $_POST['dob'] ?? '';

    // query sql untuk insert data
    $query = "INSERT INTO users SET first_name='$first_name', last_name='$last_name', email='$email', password='$password', phone='$phone', address='$address', gender='$gender', dob='$dob' ";
    mysqli_query($koneksi, $query);

    // mengalihkan ke halaman index.php
    header("location:index.php");
?>