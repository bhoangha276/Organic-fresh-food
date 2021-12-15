<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa menu website</title>
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
          $sql = "SELECT * FROM tbl_menu WHERE id_item_menu= $id";
          $result = $conn->query($sql);
              if($result->num_rows > 0)
              {
                  $row= $result->fetch_array();
                  $name_item_menu = $row['name_item_menu'];
                  $class_item_menu = $row['class_item_menu'];
              }
      }
      if(isset($_POST['edit-item-menu'])){
          $name_item_menu = $_POST['name-item-menu'];
          $class_item_menu = $_POST['class-item-menu'];
          $sql = "UPDATE tbl_menu SET name_item_menu='$name_item_menu', class_item_menu='$class_item_menu' Where id_item_menu=$id";
          if (mysqli_query($conn, $sql)) {
              echo '<script>alert("Update thành công");</script>';
          } else {
              echo '<script>alert("Update that bại");</script>'. mysqli_error($conn);
          }
          
      }
    ?>

    <a class="back" href="list-item-menu.php"> Quay lại danh sách item menu sau khi sửa</a>
    <h1 class="heading">Sửa item <span>menu</span></h1>
    <div class="home-content">
        <div class="container">
            <div class="content">
              <form action="" method="post">
                <div class="user-details">
                  <div class="input-box">
                    <span class="details">Tên chỉ mục menu</span>
                    <input
                      type="text"
                      value=""
                      placeholder="Nhập tên chỉ mục menu mới"
                      required
                      name="name-item-menu"
                    />
                  </div>
                  <div class="input-box">
                    <span class="details">Class chỉ mục menu</span>
                    <input
                      type="text"
                      value=""
                      placeholder="Nhập class chỉ mục menu mới"
                      required
                      name="class-item-menu"
                    />
                  </div>  
                </div>
                <div class="button">
                  <input type="submit" name="edit-item-menu" value="Sửa Ngay" />
                </div>
              </form>
            </div>
    </div>
    
</body>
</html>