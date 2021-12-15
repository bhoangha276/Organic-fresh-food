<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cửa Hàng Thực phẩm</title>
    <link rel="shortcut icon" href="assets/img/logo.png">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />

    <!-- font awesome cdn link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <!-- custom css file link -->
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <?php 
      require_once "connect.php";
      session_start();
      $total = 0;
    ?>

    <!-- header section starts  -->
    <header class="header">
      <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> Fresh Food </a>

      <nav class="navbar">
        <?php
          $sql_menu = mysqli_query($conn,"SELECT * FROM tbl_menu Order By id_item_menu ASC");
          while($row_item_menu = mysqli_fetch_assoc($sql_menu)){
        ?>
        <a href="#<?php echo $row_item_menu['class_item_menu'] ?>"><?php echo $row_item_menu['name_item_menu'] ?></a>
        <?php
          }
        ?>
      </nav>

      <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
        <div class="fas fa-user" id="login-btn"></div>
      </div>

      <!-- Start form search-->
      <form action="" class="search-form">
        <input
          type="search"
          id="search-box"
          placeholder="Tìm kiếm tại đây..."
        />
        <label for="search-box" class="fas fa-search"></label>
      </form>
      <!-- End form search-->

      <div class="shopping-cart">
        <?php
          $cart = (isset($_SESSION['cart'])) ?  $_SESSION['cart'] : []; 
          foreach($cart as $key => $value):
        ?>
        <div class="box">
          <a href="cart.php?id=<?php echo $value['id'] ?>&action=delete"><i class="fas fa-trash"></i></a>
          <img src="assets/img/<?php echo $value['image']; ?>" alt="" />
          <div class="content">
            <h3><?php echo $value['name']; ?></h3>
            <span class="price"><?php echo $value['price']; ?>VND</span>
            <span class="quantity">SL : <?php echo $value['quantify']; ?> </span>
          </div>
        </div>
        <?php
          $total += $value['price']*$value['quantify'];
          endforeach
        ?>
        <div class="total">Tổng : <?php echo $total ?> VND</div>
        <a href="order.php" class="btn">Đặt hàng</a>
      </div>

      <!-- End form info user -->
      <?php
        $id = (isset($_SESSION['id'])) ? $_SESSION['id'] : 0; 
      ?>
      <form action="" method="POST" class="login-form">
        <?php 
          if($id != 0 ){ 
            $sql = "SELECT * FROM user Where id = '".$id."'";
            $result = mysqli_query($conn,$sql);
            if($result->num_rows > 0) { 
              $row= $result->fetch_array();
              $username=$row['username']; 
              $fullname = $row['fullname']; 
              $email = $row['email']; 
            }
        ?>
          <h3>Thông tin tài khoản</h3>
            <div class="item-info">
              <span class="item-label">Tài khoản</span>
              <span class="item-value"><?php echo $username; ?></span>
            </div>
            <div class="item-info">
              <span class="item-label">Tên đầy đủ</span>
              <span class="item-value"><?php echo $fullname; ?></span>
            </div>
            <div class="item-info">
              <span class="item-label">Email</span>
              <span class="item-value"><?php echo $email; ?></span>
            </div>
            <a
              href="editUser.php?user=<?php echo $username?>"
              style="margin-right: 25px"
              class="btn"
              >sửa</a
            >
            <a href="login.php" class="btn">Đăng xuất</a>
        
        <?php
        }
        else{
        ?>
          <a href="login.php" class="btn" >Đăng nhập</a>
          <a href="register.php" class="btn">Đăng ký</a> 
            <?php 
        }
        ?>
       </form>
      <!-- End form info user -->
    </header>
    <!-- header section ends -->




    <!-- home section starts  -->
    <?php
      $sql_slider = "SELECT * FROM tbl_slider";
      $result_slider = mysqli_query($conn,$sql_slider);
      if($result_slider->num_rows > 0)
      { 
        $row_slider= $result_slider->fetch_array();
        $first_slogan=$row_slider['first_slogan_slider']; 
        $key_slogan = $row_slider['key_slogan_slider']; 
        $last_slogan = $row_slider['last_slogan_slider']; 
        $sub_slogan = $row_slider['sub_slogan_slider']; 
      } 
    ?>
    <section class="home" id="home" >
      <div class="content">
        <h3><?php echo $first_slogan ?> <span><?php echo $key_slogan ?> </span><?php echo $last_slogan ?></h3>
        <p><?php echo $sub_slogan ?></p>
        <a href="#products" class="btn">mua ngay</a>
      </div>
    </section>
    <!-- home section ends -->

    <!-- features section starts  -->
    <section class="features" id="features">
      <h1 class="heading">Nội dung <span>Nổi Bật</span></h1>
      <div class="box-container">
        <?php
          $sql_features = mysqli_query($conn,"SELECT * FROM tbl_features Order By id_feature ASC");
          while($row_feature = mysqli_fetch_assoc($sql_features)){
        ?>
        <div class="box">
          <img src="assets/img/<?php echo $row_feature['img_feature'] ?>"alt=""/>
          <h3><?php echo $row_feature['title_feature'] ?></h3>
          <p><?php echo $row_feature['description_feature'] ?></p>
          <a href="#" class="btn">đọc thêm</a>
        </div>
        <?php
          }
        ?>
      </div>
    </section>
    <!-- features section ends -->

    <!-- products section starts  -->
    <section class="products" id="products">
      <h1 class="heading">nội dung <span>sản phẩm</span></h1>
      <!-- slider1 -->
      <div class="swiper product-slider">
        <div class="swiper-wrapper">
          <?php
            $sql_products = mysqli_query($conn,"SELECT * FROM tbl_products Order By id_product ASC");
            while($row_product = mysqli_fetch_assoc($sql_products)){
              if($row_product['category_product'] == 1)
              {
          ?>
          <div class="swiper-slide box">
            <img
              src="assets/img/<?php echo $row_product['img_product'] ?>"
              alt=""
            />
            <h3><?php echo $row_product['name_product'] ?></h3>
            <div class="price">
              <?php echo $row_product['price_product'] ?>VND/1kg
            </div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="cart.php?id=<?php echo $row_product['id_product'] ?>&action=add" class="btn">thêm vào giỏ</a>
          </div>
          <?php
            }
          }
          ?>
        </div>
      </div>


      <!-- slider2 -->
      <div class="swiper product-slider">
        <div class="swiper-wrapper">
          <?php
            $sql_products = mysqli_query($conn,"SELECT * FROM tbl_products Order By id_product ASC");
            while($row_product = mysqli_fetch_assoc($sql_products)){
              if($row_product['category_product'] == 2)
              {
          ?>
          <div class="swiper-slide box">
            <img
              src="assets/img/<?php echo $row_product['img_product'] ?>"
              alt=""
            />
            <h3><?php echo $row_product['name_product'] ?></h3>
            <div class="price">
              <?php echo $row_product['price_product'] ?>VND/1kg
            </div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="cart.php?id=<?php echo $row_product['id_product'] ?>&action=add" class="btn">thêm vào giỏ</a>
          </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
      <!-- slider3 -->
      <div class="swiper product-slider">
        <div class="swiper-wrapper">
          <?php
            $sql_products = mysqli_query($conn,"SELECT * FROM tbl_products Order By id_product ASC");
            while($row_product = mysqli_fetch_assoc($sql_products)){
              if($row_product['category_product'] == 4)
              {
          ?>
          <div class="swiper-slide box">
            <img
              src="assets/img/<?php echo $row_product['img_product'] ?>"
              alt=""
            />
            <h3><?php echo $row_product['name_product'] ?></h3>
            <div class="price">
              <?php echo $row_product['price_product'] ?>VND/1kg
            </div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="cart.php?id=<?php echo $row_product['id_product'] ?>&action=add" class="btn">thêm vào giỏ</a>
          </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </section>
    <!-- products section ends -->

    <!-- categories section starts  -->
    <section class="categories" id="categories">
      <h1 class="heading">danh mục <span>sản phẩm</span></h1>
      <div class="box-container">
        <?php
            $sql_categories = mysqli_query($conn,"SELECT * FROM tbl_categories Order By id_categorie ASC");
            while($row_categorie = mysqli_fetch_assoc($sql_categories)){
          ?>
        <div class="box">
          <img
            src="assets/img/<?php echo $row_categorie['img_categorie'] ?>"
            alt=""
          />
          <h3><?php echo $row_categorie['title_categorie'] ?></h3>
          <p><?php echo $row_categorie['content_categorie'] ?></p>
          <a href="#" class="btn">mua ngay</a>
        </div>
        <?php
          }
        ?>
      </div>
    </section>
    <!-- categories section ends -->

    <!-- review section starts  -->
    <section class="review" id="review">
      <h1 class="heading">Đánh giá<span>khách hàng</span></h1>
      <div class="swiper review-slider">
        <div class="swiper-wrapper">
          <?php
            $sql_reviews = mysqli_query($conn,"SELECT * FROM tbl_reviews Order By id_review ASC");
            while($row_review = mysqli_fetch_assoc($sql_reviews)){
          ?>
          <div class="swiper-slide box">
            <img src="assets/img/<?php echo $row_review['img_review'] ?>" alt="" />
            <p>
              <?php echo $row_review['content_review'] ?>
            </p>
            <h3><?php echo $row_review['name_review']?> </h3>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>
          <?php
            }
          ?>
        </div>
      </div>
    </section>
    <!-- review section ends -->

    <!-- blogs section starts  -->
    <section class="blogs" id="blogs">
      <h1 class="heading">bài <span>viết</span></h1>
      <div class="box-container">
        <?php
            $sql_blogs = mysqli_query($conn,"SELECT * FROM tbl_blogs Order By id_blog ASC");
            while($row_blog = mysqli_fetch_assoc($sql_blogs)){
        ?>
        <div class="box">
          <img src="assets/img/<?php echo $row_blog['img_blog'] ?>" alt="" />
          <div class="content">
            <div class="icons">
              <a href="#"> <i class="fas fa-user"></i> <?php echo $row_blog['user_blog'] ?> </a>
              <a href="#"> <i class="fas fa-calendar"></i> <?php echo $row_blog['date_blog'] ?> </a>
            </div>
            <h3><?php echo $row_blog['title_blog'] ?></h3>
            <p>
              <?php echo $row_blog['content_blog'] ?>.
            </p>
            <a href="#" class="btn">đọc thêm</a>
          </div>
        </div>
        <?php
            }
        ?>
      </div>
    </section>
    <!-- blogs section ends -->


    <!-- footer section starts  -->
    <section class="footer">
      <div class="box-container">
        <?php
            $sql_shop = mysqli_query($conn,"SELECT * FROM tbl_shop");
            $row_shop = mysqli_fetch_assoc($sql_shop);
        ?>
        <div class="box">
          <h3><?php echo $row_shop['name_shop'] ?> <i class="fas fa-shopping-basket"></i></h3>
          <p>
            <?php echo $row_shop['introduce_shop'] ?>
          </p>
          <div class="share">
            <a href="<?php echo $row_shop['facebook_shop'] ?>" class="fab fa-facebook-f"></a>
            <a href="<?php echo $row_shop['youtube_shop'] ?>" class="fab fa-youtube"></a>
            <a href="<?php echo $row_shop['instagram_shop'] ?>" class="fab fa-instagram"></a>
          </div>
        </div>

        <div class="box">
          <h3>Các phần website</h3>
          <?php
            $sql_menu = mysqli_query($conn,"SELECT * FROM tbl_menu Order By id_item_menu ASC");
            while($row_item_menu = mysqli_fetch_assoc($sql_menu)){
          ?>
          <a href="#<?php echo $row_item_menu['class_item_menu'] ?>" class="links">
            <i class="fas fa-arrow-right"></i> <?php echo $row_item_menu['name_item_menu'] ?>
          </a>
          <?php
            }
          ?>
        </div>

        <div class="box">
          <h3>Thông tin liên lạc</h3>
          <a href="#" class="links">
            <i class="fas fa-phone"></i> <?php echo $row_shop['phone_shop'] ?>
          </a>
          <a href="#" class="links">
            <i class="fas fa-envelope"></i> <?php echo $row_shop['email_shop'] ?>
          </a>
          <a href="#" class="links">
            <i class="fas fa-map-marker-alt"></i> <?php echo $row_shop['address_shop'] ?>
          </a>
        </div>
      </div>
        
      <div class="credit">
        created by <span> Hà - Hoàng - Đạt </span>
      </div>
    </section>
    <!-- footer section ends -->

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!-- custom js file link -->
    <script src="assets/js/script.js"></script>
  </body>
</html>
