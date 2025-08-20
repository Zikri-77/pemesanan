<?php
$hari = "";
$khodam = "";
$emoji = "";
$suara = "";

$daftar_khodam = [
    "senin"  => ["Larva", "🪱", "https://www.myinstants.com/media/sounds/cartoon-fall.mp3"],
    "selasa" => ["Ular Kadut", "🐍", "https://www.myinstants.com/media/sounds/snake-hiss.mp3"],
    "rabu"   => ["Laba-Laba Sunda", "🥁", "https://www.myinstants.com/media/sounds/drum.mp3"],
    "kamis"  => ["Crocodilo", "🐊", "https://www.myinstants.com/media/sounds/crocodile.mp3"],
    "jumat"  => ["Tokek Basah", "🦎", "https://www.myinstants.com/media/sounds/tokek.mp3"],
    "sabtu"  => ["Orang ganteng", "🐻", "https://www.myinstants.com/media/sounds/bear-growl.mp3"],
    "minggu" => ["Kucing Garong", "🐈", "https://www.myinstants.com/media/sounds/meow.mp3"]
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hari = strtolower(trim($_POST["hari"]));

    if (array_key_exists($hari, $daftar_khodam)) {
        $khodam = $daftar_khodam[$hari][0];
        $emoji  = $daftar_khodam[$hari][1];
        $suara  = $daftar_khodam[$hari][2];
    } else {
        $khodam = "Tidak diketahui";
        $emoji  = "❓";
        $suara  = "";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cek Khodam Gokil</title>
<style>
    body {
        font-family: 'Comic Sans MS', cursive, sans-serif;
        background: linear-gradient(135deg, #ffecd2, #fcb69f);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        flex-direction: column;
        overflow: hidden;
    }
    h1 {
        color: #ff007f;
        text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
        font-size: 2.2em;
        animation: bounce 1s infinite alternate;
    }
    .card {
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        text-align: center;
        width: 360px;
        animation: fadeIn 0.8s ease;
    }
    input {
        padding: 12px;
        width: 80%;
        border-radius: 8px;
        border: 2px dashed #ff007f;
        outline: none;
        margin-bottom: 15px;
        transition: all 0.3s ease;
        font-size: 16px;
        text-align: center;
    }
    input:focus {
        border-color: #ff9f43;
        background-color: #fff3e0;
    }
    button {
        background: linear-gradient(45deg, #ff007f, #ff9f43);
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
        transform: scale(1.1) rotate(-3deg);
        box-shadow: 0 4px 15px rgba(255, 0, 127, 0.5);
    }
    .hasil {
        margin-top: 15px;
        font-size: 20px;
        font-weight: bold;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.5s ease;
    }
    .show {
        opacity: 1;
        transform: translateY(0);
        animation: wiggle 0.5s infinite alternate;
    }
    .emoji {
        font-size: 3em;
        margin-top: 10px;
        animation: spin 1s infinite linear;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
    }
    @keyframes bounce {
        from { transform: translateY(0); }
        to { transform: translateY(-10px); }
    }
    @keyframes wiggle {
        from { transform: rotate(-3deg); }
        to { transform: rotate(3deg); }
    }
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>
</head>
<body>

<h1>🤣 Cek Khodam Gokil</h1>

<div class="card">
    <form method="POST">
        <input type="text" name="hari" placeholder="Masukkan hari lahir" required>
        <br>
        <button type="submit">Cek</button>
    </form>

    <?php if ($khodam) : ?>
        <div id="hasil" class="hasil show">
            <?= $emoji ?> Khodam kamu adalah: <strong><?= htmlspecialchars($khodam) ?></strong> <?= $emoji ?>
            <div class="emoji"><?= $emoji ?></div>
        </div>
        <?php if ($suara) : ?>
            <audio autoplay>
                <source src="<?= $suara ?>" type="audio/mpeg">
            </audio>
        <?php endif; ?>
    <?php endif; ?>
</div>

<!-- Confetti JS -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js"></script>
<script>
    <?php if ($khodam && $khodam !== "Tidak diketahui") : ?>
        // Ledakan confetti gokil
        let duration = 2 * 1000;
        let end = Date.now() + duration;

        (function frame() {
            confetti({
                particleCount: 5,
                angle: 60,
                spread: 55,
                origin: { x: 0 }
            });
            confetti({
                particleCount: 5,
                angle: 120,
                spread: 55,
                origin: { x: 1 }
            });
            if (Date.now() < end) {
                requestAnimationFrame(frame);
            }
        })();
    <?php endif; ?>
</script>

</body>
</html>
