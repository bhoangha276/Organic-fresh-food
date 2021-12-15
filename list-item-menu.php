<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách chỉ mục menu</title>
    <link rel="stylesheet" href="assets/css/list-products.css" />
    <link
    href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
    rel="stylesheet"
  />
</head>
<body>
    <?php require_once "connect.php"; ?>
    <section class="home-content">
      <h1 class="heading">Danh sách <span>item menu</span></h1>
      <div class="list-products">
        <div style="overflow-x: auto">
            <table>
                <thead>
                  <tr>
                    <th>Id Item Menu</th>
                    <th>Name Item Menu</th>
                    <th>Class Item Menu </th>
                    <th>Edit </th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $sql_item_menu = mysqli_query($conn,"SELECT * FROM tbl_menu Order By id_item_menu ASC");
                      while($row_item_menu = mysqli_fetch_assoc($sql_item_menu)){
                    ?>
                    <tr>
                        <td><?php echo $row_item_menu['id_item_menu'] ?></td>
                        <td><?php echo $row_item_menu['name_item_menu'] ?></td>
                        <td><?php echo $row_item_menu['class_item_menu'] ?></td>
                        <td>
                        <a href="edit-menu-web.php?id=<?php echo  $row_item_menu['id_item_menu']; ?>">Sửa</a>
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