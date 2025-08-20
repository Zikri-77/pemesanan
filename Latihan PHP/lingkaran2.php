<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung Lingkaran</title>
</head>
<body>
    <?php
        $jari = $_POST['jari'] ?? 0;

        function keliling($jari){
            return 2 * 3.14 * $jari;
        }
        function luas($jari){
            return 3.14 * $jari * $jari;
        }
    ?>

    <h2>MENGHITUNG LINGKARAN</h2>
    <form action="" method="post">
        Jari-jari <input type="number" name="jari" id="jari" required>
        <input type="submit" value="submit">
    </form>
    <br>
    Luas : <?php echo number_format(luas($jari),0,',','.'); ?>
    <br>
    Keliling : <?php echo number_format(keliling($jari),0,',','.'); ?>
</body>
</html>
