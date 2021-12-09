<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Info User</title>
    <link rel="shortcut icon" href="assets/img/logo.png">
    <link rel="stylesheet" href="assets/css/register.css" />
  </head>
  <body>
    <?php require_once "connect.php"; ?>
    <?php 
      if(isset($_GET['user']))
      {
        $username =$_GET['user'];
        $sql ="SELECT * From user Where username = '".$_GET['user']."'";
        $result =$conn->query($sql);
        if($result->num_rows >0)
        {
          $row= $result->fetch_array();
          $id = $row['id'];
          $fullname = $row['fullname'];
          $email = $row['email'];
          $password = $row['password'];
        }
      }
      if(isset($_POST['edit-user'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sqlCheckUser = "SELECT * FROM user Where username = '".$_POST['username']."'";
        $resultCheckUser = $conn->query($sqlCheckUser); 
        if($resultCheckUser->num_rows >0)
        {
          echo '<script> alert("This username already exists, please choose another username");</script>';
        }
        else{
          $sql ="UPDATE user SET username='$username', fullname='$fullname', email='$email', password='$password'  Where id = '$id'";
          $result =$conn->query($sql);
          if($result === TRUE)
          {
            echo '<script>alert("Success");</script>';
          }
          else{
              echo '<script>alert("Failed");</script>';
          }
          $conn->close();
        }
      }
    ?> 

    <div class="container">
      <div class="title">Sửa thông tin người dùng</div>
      <div class="content">
        <form action="" method="post">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Tên đầy đủ</span>
              <input
                type="text"
                placeholder="Enter your name"
                value="<?php echo $fullname ?>"
                required
                name="fullname"
              />
            </div>
            <div class="input-box">
              <span class="details">Tài khoản</span>
              <input
                type="text"
                placeholder="Enter your username"
                value="<?php echo $username ?>"
                required
                name="username"
              />
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input
                type="email"
                placeholder="Enter your email"
                value="<?php echo $email ?>"
                required
                name="email"
              />
            </div>
            <div class="input-box">
              <span class="details">Mật khẩu</span>
              <input
                type="password"
                placeholder="Enter your password"
                value="<?php echo $password ?>"
                required
                name="password"
              />
            </div>
          </div>
          <div class="button">
            <div class="back">
              <a href="http://localhost:8080/Website_Store/index.php">Quay lại</a>
            </div>
            <input type="submit" name="edit-user" value="Chỉnh sửa" />
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
