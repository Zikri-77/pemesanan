<?php
    $datasiswa = array(
        array(
            "nama" => "Al Ridho Zikri",
            "nim" => "0702243181",
            "kelas" => "Smart Tourisme"
        ),
        array(
            "nama" => "Slamet Kopling",
            "nim" => "07868768",
            "kelas" => "Smart Tourisme"
        ),
        array(
            "nama" => "Ahmad Bahulay",
            "nim" => "07868768",
            "kelas" => "Smart Tourisme"
        )
        );

    echo "<h1>Tabel Data Siswa</h1>";
    echo "<hr>";

    $i=1;
    echo "<table border=1>";
    echo "<th>No</th>";
    echo "<th>Nama</th>";
    echo "<th>Nim</th>";
    echo "<th>Kelas</th>";

    foreach($datasiswa as $val){
        echo "<tr></tr>";
        echo "<td>$i</td>";
        echo "<td>$val[nama]</td>";
        echo "<td>$val[nim]</td>";
        echo "<td>$val[kelas]</td>";
        $i++;
    };
    echo "</table>"
?>