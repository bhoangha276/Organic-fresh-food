<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Password</title>
    <link rel="shortcut icon" href="assets/img/logo.png">
    <link rel="stylesheet" href="assets/css/register.css" />
  </head>
  <body>
    <?php
      include "connect.php";
      if(isset($_POST['edit'])){
        $username =$_POST['username'];
        $sql ="Select username  From user Where username = '".$_POST['username']."'";
        $result =$conn->query($sql); 
        if($result->num_rows >0) {
          if(isset($_POST['edit'])){
            $password = $_POST['password']; 
            $sql ="UPDATE user SET password='$password' Where username = '$username'"; 
            $result = $conn->query($sql); 
            if($result === TRUE){ 
              header("Location:http://localhost:8080/Website_Store/login.php"); 
            } 
            else{ 
              echo '<script> alert("Đổi mật khẩu không thành công");</script>'; 
            } 
            $conn->close(); 
          } 
        } 
        else{ 
            echo '<script>alert("Tài khoản này không tồn tại !!");</script>';
        } 
      }
    ?>
    <div class="container">
      <div class="title">Vui lòng, nhập thông tin đầy đủ</div>
      <div class="content">
        <form action="" method="post">
          <div class="user-details">
            <div class="input-box" style="width: 100%">
              <span class="details">Tài Khoản</span>
              <input
                style="width: 100%"
                type="text"
                placeholder="Nhập tài khoản ....."
                required
                name="username"
              />
            </div>
            <div class="input-box" style="width: 100%">
              <span class="details">Mật Khẩu Mới</span>
              <input
                style="width: 100%"
                type="password"
                placeholder="Nhập mật khẩu mới ....."
                required
                name="password"
              />
            </div>
          </div>
          <div class="button">
            <input type="submit" name="edit" value="Tiếp tục" />
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
