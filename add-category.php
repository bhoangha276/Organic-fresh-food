<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thêm danh mục</title>
    <link rel="stylesheet" href="assets/css/add-products.css">
  </head>
  <body>
    <?php
        if(isset($_POST['add-category'])){
          require_once "connect.php";
          $sqlCheckCategory = "SELECT * FROM tbl_categories Where title_categorie = '".$_POST['title_category']."'";
          $resultCheckCategory = $conn->query($sqlCheckCategory); 
          if($resultCheckCategory->num_rows >0)
          {
            echo '<script> alert("Danh mục này đã tồn tại, vui lòng nhập danh mục khác");</script>';
          }
          else{
            $sql = "INSERT INTO tbl_categories (title_categorie,content_categorie,img_categorie)  VALUES ('".$_POST['title_category']."','".$_POST['content_category']."','".$_POST['img-category']."')";
            $result =$conn->query($sql); 
            if($result === TRUE) { 
              echo '<script> alert("Thêm vào thành công !!");</script>'; 
            } 
            else{ 
              echo '<script> alert("Thêm vào không thành công !!");</script>'; 
            } 
            $conn->close(); 
          }
        }
    ?>
    <a class="back" href="list-category.php">Danh sách danh sách sau khi thêm</a>
    <h1 class="heading">Thêm <span>danh mục</span></h1>
    <div class="home-content">
        <div class="container">
            <div class="content">
              <form action="" method="post">
                <div class="user-details">
                  <div class="input-box">
                    <span class="details">Tiêu đề danh mục</span>
                    <input
                      type="text"
                      placeholder="Nhập tiêu đề"
                      required
                      name="title_category"
                    />
                  </div>
                  <div class="input-box">
                    <span class="details">Nội dung danh mục</span>
                    <input
                      type="text"
                      placeholder="Nhập nội dung danh mục"
                      required
                      name="content_category"
                    />
                  </div>
                  <div class="input-box">
                    <span class="details">Hình ảnh danh mục</span>
                    <input
                      type="text"
                      placeholder="Nhập hình ảnh danh mục"
                      required
                      name="img-category"
                    />
                  </div>
                </div>
                <div class="button">
                  <input type="submit" name="add-category" value="Thêm ngay" />
                </div>
              </form>
            </div>

    </div>
  </body>
</html>
