<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
    <header class="container-fluid bg-info text-white mb-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Data Pengguna</h1>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <a href="form-inputan.php"><button type="button" class="btn btn-warning mb-3">Tambah Data</button></a>
        <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Date Of Birth</th>
            <th>Created At</th>
            <th>Aksi</th>
        </tr>
        <?php
            include("koneksi.php");
            $users = mysqli_query($koneksi,"SELECT * from users");
            $no=1;
            foreach($users as $row) {
                
                echo "<tr>
                <td>$no</td>
                <td>".$row['first_name']."</td>
                <td>".$row['last_name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['password']."</td>
                <td>".$row['phone']."</td>
                <td>".$row['address']."</td>
                <td>".$row['gender']."</td>
                <td>".$row['dob']."</td>
                <td>".$row['created_at']."</td>
                <td class='text-center'>
                    <div class='d-inline-flex align-items-center gap-2'>
                        <a href='edit.php?id=$row[id]'><i class='bi bi-pencil-square text-primary'></i></a>
                        |
                        <a href='delete.php?id=$row[id]'><i class='bi bi-trash3 text-danger'></i></a>
                </td>
                    </div>
                </tr>";
                $no++;
            }  
        ?>
    </table>
    </div> 
</body>
</html>