<?php
    include("koneksi.php");
    // menyimpan data ke dalam variabel
    $id = $_POST['id'];
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $dob = $_POST['dob'] ?? '';
    // query sql untuk input dta
    $query = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', password='$password',
    phone='$phone', address='$address', gender='$gender', dob='$dob' where id='$id'";
    mysqli_query($koneksi, $query);
    // mengalihkan ke halaman index.php
    header("location:dashboard.php");
?>