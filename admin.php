<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/admin.css" />
  </head>
  <body>
    <?php require_once "connect.php"; ?>
    <!-- Start Sidebar -->

        <div class="list-user-gold">
          <div class="user box">
            <div style="" class="title">Khách hàng</div>
            <div class="user-details" style="overflow-x: auto">
              <table>
                <thead>
                  <tr>
                    <th>Tài khoản</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày sinh</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Điểm</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                        $sql_user_gold = mysqli_query($conn,"SELECT * FROM user ORDER BY points DESC LIMIT 10");
                        while($row_user = mysqli_fetch_assoc($sql_user_gold)){
                    ?>
                  <tr>
                    <td><?php echo $row_user['username'] ?></td>
                    <td><?php echo $row_user['fullname'] ?></td>
                    <td><?php echo $row_user['dateofbirth'] ?></td>
                    <td><?php echo $row_user['email'] ?></td>
                    <td><?php echo $row_user['phone'] ?></td>
                    <td><?php echo $row_user['points'] ?></td>
                  </tr>
                  <?php
                        }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- End Home-content -->
    </section>
    <!-- End Home-Section -->
    <!-- <script src="/assets/js/script.js"></script> -->
  </body>
</html>
