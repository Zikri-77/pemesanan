<?php
    $benar = TRUE;
    $salah = FALSE;

    echo "benar = $benar, salah = $salah";
    //hasil output : benar = 1, salah =

    $x = false; //false
    $x = ""; //string kosong dianggap false
    $x = " "; //string dengan karakter adalah true
    $x = 0; //false
    $x = 1; //true

    $angka1 = 5;
    $angka2 = 3;
    echo "<br>";
    echo $angka1 < $angka2 ? 'benar' : 'salah';

?>