<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách phần nổi bật trang web</title>
    <link rel="stylesheet" href="assets/css/list-products.css" />
    <link
    href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
    rel="stylesheet"
    />
</head>
<body>
<?php require_once "connect.php"; ?>
    <section class="home-content">
      <h1 class="heading">Danh sách <span>nội dung nổi bật</span></h1>
      <div class="list-products">
        <div style="overflow-x: auto">
            <table>
                <thead>
                  <tr>
                    <th>Id Feature</th>
                    <th>Title Feature</th>
                    <th>Description Feature</th>
                    <th>Image Feature </th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $sql_feature = mysqli_query($conn,"SELECT * FROM tbl_features Order By id_feature ASC");
                      while($row_feature = mysqli_fetch_assoc($sql_feature)){
                    ?>
                    <tr>
                        <td><?php echo $row_feature['id_feature'] ?></td>
                        <td><?php echo $row_feature['title_feature'] ?></td>
                        <td><?php echo $row_feature['description_feature'] ?></td>
                        <td><?php echo $row_feature['img_feature'] ?></td>
                        <td>
                        <a href="edit-feature-web.php?id=<?php echo  $row_feature['id_feature']; ?>">Sửa</a>
                        </td>  
                        </tr>
                    <?php
                       }
                    ?>
                </tbody>
            </table>
        </div>    
    </section>
    <a class="back" href="admin.php"> Quay lại trang chủ</a>
</body>
</html>