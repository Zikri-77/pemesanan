<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mahasiswa</title>
</head>
<body>
    <form method="post" action="simpan.php">
        <table border="0" cellpadding="5">
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" required onkeyup="isi_otomatis()"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" id="nama" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <input type="radio" name="jenis_kelamin" value="Laki-Laki" > Laki-Laki
                    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                </td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>
                    <select name="jurusan" id="jurusan" required>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Bisnis Digital">Bisnis Digital</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" id="alamat" required></textarea></td>
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
