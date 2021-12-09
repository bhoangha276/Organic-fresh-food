<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sửa danh mục</title>
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
          $sql = "SELECT * FROM tbl_categories WHERE id_categorie= $id";
          $result = $conn->query($sql);
              if($result->num_rows > 0)
              {
                  $row= $result->fetch_array();
                  $title_category = $row['title_categorie'];
                  $content_category = $row['content_categorie'];
                  $img_category = $row['img_categorie'];
              }
      }
      if(isset($_POST['edit-category'])){
          $new_title_category = $_POST['title_category'];
          $new_content_category = $_POST['content_category'];
          $new_img_category = $_POST['img_category'];
          $sql = "UPDATE tbl_categories SET title_categorie='$new_title_category', content_categorie='$new_content_category', img_categorie='$new_img_category' Where id_categorie=$id";
          if (mysqli_query($conn, $sql)) {
              echo '<script>alert("Update thành công");</script>';
          } else {
              echo '<script>alert("Update that bại");</script>'. mysqli_error($conn);
          }
          
      }
    ?>
    <a class="back" href="list-category.php"> Quay lại danh sách danh mục sau khi sửa</a>
    <h1 class="heading">Sửa <span>danh mục</span></h1>
    <div class="search-box">
        <input type="text" placeholder="Tìm kiếm danh mục ..." />
        <i class="bx bx-search"></i>
    </div>
    <div class="home-content">
        <div class="container">
            <div class="content">
              <form action="" method="post">
                <div class="user-details">
                  <div class="input-box">
                    <span class="details">Tiêu đề danh mục</span>
                    <input
                      type="text"
                      value="<?php echo $title_category; ?>"
                      placeholder="Nhập tiêu đề mới"
                      required
                      name="title_category"
                    />
                  </div>
                  <div class="input-box">
                    <span class="details">Nội dung danh mục</span>
                    <input
                      type="text"
                      value="<?php echo $content_category; ?>"
                      placeholder="Nhập nội dung mới"
                      required
                      name="content_category"
                    />
                  </div>
                  <div class="input-box">
                    <span class="details">Hình ảnh danh mục</span>
                    <input
                      type="text"
                      value="<?php echo $img_category; ?>"
                      placeholder="Nhập hình ảnh mới"
                      required
                      name="img_category"
                    />
                  </div>
                </div>
                <div class="button">
                  <input type="submit" name="edit-category" value="Sửa Ngay" />
                </div>
              </form>
            </div>
    </div>
    
  </body>
</html>
