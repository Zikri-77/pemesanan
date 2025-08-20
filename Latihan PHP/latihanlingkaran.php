<?php
    $r = 7;
    $l = 3.14 * $r * $r; // perbaikan rumus luas
    $k = 2 * 3.14 * $r;

    echo "Jari-jari :  $r <br>";
    echo "Luas :  $l <br>";
    echo "Keliling : $k <br>";
?>

<script>
    var r = prompt("Nilai jari-jari lingkaran : ");
    var luas = 3.14 * r * r; // perbaikan rumus luas
    var keliling = 2 * 3.14 * r;

    alert("Nilai luas dari jari-jari " + r + " adalah " + luas + " dan kelilingnya adalah " + keliling);
</script>
