<!DOCTYPE html>
<html>
<head>
    <title>Menghitung Luas & Keliling Lingkaran</title>
</head>
<body>
    <h2>Hitung Luas & Keliling Lingkaran</h2>
    <form method="post">
        Masukkan jari-jari: 
        <input type="number" name="jari" step="0.01" required>
        <button type="submit">Hitung</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jari = (float) $_POST['jari'];
        $phi = pi();
        $luas = $phi * pow($jari, 2);
        $keliling = 2 * $phi * $jari;

        echo "<h3>Hasil Perhitungan:</h3>";
        echo "Jari-jari: $jari <br>";
        echo "Luas: " . number_format($luas, 2) . "<br>";
        echo "Keliling: " . number_format($keliling, 2) . "<br>";
    }
    ?>
</body>
</html>
