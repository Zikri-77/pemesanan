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
                <td>First Name</td>
                <td><input type="text" name="first_name" id="first_name" required onkeyup="isi_otomatis()"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="last_name" id="last_name" required onkeyup="isi_otomatis()"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" id="email" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" id="phone" required></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="address" id="address" required></textarea></td>
            </tr>
            <tr>
                <td>Gender</td>
                    <td><input type="radio" name="gender" value="pria" id="gender">Pria
                    <input type="radio" name="gender" value="wanita" id="gender">Wanita</td>
            </tr>
            <tr>
                <td>Date Of Birth</td>
                <td><input type="date" name="dob" id="dob" required></td>
            </tr>
            <tr>
                <td colspan="1" align="center">
                    <button type="submit" value="simpan">Simpan</button>
                    <a href="index.php"><button value="cancel">Cancel</button></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

</DOCTYPE>
