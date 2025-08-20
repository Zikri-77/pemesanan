<?php
    function sayHello($nama) {
        echo "Hello $nama babe";
        echo "<br>";
    }

    function perkalian($angka1, $angka2) {
        $hasil = $angka1 * $angka2;
        return $hasil;
    }

    $totalbelanja = 145000;
    function diskon($totalbelanja) {
        if ($totalbelanja > 100000) {
            $hasil = $totalbelanja * 0.1;
        }   else { 
            $hasil = 0;
        }
        return $hasil;
    }

    echo "Total belanja kamu adalah $totalbelanja <br>";
    echo "Diskon : 10% <br>";
    echo "Total belanja setelah diskon ".$totalbelanja - diskon(totalbelanja:145000);
    echo "<br>";

    echo "Hasil perkalian 7 dengan 8 adalah ";
    echo perkalian(7,8);
    echo "<br>";
    
    sayHello("Ridho");
    sayHello("Ridho");
    sayHello("Ridho");
?>