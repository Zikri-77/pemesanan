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
<html>
    <head>
        <title>Input Text Example</title>
        <meta charset="UTF-8">  
    </head>
    <body>
        <form action="proses.php" method="post">
            Nama: <input type="text" name="nama" placeholder="Masukkan nama Anda"><br>
            Alamat: <input type="text" name="alamat" placeholder="Masukkan alamat Anda"><br>
            Email: <input type="email" name="email" placeholder="Masukkan email Anda"><br>
            <input type="submit" value="Kirim"> 
        </form>
    </body>
</html>