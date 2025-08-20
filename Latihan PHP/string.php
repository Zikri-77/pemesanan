<?php
    $string1 = 'Ini adalah string sederhana';
    $string2 = 'Ini adalah string yang bisa memiliki beberapa baris';
    $string3 = 'Dia berkata : "I\'ll be back"';
    $string4 = "Dia berkata : \"I'll be back\"";
    $string5 = "variabel akan otomatis ditampilkan : $string1 dan $string3";
    echo $string1; echo "<br>";
    echo $string2; echo "<br>";
    echo $string3; echo "<br>";
    echo $string4; echo "<br>";
    echo $string5; echo" <br>";
?>

<script>
    var string1 = 'Ini adalah string sederhana';
    var string2 = 'Ini adalah string yang bisa memiliki beberapa baris';
    var string3 = 'Dia berkata : "I\'ll be back"';
    var string4 = "Dia berkata : \"I'll be back\"";
    var string5 = "variabel akan otomatis ditampilkan : " + string1 + string3;

    alert(string1);
    alert(string2);
    alert(string3);
    alert(string4);
    alert(string5);
</script>
