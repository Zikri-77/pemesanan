<?php
// Data sudah ditentukan
$tb = 170; // tinggi badan dalam cm
$bb = 65;  // berat badan sekarang dalam kg
$gender = "pria"; // bisa "pria" atau "wanita"

// Hitung berat badan ideal dengan rumus Broca
if ($gender == "pria") {
    $ideal = ($tb - 100) - (($tb - 100) * 0.10);
} elseif ($gender == "wanita") {
    $ideal = ($tb - 100) - (($tb - 100) * 0.15);
} else {
    echo "Jenis kelamin tidak valid.\n";
    exit;
}

// Tampilkan hasil
echo "Tinggi badan       : $tb cm <br>";
echo "Berat badan sekarang: $bb kg <br>";
echo "Jenis kelamin      : $gender <br>";
echo "Berat badan ideal  : " . number_format($ideal, 1) . " kg <br>";

// Seleksi kondisi untuk status berat badan
if ($bb == $ideal) {
    echo "Status: Berat badan kamu IDEAL.";
} else if ($bb < $ideal) {
    echo "Status: Berat badan kamu KURANG.";
} else if ($bb = $ideal) {
    echo "Status: Berat badan kamu BERLEBIH.";
} else {
    echo "Berat badan anda salah";
}
?>

<script>
    var bb = prompt("input berat badan anda : ");
    var tb = prompt("input tinggi badan anda : ");

    var bi = tb - 110;
    if (bb < bi) {
        alert("Kamu kurang makan")
    } else if (bb > bi) {
        alert("Kamu harus diet")
    } else if (bb = bi) {
        alert("Berat badan kamu ideal")
    } else {
        alert("Berat badan anda salah")
    }
</script>
