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
            $sql = 'DELETE FROM user WHERE id =' .$id;
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
    <h1 class="heading">Xóa <span>khách hàng</span></h1>
    <div class="search-box">
        <input type="text" placeholder="Tìm kiếm khách hàng ..." />
        <i class="bx bx-search"></i>
    </div>
    <a class="back" href="list-users.php">Danh sách khách hàng sau khi xóa</a>

</body>
</html>