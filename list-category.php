<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách danh mục web</title>
    <link rel="stylesheet" href="assets/css/list-products.css" />
    <link
    href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
    rel="stylesheet"
    />
</head>
<body>
<?php require_once "connect.php"; ?>
    <section class="home-content">
      <h1 class="heading">Danh sách <span>nội dung danh mục</span></h1>
      <div class="list-products">
        <div style="overflow-x: auto">
            <table>
                <thead>
                  <tr>
                    <th>Id Category</th>
                    <th>Title Category</th>
                    <th>Content Category</th>
                    <th>Image Category</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $sql_category = mysqli_query($conn,"SELECT * FROM tbl_categories Order By id_categorie ASC");
                      while($row_categorie = mysqli_fetch_assoc($sql_category)){
                    ?>
                    <tr>
                        <td><?php echo $row_categorie['id_categorie'] ?></td>
                        <td><?php echo $row_categorie['title_categorie'] ?></td>
                        <td><?php echo $row_categorie['content_categorie'] ?></td>
                        <td><?php echo $row_categorie['img_categorie'] ?></td>
                        <td>
                        <a href="edit-category.php?id=<?php echo  $row_categorie['id_categorie']; ?>">Sửa</a>
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