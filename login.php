<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="shortcut icon" href="assets/img/logo.png">

    <!-- font awesome cdn link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <!-- custom css file link -->
    <link rel="stylesheet" href="assets/css/login.css" />
  </head>
  <body>
    <?php require_once "connect.php"; ?>
    <?php
      if(isset($_POST['login'])){
        $username =$_POST['username'];
        $password =$_POST['password'];
        $sql ="Select *  From user Where username = '".$_POST['username']."' and password = '".$_POST['password']."'";
        $result =$conn->query($sql);
        if($result->num_rows >0)
        {
          $row= $result->fetch_array();
          if($row['username'] == 'admin')
          {
            header('Location: admin.php'); 
          }
          else
          {
            session_start();
            $_SESSION['id'] = $row['id'];
            header('Location: index.php'); 
          }
         
        }
        else{
          echo '<script>alert("Email or password is fail");</script>';
        }
      }
    ?>
    <div class="container-login">
      <div class="img">
        <img src="assets/img/bg_login.svg" alt="" />
      </div>
      <div class="login-content">
        <form action="" method="POST" >
          <img src="assets/img/avatar.svg" alt="" />
          <h2>welcome</h2>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <input
                type="text"
                placeholder="Tài khoản"
                class="input"
                name="username"
                required
              />
            </div>
          </div>
          <div class="input-div two">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <input
                type="password"
                placeholder="Mật khẩu"
                class="input"
                name="password"
                required
              />
            </div>
          </div>
          <p>Quên mật khẩu <a href="editPass.php">Tại Đây</a></p>
          <p>Chưa có tài khoản<a href="register.php">Tạo ngay</a></p>
          <input type="submit" class="btn" name="login" value="Đăng nhập" />
        </form>
      </div>
    </div>
    <!-- custom js file link -->
    <script src="assets/js/script.js"></script>

  </body>
</html>
