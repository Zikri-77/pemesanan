<?php
    $nilai = 80;

    echo "Nilai yang diinput : ", $nilai;
    echo "<br>";

    if ($nilai >=80 && $nilai <=100) {
        echo "Nilai huruf = A";
    } else if ($nilai >=70 && $nilai <= 79) {
        echo "Nilai huruf = B";
    } else if ($nilai >=50 && $nilai <= 69) {
        echo "Nilai huruf = C";
    } else if ($nilai >=30 && $nilai <= 49) {
        echo "Nilai huruf = D";
    } else {
        echo "Nilai huruf = E";
    }
?>

<script>
    var nilai = prompt("Masukkan nilai angka : ");
    alert("Nilai yang diinput : " + nilai);

    if ($nilai >=80 && $nilai <=100) {
        alert ("Nilai huruf = A");
    } else if ($nilai >=70 && $nilai <= 79) {
        alert ("Nilai huruf = B");
    } else if ($nilai >=50 && $nilai <= 69) {
        alert ("Nilai huruf = C");
    } else if ($nilai >=30 && $nilai <= 49) {
        alert ("Nilai huruf = D");
    } else {
        alert ("Nilai huruf = E");
    }
</script>