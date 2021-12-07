<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Danh sách Sản Phẩm</title>
    <link rel="stylesheet" href="assets/css/list-products.css" />
    <link
    href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
    rel="stylesheet"
  />
  </head>
  <body>
  <?php require_once "connect.php"; ?>
    <section class="home-content">
      <h1 class="heading">Danh sách <span>sản phẩm</span></h1>
      <div class="search-box">
        <input type="text" placeholder="Tìm kiếm sản phẩm ..." />
        <i class="bx bx-search"></i>
    </div>
      <div class="list-products">
        <div style="overflow-x: auto">
            <table>
                <thead>
                  <tr>
                    <?php
                      $sql_item_product = mysqli_query($conn,"SELECT * FROM tbl_item_product Order By id_item_product ASC");
                      while($row_item_product = mysqli_fetch_assoc($sql_item_product)){
                    ?>
                    <th><?php echo $row_item_product['name_item_product'] ?></th>
                    <?php 
                      }
                    ?>
                    <th> edit </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $sql_products = $conn -> query("SELECT tbl_products.id_product, tbl_products.name_product, tbl_products.price_product, tbl_products.assess_product, tbl_products.img_product, tbl_products.category_product, tbl_type_product.name_type_product FROM tbl_products INNER JOIN tbl_type_product ON tbl_products.category_product = tbl_type_product.id_type_product ORDER BY id_product ASC");
                      while($row_product = mysqli_fetch_assoc($sql_products)){
                    ?>
                  <tr>
                    <td><?php echo $row_product['id_product'] ?></td>
                    <td><?php echo $row_product['name_product'] ?></td>
                    <td><?php echo $row_product['price_product'] ?></td>
                    <td><?php echo $row_product['assess_product'] ?></td>
                    <td><?php echo $row_product['img_product'] ?></td>
                    <td><?php echo $row_product['name_type_product'] ?></td>
                    <td>
                      <a href="delete-products.php?id=<?php echo  $row_product['id_product']; ?>"
                        >Xóa</a
                      >
                      <a href="edit-products.php?id=<?php echo $row_product['id_product']; ?>"
                        >Sửa</a
                      >
                    </td>  
                  </tr>
                  <?php
                      }
                  ?>
                </tbody>
            </table>
        </div>    
    </section>
    <a class="back" href="admin.php"> Quay lại trang chủ</a>

  </body>
</html>
