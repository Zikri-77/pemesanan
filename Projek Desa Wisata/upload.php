<?php 
session_start();
$user_id = $_SESSION['user_id'];
$target_dir = "uploads/";
$target_file = $target_dir . $_SESSION['user_id'] . ".png";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if($check !== false) {
        echo "file is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

//check if file already exists
if (file_exists($target_file)){
    //echo "sorry, file already exists.";
    unlink($target_file); //menghapus atau menimpa file yang sudah ada
    $uploadOk = 0;
}

//check file size
if ($_FILES["foto"]["size"] > 500000) {
    echo "sorry, your file is too large.";
    $uploadOk = 0;
}

//alllow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ){
    echo "sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

//check if $uploadOK is set to 0 by an error
if ($uploadOk == 0) {
    echo "sorry, your file was not uploaded.";
//if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
    //echo "The file ". basename($_FILES["foto"]["name"]). " has been uploaded.";
    header("Location: dashboard.php");
    } else {
    echo "sorry, there was an error uploading your file.";
    }
}