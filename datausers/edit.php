<?php
    include("koneksi.php");
    $id = $_GET["id"] ?? '';
    $users =  mysqli_query($koneksi,"select * from users where id='$id'");
    $row = mysqli_fetch_array($users);
    // membuat data jurusan menjadi dinamis dalam bentuk array
    $gender = array('Pria', 'Wanita');
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
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <table border="0" cellpadding="5">
            <tr>
                <td>First Name</td>
                <td><input type="text" name="first_name" id="first_name" required value="<?php echo $row['first_name'];?>" "></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="last_name" id="last_name" required value="<?php echo $row['last_name'];?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" id="email" required value="<?php echo $row['email'];?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="password" required value="<?php echo $row['password'];?>"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" id="phone" required value="<?php echo $row['phone'];?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="address" id="address" required ><?php echo $row['address'];?></textarea></td>
            </tr>
            <tr>
                <td>Gender</td>
                    <td><input type="radio" name="gender" value="Pria" <?php echo ($row['gender'] == 'pria') ? 'checked' : '';?> id="gender">Pria
                    <input type="radio" name="gender"  value="Wanita" <?php echo ($row['gender'] == 'wanita') ? 'checked' : '';?> id="gender">Wanita</td>
            </tr>
            <tr>
                <td>Date Of Birth</td>
                <td><input type="date" name="dob" value="<?php echo $row['dob'];?>" id="dob" required></td>
            </tr>
            <tr>
                <td colspan="1" align="center">
                    <button type="submit" value="simpan">Save</button>
                    <a href="index.php"><button value="cancel">Cancel</button></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

</DOCTYPE>
