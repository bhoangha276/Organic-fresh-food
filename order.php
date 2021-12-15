<?php
    session_start();
    include('connect.php');
    $id_user = $_SESSION['id'];
    $code_cart = rand(0,9999);
    $insert_cart = "INSERT INTO tbl_cart(id_user, code_cart, cart_status) VALUE ('".$id_user."','".$code_cart."',1)";
    print  $insert_cart;
    $cart_query = mysqli_query($conn, $insert_cart);
    if($cart_query)
    {
        foreach($_SESSION['cart'] as $key => $value) {
            $id_product = $value['id'];
            $quantify = $value['quantify'];
            $insert_cart_detail = "INSERT INTO tbl_cart_detail(id_product, code_cart, quantify) VALUE ('".$id_product."','".$code_cart."','".$quantify."')";
            print $insert_cart_detail;
            mysqli_query($conn,$insert_cart_detail );
        }
    }
    unset($_SESSION['cart']);
    header('Location: index.php'); 
?>