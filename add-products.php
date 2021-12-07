<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="assets/css/add-products.css">
  </head>
  <body>
    <?php
        if(isset($_POST['add-product'])){
          require_once "connect.php";
          $sqlCheckProduct = "SELECT * FROM tbl_products Where name_product = '".$_POST['name-product']."'";
          $resultCheckProduct = $conn->query($sqlCheckProduct); 
          if($resultCheckProduct->num_rows >0)
          {
            echo '<script> alert("Sản phẩm này đã tồn tại, vui lòng nhập tài khoản khác");</script>';
          }
          else{
            $sql = "INSERT INTO tbl_products (name_product,price_product,img_product,category_product)  VALUES ('".$_POST['name-product']."','".$_POST['price-product']."','".$_POST['img-product']."','".$_POST['category-product']."')";
            $result =$conn->query($sql); 
            if($result === TRUE) { 
              echo '<script> alert("Thêm vào thành công !!");</script>'; 
            } 
            else{ 
              echo '<script> alert("Thêm vào không thành công !!");</script>'; 
            } 
            $conn->close(); 
          }
        }
    ?>
    <a class="back" href="list-products.php">Danh sách sản phẩm sau khi thêm</a>
    <h1 class="heading">Thêm <span>sản phẩm</span></h1>
    <div class="home-content">
        <div class="container">
            <div class="content">
              <form action="" method="post">
                <div class="user-details">
                  <div class="input-box">
                    <span class="details">Tên sản phẩm</span>
                    <input
                      type="text"
                      placeholder="Nhập tên sản phẩm"
                      required
                      name="name-product"
                    />
                  </div>
                  <div class="input-box">
                    <span class="details">Gía sản phẩm</span>
                    <input
                      type="text"
                      placeholder="Nhập giá sản phẩm"
                      required
                      name="price-product"
                    />
                  </div>
                  <div class="input-box">
                    <span class="details">Hình ảnh sản phẩm</span>
                    <input
                      type="text"
                      placeholder="Nhập hình ảnh sản phẩm"
                      required
                      name="img-product"
                    />
                  </div>
                  <div class="input-box">
                    <span class="details">Loại sản phẩm</span>
                    <select name="category-product" id="category-product">
                      <?php
                      require_once "connect.php";
                      $sql_type_product = "SELECT * FROM tbl_type_product";
                      $result_type_product = $conn->query($sql_type_product);
                        while($row_type_product = $result_type_product->fetch_assoc()){
                          print "<option value=".$row_type_product['id_type_product'].">".$row_type_product['name_type_product']."</option>";
                        }
                      ?>
                    </select>
                    <!-- <input
                      type="text"
                      placeholder="Nhập loại sản phẩm"
                      required
                      name="category-product"
                    /> -->
                  </div>
                </div>
                <div class="button">
                  <input type="submit" name="add-product" value="Thêm ngay" />
                </div>
              </form>
            </div>

    </div>
  </body>
</html>
