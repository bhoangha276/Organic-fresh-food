<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Slider</title>
    <link rel="stylesheet" href="assets/css/add-products.css">
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
</head>
<body>
    <?php
      require_once "connect.php";
      if(isset($_POST['edit-slider'])){
          $first_slogan = $_POST['first-slogan-slider'];
          $key_slogan = $_POST['key-slogan-slider'];
          $last_slogan = $_POST['last-slogan-slider'];
          $sub_slogan = $_POST['sub-slogan-slider'];
          $sql = "UPDATE tbl_slider SET first_slogan_slider='$first_slogan', key_slogan_slider='$key_slogan',last_slogan_slider='$last_slogan', sub_slogan_slider='$sub_slogan'";
          if (mysqli_query($conn, $sql)) {
              echo '<script>alert("Update thành công");</script>';
          } else {
              echo '<script>alert("Update that bại");</script>'. mysqli_error($conn);
          }
      }
    ?>

    <a class="back" href="admin.php"> Quay lại trang chủ sau khi sửa</a>
    <h1 class="heading">Sửa <span>slider</span></h1>
    <div class="home-content">
        <div class="container">
            <div class="content">
              <form action="" method="post">
                <div class="user-details">
                  <div class="input-box">
                    <span class="details">First Slogan Slider</span>
                    <input
                      type="text"
                      value=""
                      placeholder="Nhập câu khẩu hiệu đầu tiên"
                      required
                      name="first-slogan-slider"
                    />
                  </div>
                  <div class="input-box">
                    <span class="details">Key Slogan Slider</span>
                    <input
                      type="text"
                      value=""
                      placeholder="Nhập từ khóa khẩu hiệu"
                      required
                      name="key-slogan-slider"
                    />
                  </div>   
                  <div class="input-box">
                    <span class="details">Last Slogan Slider</span>
                    <input
                      type="text"
                      value=""
                      placeholder="Nhập câu khẩu hiệu sau"
                      required
                      name="last-slogan-slider"
                    />
                  </div>
                  <div class="input-box">
                    <span class="details">Sub Slogan Slider</span>
                    <input
                      type="text"
                      value=""
                      placeholder="Nhập câu khẩu hiệu phụ"
                      required
                      name="sub-slogan-slider"
                    />
                  </div>     
                </div>
                <div class="button">
                  <input type="submit" name="edit-slider" value="Sửa Ngay" />
                </div>
              </form>
            </div>
    </div>
</body>
</html>