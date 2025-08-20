<?php
$hasil = "";
$jenisOperasi = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka1 = $_POST["angka1"];
    $angka2 = $_POST["angka2"];
    $operasi = $_POST["operasi"];

    switch ($operasi) {
        case "tambah":
            $hasil = $angka1 + $angka2;
            $jenisOperasi = "Penjumlahan";
            break;
        case "kurang":
            $hasil = $angka1 - $angka2;
            $jenisOperasi = "Pengurangan";
            break;
        case "kali":
            $hasil = $angka1 * $angka2;
            $jenisOperasi = "Perkalian";
            break;
        case "bagi":
            if ($angka2 != 0) {
                $hasil = $angka1 / $angka2;
            } else {
                $hasil = "Error: Pembagian dengan nol";
            }
            $jenisOperasi = "Pembagian";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Interaktif</title>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #2b5876, #4e4376);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
        .kalkulator {
            background: rgba(255,255,255,0.1);
            padding: 30px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
            text-align: center;
        }
        .kalkulator h2 {
            margin-bottom: 20px;
        }
        .kalkulator input, select, button {
            padding: 10px;
            margin: 8px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
        }
        .kalkulator input, select {
            width: 80%;
        }
        .kalkulator button {
            background-color: #ff9800;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }
        .kalkulator button:hover {
            background-color: #e68900;
        }
    </style>
</head>
<body>
    <div class="kalkulator">
        <h2>Kalkulator Ridho</h2>
        <form method="POST">
            <input type="number" name="angka1" placeholder="Masukkan angka pertama" required><br>
            <input type="number" name="angka2" placeholder="Masukkan angka kedua" required><br>
            <select name="operasi" required>
                <option value="">Pilih Operasi</option>
                <option value="tambah">Penjumlahan</option>
                <option value="kurang">Pengurangan</option>
                <option value="kali">Perkalian</option>
                <option value="bagi">Pembagian</option>
            </select><br>
            <button type="submit">Hitung</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if ($hasil !== "" && $jenisOperasi !== ""): ?>
        <script>
            Swal.fire({
                title: '<?= $jenisOperasi; ?>',
                text: 'Hasil: <?= $hasil; ?>',
                icon: 'success',
                background: '#1e1e2f',
                color: '#fff',
                confirmButtonColor: '#ff9800'
            });
        </script>
    <?php endif; ?>
</body>
</html>
