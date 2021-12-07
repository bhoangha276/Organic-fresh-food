<?php
    $servername="localhost";
    $username ="root";
    $password ="";
    $database = "csdl_website";

    $conn = mysqli_connect($servername,$username,$password,$database);
    mysqli_set_charset($conn,'UTF8');
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    else echo "Kết nối thành công!"
?>