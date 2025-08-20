<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan paket wisata</title>
</head>
<body>
    <?php
        $paket = $_POST['paket'] ?? 0;
        $pilihan = $_POST['pilihan'] ?? 0;
        $lama = $_POST['lama'] ?? 0;
        
        function jumlah($paket, $pilihan, $lama){
            return $paket * $lama * $pilihan;
        }
    ?>
    <h2>PEMESANAN PAKET WISATA</h2>
    <hr>
    <form action="" method="post">
        Paket : <input type="number" name="paket" id="paket" value="<?php echo $paket ?>" required> Orang
        <br>
        <input type="radio" name="pilihan" value="1000000"> Premium    Rp. 1.000.000
        <br>
        <input type="radio" name="pilihan" value="700000"> Standart   Rp. 700.000
        <br>
        <input type="radio" name="pilihan" value="500000"> Low Budget Rp. 500.000
        <br>
        Lama : <input type="number" name="lama" id="lama" value="<?php echo $lama ?>" required> hari
        <br>
        <input type="submit" value="submit">
    </form>
    
    <?php
        echo "Total pembayaran Rp." . number_format(jumlah($paket, $pilihan, $lama), 0, ',', '.');
    ?>

    <?php
        $file = fopen("order.txt","w");
        fwrite($file,"Total pembayaran pemesanan paket wisata sebesar Rp.".totalharga($paket, $pilihan, $lama) .");
        fclose($file);
        echo "Pemesanan paket wisata sudah disimpan dalam file order.txt";
    ?>

</body>
</html>
