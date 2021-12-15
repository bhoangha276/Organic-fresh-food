<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa phần nổi bật trang web</title>
    <link rel="stylesheet" href="assets/css/add-products.css">
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
</head>
<body>
    <?php
      require_once "connect.php";
      if(isset($_GET['id']))
      {
          $id = $_GET['id'];
          $sql = "SELECT * FROM tbl_features WHERE id_feature= $id";
          $result = $conn->query($sql);
              if($result->num_rows > 0)
              {
                  $row= $result->fetch_array();
                  $title_feature = $row['title_feature'];
                  $description_feature = $row['description_feature']; 
                  $img_feature = $row['img_feature'];
              }
      }
      if(isset($_POST['edit-feature'])){
        $title_feature = $_POST['title-feature'];
        $description_feature = $_POST['description-feature'];
        $img_feature = $_POST['img-feature'];
        $sql = "UPDATE tbl_features SET title_feature='$title_feature', description_feature='$description_feature',img_feature='$img_feature'  Where id_feature=$id";
          if (mysqli_query($conn, $sql)) {
              echo '<script>alert("Update thành công");</script>';
          } else {
              echo '<script>alert("Update that bại");</script>'. mysqli_error($conn);
          }
          
      }
    ?>
    <a class="back" href="list-item-feature.php"> Quay lại danh sách nổi bật khi sửa</a>
    <h1 class="heading">Sửa phần <span> nổi bật</span></h1>
    <div class="home-content">
        <div class="container">
            <div class="content">
              <form action="" method="post">
                <div class="user-details">
                  <div class="input-box">
                    <span class="details">Tiêu đề phần nổi bật</span>
                    <input
                      type="text"
                      value="<?php echo $title_feature ?>"
                      placeholder="Nhập tiêu đề mới"
                      required
                      name="title-feature"
                    />
                  </div>
                  <div class="input-box">
                    <span class="details">Mô tả phần nổi bật</span>
                    <input
                      type="text"
                      value="<?php echo $description_feature ?>"
                      placeholder="Nhập mô tả mới"
                      required
                      name="description-feature"
                    />
                  </div> 
                  <div class="input-box">
                    <span class="details">Hình ảnh phần nổi bật</span>
                    <input
                      type="text"
                      value="<?php echo $img_feature ?>"
                      placeholder="Nhập hình ảnh mới"
                      required
                      name="img-feature"
                    />
                  </div>  
                </div>
                <div class="button">
                  <input type="submit" name="edit-feature" value="Sửa Ngay" />
                </div>
              </form>
            </div>
    </div>
</body>
</html>