<?php
function sayHello($name)
{
    echo "Hello, " . $name . "!<br>";
}

if(isset($_POST['nama']) && isset($_POST['alamat']) && isset($_POST['email'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $email = htmlspecialchars($_POST['email']);
    
    sayHello($nama);
    echo "Alamat: " . $alamat . "<br>";
    echo "Email: " . $email . "<br>";
} else {
    sayHello("Pengunjung");
}
?>