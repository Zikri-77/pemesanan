<?php
    include("koneksi.php");
    $id_mhs = $_GET["id_mhs"] ?? '';
    $mahasiswa =  mysqli_query($koneksi,"select * from mahasiswa where id_mhs='$id_mhs'");
    $row = mysqli_fetch_array($mahasiswa);
    // membuat data jurusan menjadi dinamis dalam bentuk array
    $jurusan = array('Teknik Informatika', 'Sistem Informasi', 'Bisnis Digital');
    // membuat function untuk set aktif radio button
    function active_radio_button($value, $input) {
        // apabila value dari radio sama dengan yang diinput 
        $result = $value==$input ? 'checked':'';
        return $result;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mahasiswa</title>
</head>
<body>
    <form method="post" action="update.php">
        <input type="hidden" name="id_mhs" value="<?php echo $row['id_mhs']; ?>">
        <table border="0" cellpadding="5">
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" required value="<?php echo $row['nim'];?>" onkeyup="isi_otomatis() "></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" id="nama" value="<?php echo $row['nama'];?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <input type="radio" name="jenis_kelamin" value="Laki-Laki" <?php echo active_radio_button("Laki-Laki", $row['jenis_kelamin'])?>> Laki-Laki
                    <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo active_radio_button("Perempuan", $row['jenis_kelamin'])?>> Perempuan
                </td>
            </tr>
            <tr>
                <td>Jurusan <?php echo $row['jurusan']; ?></td>
                <td>
                    <select name="jurusan" id="jurusan">
                        <?php
                        foreach($jurusan as $j){
                            echo "<option value='$j' ";
                            echo $row["jurusan"]==$j?'selected="selected"':'';
                            echo ">$j</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" id="alamat" ><?php echo htmlspecialchars( $row['alamat']) ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="submit" value="simpan">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

</DOCTYPE>
