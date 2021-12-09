<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa loại sản phẩm</title>
    <link rel="stylesheet" href="assets/css/add-products.css">
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
</head>
<body>
    <?php
        include "connect.php";
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $sql = 'DELETE FROM tbl_type_product WHERE id_type_product =' .$id;
            $result = $conn->query($sql);
            if($result != null)
            {
                echo '<script>alert("Xóa thành công");</script>';     
            }
            else{
                echo '<script>alert("Xóa ko thành công");</script>';
            }
        }
       
    ?>
    <h1 class="heading">Xóa loại <span>sản phẩm</span></h1>
    <div class="search-box">
        <input type="text" placeholder="Tìm kiếm loại sản phẩm ..." />
        <i class="bx bx-search"></i>
    </div>
    <a class="back" href="list-type-product.php">Danh sách sản phẩm sau khi xóa</a>

</body>
</html>