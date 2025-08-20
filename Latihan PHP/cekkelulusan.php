<?php
$hasil = "";
$statusClass = "";
$lulus = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai = (int) $_POST["nilai"];

    if ($nilai >= 75) {
        $hasil = "🎉 Selamat! Anda Lulus";
        $statusClass = "lulus";
        $lulus = true;
    } else {
        $hasil = "😢 Maaf, Anda Tidak Lulus";
        $statusClass = "tidak-lulus";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Kelulusan</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 0;
        }

        h1 {
            color: white;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
            margin-bottom: 20px;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            text-align: center;
            width: 340px;
            animation: fadeIn 0.8s ease;
        }

        input[type="number"] {
            padding: 12px;
            width: 80%;
            border-radius: 8px;
            border: 2px solid #ddd;
            outline: none;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        input[type="number"]:focus {
            border-color: #74ebd5;
            box-shadow: 0 0 8px rgba(116, 235, 213, 0.5);
        }

        button {
            background: linear-gradient(45deg, #00c6ff, #0072ff);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        button:hover {
            transform: scale(1.07);
            box-shadow: 0 4px 15px rgba(0, 114, 255, 0.5);
        }

        .hasil {
            margin-top: 15px;
            font-size: 18px;
            font-weight: bold;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.5s ease;
        }

        .show {
            opacity: 1;
            transform: translateY(0);
        }

        .lulus {
            color: green;
            animation: pulseGreen 1s infinite alternate;
        }

        .tidak-lulus {
            color: red;
            animation: shake 0.4s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes pulseGreen {
            0% { text-shadow: 0 0 5px green; }
            100% { text-shadow: 0 0 20px lime; }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }
    </style>
</head>
<body>

<h1>💡 Cek Kelulusan Nilai</h1>

<div class="card">
    <form method="POST">
        <input type="number" name="nilai" placeholder="Masukkan Nilai" min="0" max="100" required>
        <br>
        <button type="submit">Cek</button>
    </form>

    <?php if ($hasil) : ?>
        <div id="hasil" class="hasil <?php echo $statusClass; ?>">
            <?php echo $hasil; ?>
        </div>
    <?php endif; ?>
</div>

<!-- Script Confetti -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js"></script>
<script>
    window.onload = function() {
        let hasil = document.getElementById("hasil");
        if (hasil) {
            setTimeout(() => {
                hasil.classList.add("show");
                <?php if ($lulus) : ?>
                    // Efek confetti saat lulus
                    confetti({
                        particleCount: 150,
                        spread: 100,
                        origin: { y: 0.6 }
                    });
                <?php endif; ?>
            }, 200);
        }
    }
</script>

</body>
</html>
