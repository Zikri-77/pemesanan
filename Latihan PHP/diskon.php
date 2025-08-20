<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $totalbelanja = $_POST['totalbelanja'];
        function diskon($totalbelanja){
            $diskon = 0;
            if($totalbelanja >=100000){
                $diskon = $totalbelanja - ($totalbelanja * 0.1);
            } else if ($totalbelanja >= 50000 && $totalbelanja < 100000){
                $diskon = $totalbelanja - ($totalbelanja * 0.05);
            } else {
                $diskon = $totalbelanja - 0;
            }
            return $diskon;
        }
        diskon($totalbelanja);

        echo "Harga setelah diskon adalah ".diskon($totalbelanja);
    ?>

    <h2>Input Total Belanja</h2>
    <hr>
    <form action="" method="post">
        Total Belanja : <input type="text" id="totalbelanja" name="totalbelanja">
        <button type="submit">Kirim</button>
    </form>
</body>
</html>