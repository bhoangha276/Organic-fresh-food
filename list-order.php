<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duyệt Đơn</title>
    <link rel="stylesheet" href="assets/css/list-products.css" />
    <link
    href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
    rel="stylesheet"
  />
</head>
<body>
<?php require_once "connect.php"; ?>
    <section class="home-content">
      <h1 class="heading">Danh sách <span>đơn hàng</span></h1>

      <div class="list-products">
        <div style="overflow-x: auto">
            <table>
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết đơn hàng </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $sql_list_order = $conn -> query("SELECT * FROM tbl_cart ORDER BY id_cart ASC");
                      while($row_list_order = mysqli_fetch_assoc($sql_list_order)){
                        $sql ="Select *  From user Where id = '".$row_list_order['id_user']."'";
                        $result =$conn->query($sql);
                        if($result->num_rows >0){
                            $row= $result->fetch_array();
                        } 
                    ?>
                  <tr>
                    <td><?php echo $row_list_order['id_cart'] ?></td>
                    <td><?php echo $row_list_order['code_cart'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td>
                        <?php 
                            if($row_list_order['cart_status'] == 1){
                               echo '<a href="xuly-order.php?code='.$row_list_order['code_cart'].'">Xử lý đơn hàng</a>';
                            }
                            else{
                                echo 'Đơn hàng bắt đầu giao';
                            }
                        ?>
                      
                    </td>  
                    <td>
                      <a href="list-detail-order.php?code-cart=<?php echo $row_list_order['code_cart']?>">Xem chi tiết</a>
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