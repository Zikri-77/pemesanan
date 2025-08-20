<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $angka1 = $_POST['angka1'] ?? 0;
        $angka2 = $_POST['angka2'] ?? 0;
        $operasi = $_POST['operasi'] ?? 0;
        function jumlah($angka1,$angka2){
            return $hasil = $angka1 + $angka2;
        }
        function kurang($angka1,$angka2){
            return $hasil = $angka1 - $angka2;
        }
        function kali($angka1,$angka2){
            return $hasil = $angka1 * $angka2;
        }
        function bagi($angka1,$angka2){
            return $hasil = $angka1 / $angka2;
        }

    ?>  
        <hr>
        <form action="" method="post">
            Angka 1 : <input type="text" id="angka1" name="angka1" placeholder="Masukkan angka" required>
            Angka 2 : <input type="text" id="angka2" name="angka2" placeholder="Masukkan angka" required>
            <br>
            <input type="radio" name="operasi" value="+">+
            <br>
            <input type="radio" name="operasi" value="-">-
            <br>
            <input type="radio" name="operasi" value="*">x
            <br>
            <input type="radio" name="operasi" value="/">:
            <br>
            <button type="submit">Hasil</button>
        </form>
    
    <?php
        if ($operasi == "+") {
            echo "Hasil penjumlahan : ".jumlah($angka1,$angka2);
        } else if ($operasi == "-") {
            echo "Hasil pengurangan : ".kurang($angka1,$angka2);
        } else if ($operasi == "*") {
            echo "Hasil perkalian : ".kali($angka1,$angka2);
        } else if ($operasi == "/") {
            echo "Hasil pembagian : ".bagi($angka1,$angka2);
        } else {
            echo "Data anda salah";
        }
    ?>

</body>
</html>