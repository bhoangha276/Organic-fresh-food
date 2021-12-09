<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa loại sản phẩm</title>
    <link rel="stylesheet" href="assets/css/add-products.css">
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
</head>
<body>
    <?php
      require_once "connect.php";
      if(isset($_GET['id']))
      {
          $id = $_GET['id'];
          $sql = "SELECT * FROM tbl_type_product WHERE id_type_product= $id";
          $result = $conn->query($sql);
              if($result->num_rows > 0)
              {
                  $row= $result->fetch_array();
                  $name_type_product = $row['name_type_product'];
              }
      }
      if(isset($_POST['edit-type-product'])){
          $name_type_product = $_POST['name-type-product'];
          $sql = "UPDATE tbl_type_product SET name_type_product='$name_type_product' Where id_type_product=$id";
          if (mysqli_query($conn, $sql)) {
              echo '<script>alert("Update thành công");</script>';
          } else {
              echo '<script>alert("Update that bại");</script>'. mysqli_error($conn);
          }
          
      }
    ?>
    <a class="back" href="list-type-product.php"> Quay lại danh sách loại sản phẩm sau khi sửa</a>
    <h1 class="heading">Sửa loại <span>sản phẩm</span></h1>
    <div class="search-box">
        <input type="text" placeholder="Tìm kiếm loại sản phẩm ..." />
        <i class="bx bx-search"></i>
    </div>
    <div class="home-content">
        <div class="container">
            <div class="content">
              <form action="" method="post">
                <div class="user-details">
                  <div class="input-box">
                    <span class="details">Tên loại sản phẩm</span>
                    <input
                      type="text"
                      value=""
                      placeholder="Nhập tên loại sản phẩm mới"
                      required
                      name="name-type-product"
                    />
                  </div>  
                </div>
                <div class="button">
                  <input type="submit" name="edit-type-product" value="Sửa Ngay" />
                </div>
              </form>
            </div>
    </div>
    
    
</body>
</html>