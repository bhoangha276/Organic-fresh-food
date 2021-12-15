<?php
    include('connect.php');
    if(isset($_GET['code'])){
        $code_cart = $_GET['code'];
        $sql = "UPDATE tbl_cart SET cart_status = 0 WHERE code_cart = '".$code_cart."'";
        $query = mysqli_query($conn, $sql);

        header('Location: list-order.php'); 
    }

    print ok;
 ?>