<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="shortcut icon" href="assets/img/logo.png">
    <link rel="stylesheet" href="assets/css/register.css" />
  </head>
  <body>
    <?php
      if(isset($_POST['register'])){
        require_once "connect.php";
        $fullname =$_POST['fullname'];
        $username =$_POST['username'];
        $password =$_POST['password'];
        $email = $_POST['email'];
        $datebirth = $_POST['datebirth'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $sqlCheckUser = "SELECT * FROM user Where username = '".$_POST['username']."'";
        $resultCheckUser = $conn->query($sqlCheckUser); 
        if($resultCheckUser->num_rows >0)
        {
          echo '<script> alert("Tài khoản này đã tồn tại, vui lòng nhập tài khoản khác");</script>';
        }
        else{
          $sql = "INSERT INTO user (username,password,fullname,email,dateofbirth,phone,address)  VALUES ('".$_POST['username']."','".$_POST['password']."','".$_POST['fullname']."','".$_POST['email']."', '".$_POST['datebirth']."', '".$_POST['phone']."','".$_POST['address']."')";
          $result = $conn->query($sql); 
          if($result === TRUE) { 
            header("Location: http://localhost:8080/Website_Store/login.php"); 
          } 
          else{ 
            echo '<script> alert("Đăng ký không thành công");</script>'; 
          } 
          $conn->close(); 
        }
      }
    ?>
    <div class="container">
      <div class="title">Đăng Ký</div>
      <div class="content">
        <form action="" method="post">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Tên đầy đủ</span>
              <input
                type="text"
                placeholder="Nhập tên của bạn"
                required
                name="fullname"
              />
            </div>
            <div class="input-box">
              <span class="details">Tài khoản</span>
              <input
                type="text"
                placeholder="Nhập tài khoản của bạn"
                required
                name="username"
              />
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input
                type="email"
                placeholder="Nhập email của bạn"
                required
                name="email"
              />
            </div>
            <div class="input-box">
              <span class="details">Mật khẩu</span>
              <input
                type="text"
                placeholder="Nhập mật khẩu của bạn"
                required
                name="password"
              />
            </div>
            <div class="input-box">
              <span class="details">Ngày sinh</span>
              <input
                type='date'
                placeholder="Nhập ngày sinh của bạn"
                required
                name="datebirth"
              />
            </div>
            <div class="input-box">
              <span class="details">Số điện thoại</span>
              <input
                type='text'
                placeholder="Nhập số điện thoại"
                required
                name="phone"
              />
            </div>
            <div class="input-box">
              <span class="details">Địa chỉ</span>
              <input
                type='text'
                placeholder="Nhập số số nhà,phường,quận,tỉnh"
                required
                name="address"
              />
            </div>
          </div>
          <div class="button">
            <input type="submit" name="register" value="Đăng Ký Ngay" />
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
