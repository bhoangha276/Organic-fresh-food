<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Danh sách khách hàng</title>
    <link rel="stylesheet" href="assets/css/list-products.css" />
    <link
    href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
    rel="stylesheet"
  />
  </head>
  <body>
  <?php require_once "connect.php"; ?>
    <section class="home-content">
      <h1 class="heading">Danh sách <span>khách hàng</span></h1>
      <div class="search-box">
        <input type="text" placeholder="Tìm kiếm khách hàng ..." />
        <i class="bx bx-search"></i>
    </div>
      <div class="list-products">
        <div style="overflow-x: auto">
            <table>
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>tài khoản</th>
                    <th>tên khách hàng </th>
                    <th>email</th>
                    <th>ngày sinh</th>
                    <th>số điện thoại</th>
                    <th>địa chỉ</th>
                    <th>điểm</th>
                    <th>xóa</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $sql_users = mysqli_query($conn,"SELECT * FROM user Order By id ASC");
                      while($row_user = mysqli_fetch_assoc($sql_users)){
                        if($row_user['id'] != 2)
                        {
                  ?>
                  <tr>
                    <td><?php echo $row_user['id'] ?></td>
                    <td><?php echo $row_user['username'] ?></td>
                    <td><?php echo $row_user['fullname'] ?></td>
                    <td><?php echo $row_user['email'] ?></td>
                    <td><?php echo $row_user['dateofbirth'] ?></td>
                    <td><?php echo $row_user['phone'] ?></td>
                    <td><?php echo $row_user['address'] ?></td>
                    <td><?php echo $row_user['points'] ?></td>
                    <td>
                      <a href="delete-user.php?id=<?php echo  $row_user['id']; ?>"
                        >Xóa</a
                      >
                    </td>  
                  </tr>
                  <?php
                      }
                    }
                  ?>
                </tbody>
            </table>
        </div>    
    </section>
    <a class="back" href="admin.php"> Quay lại trang chủ</a>
  </body>
</html>
