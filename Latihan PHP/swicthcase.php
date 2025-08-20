<?php
    //menetapkan nilai
    $nilai = 85;
    
    //menggunakan percabangan switch case untuk menentukan nilai
    switch (true){
        case ($nilai >= 90);
            echo "Nilai PHP = A";
            break;
        case ($nilai >= 80);
            echo "Nilai PHP = B";
            break;
        case ($nilai >= 70);
            echo "Nilai PHP = C";
            break;
        default:
            echo "Nilai PHP = D";
    }
?>

<script>
    var hari = prompt("Masukkan nama hari (senin, selasa, rabu, kamis, jumat, sabtu, minggu):");
    
    switch (hari.toLowerCase()) {
    case "senin":
        console.log("Senin: Mulai minggu dengan semangat baru!");
        break;
    case "selasa":
        console.log("Selasa: Fokus tingkatkan produktivitas.");
        break;
    case "rabu":
        console.log("Rabu: Waktunya evaluasi pekerjaan.");
        break;
    case "kamis":
        console.log("Kamis: Jangan lupa minum kopi ☕.");
        break;
    case "jumat":
        console.log("Jumat: Selesaikan target mingguan.");
        break;
    case "sabtu":
        console.log("Sabtu: Waktunya bersantai.");
        break;
    case "minggu":
        console.log("Minggu: Persiapkan diri untuk minggu depan.");
        break;
    default:
        console.log("Hari yang kamu masukkan tidak valid.");
}
</script>