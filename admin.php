<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/admin.css" />
  </head>
  <body>
    <?php require_once "connect.php"; ?>
    <!-- Start Sidebar -->
    <div class="sidebar">
      <div class="logo-detail">
        <i class="bx bxs-shopping-bags"></i>
        <span class="logo_name">Epu</span>
      </div>
      <ul class="nav-link">
        <li>
          <a href="#ad-products">
            <i class="bx bx-box"></i>
            <span class="links-name">Sản phẩm</span>
          </a>
        </li>
        <li>
          <a href="#ad-type-product">
            <i class="bx bx-bar-chart-alt-2"></i>
            <span class="links-name">Loại sản phẩm</span>
          </a>
        </li>
        <li>
          <a href="#ad-orders">
            <i class="bx bx-list-ul"></i>
            <span class="links-name">Danh sách đặt hàng</span>
          </a>
        </li>
        <li>
          <a href="#ad-users">
            <i class="bx bx-user"></i>
            <span class="links-name">Khách hàng</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="bx bx-message"></i>
            <span class="links-name">Tin nhắn </span>
          </a>
        </li>
        <li>
          <a href="#ad-menu-web">
            <i class="bx bx-menu"></i>
            <span class="links-name">Giao diện menu</span>
          </a>
        </li>
        <li>
          <a href="#ad-menu-web">
            <i class="bx bx-slider"></i>
            <span class="links-name">Giao diện slider</span>
          </a>
        </li>
        <li>
          <a href="#ad-feature-web">
            <i class="bx bxs-extension"></i>
            <span class="links-name">Giao diện nổi bật</span>
          </a>
        </li>
        <li>
          <a href="#ad-category-web">
            <i class="bx bx-category"></i>
            <span class="links-name">Giao diện danh mục</span>
          </a>
        </li>
        <li>
          <a href="">
            <i class="bx bx-cog"></i>
            <span class="links-name">Cài đặt </span>
          </a>
        </li>
        <li class="log_out">
          <a href="login.php">
            <i class="bx bx-log-out"></i>
            <span class="links-name">Đăng xuất </span>
          </a>
        </li>
      </ul>
    </div>
    <!-- End Sidebar -->

    <!-- Start Home-Section -->
    <section class="home-section">
      <!-- Start nav -->
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Tìm kiếm..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details" id="info-user-btn">
          <span class="admin_name">admin</span>
          <i class="bx bx-chevron-down"></i>
        </div>

        <form class="info-user-form">
          <h3>Thông tin tài khoản</h3>
          <div class="item-info">
            <span class="item-label">Tài khoản</span>
            <span class="item-value">admin</span>
          </div>
          <div class="item-info">
            <span class="item-label">Tên đầy đủ</span>
            <span class="item-value">Nguyen Admin</span>
          </div>
          <div class="item-info">
            <span class="item-label">Email</span>
            <span class="item-value">nguyenadmin@gmail.com</span>
          </div>
          <a href="login.php" class="btn">Thoát</a>
        </form>
      </nav>
      <!-- End nav -->

      <!-- Start Home-content -->
      <div class="home-content">
        <!-- Start Overview-box -->
        <div class="overview-boxes">
          <?php
            $sql_count_users = mysqli_query($conn,"SELECT COUNT(*) as total FROM user");
            $result_count_users = mysqli_fetch_assoc($sql_count_users);

            $sql_count_products = mysqli_query($conn,"SELECT COUNT(*) as total FROM tbl_products");
            $result_count_products = mysqli_fetch_assoc($sql_count_products);
          ?>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Tổng số khách hàng</div>
              <div class="number">
                <?php echo $result_count_users['total'] - 1; ?>
              </div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Cập nhật mới nhất</span>
              </div>
            </div>
            <i class="bx bxs-user cart two"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Tổng số sản phẩm</div>
              <div class="number">
                <?php echo $result_count_products['total']; ?>
              </div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Cập nhật mới nhất</span>
              </div>
            </div>
            <i class="bx bxs-box cart three"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Đơn hàng đã giao</div>
              <div class="number">8</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Cập nhật mới nhất</span>
              </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
          </div>
        </div>
        <!-- End Overview-box -->

        <div class="list-user-gold">
          <div class="user box">
            <div style="" class="title">Khách hàng VIP</div>
            <div class="user-details" style="overflow-x: auto">
              <table>
                <thead>
                  <tr>
                    <th>Tài khoản</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày sinh</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Điểm</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                        $sql_user_gold = mysqli_query($conn,"SELECT * FROM user ORDER BY points DESC LIMIT 10");
                        while($row_user = mysqli_fetch_assoc($sql_user_gold)){
                    ?>
                  <tr>
                    <td><?php echo $row_user['username'] ?></td>
                    <td><?php echo $row_user['fullname'] ?></td>
                    <td><?php echo $row_user['dateofbirth'] ?></td>
                    <td><?php echo $row_user['email'] ?></td>
                    <td><?php echo $row_user['phone'] ?></td>
                    <td><?php echo $row_user['points'] ?></td>
                  </tr>
                  <?php
                        }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- End Home-content -->
    </section>
    <!-- End Home-Section -->

    <section class="ad-functions" id="ad-products">
      <h1 class="heading">Chức năng <span>sản phẩm</span></h1>
      <div class="function-boxes">
        <div class="box">
          <a href="list-products.php">
            <i class="bx bx-list-ul"></i>
            <div class="function-content">Danh sách, chỉnh sửa, xóa sản phẩm</div>
          </a>
        </div>
        <div class="box">
          <a href="add-products.php">
            <i class="bx bx-add-to-queue"></i>
            <div class="function-content">Thêm sản phẩm</div>
          </a>
        </div>
      </div>
    </section>

    <section class="ad-functions" id="ad-type-product">
      <h1 class="heading">Chức năng <span>loại sản phẩm</span></h1>
      <div class="function-boxes">
        <div class="box">
          <a href="list-type-product.php">
            <i class="bx bx-list-ul"></i>
            <div class="function-content">Danh sách loại sản phẩm</div>
          </a>
        </div>
        <div class="box">
          <a href="add-type-product.php">
            <i class="bx bx-add-to-queue"></i>
            <div class="function-content">Thêm loại sản phẩm</div>
          </a>
        </div>
      </div>
    </section>

    <section class="ad-functions" id="ad-orders">
      <h1 class="heading">Chức năng <span> đơn hàng</span></h1>
      <div class="function-boxes">
        <div class="box">
          <a href="list-order.php">
            <i class="bx bx-check-square"></i>
            <div class="function-content">Duyệt đơn</div>
          </a>
        </div>
      </div>
    </section>

    <section class="ad-functions" id="ad-users">
      <h1 class="heading">Chức năng <span>khách hàng</span></h1>
      <div class="function-boxes">
        <div class="box">
          <a href="list-users.php">
            <i class="bx bx-add-to-queue"></i>
            <div class="function-content">Danh sách khách hàng</div>
          </a>
        </div>
        <div class="box">
          <a href="delete-user.php">
            <i class="bx bxs-trash"></i>
            <div class="function-content">Xóa khách hàng</div>
          </a>
        </div>
      </div>
    </section>

    <section class="ad-functions" id="ad-menu-web">
      <h1 class="heading">Chức năng <span>menu</span></h1>
      <div class="function-boxes">
        <div class="box">
          <a href="list-item-menu.php">
            <i class="bx bx-menu"></i>
            <div class="function-content">Danh sách item menu</div>
          </a>
        </div>
        <div class="box">
          <a href="edit-menu-web.php">
            <i class="bx bx-menu"></i>
            <div class="function-content">Chỉnh sửa menu</div>
          </a>
        </div>
      </div>
    </section>

    <section class="ad-functions" id="ad-slider-web">
      <h1 class="heading">Chức năng <span>slider</span></h1>
      <div class="function-boxes">
        <div class="box">
          <a href="edit-slider-web.php">
            <i class="bx bx-edit"></i>
            <div class="function-content">Chỉnh sửa slider</div>
          </a>
        </div>
      </div>
    </section>

    <section class="ad-functions" id="ad-feature-web">
      <h1 class="heading">Chức năng <span>nổi bật</span></h1>
      <div class="function-boxes">
        <div class="box">
          <a href="list-item-feature.php">
            <i class="bx bx-extension"></i>
            <div class="function-content">Danh sách phần nổi bật</div>
          </a>
        </div>
        <div class="box">
          <a href="edit-feature-web.php">
            <i class="bx bx-extension"></i>
            <div class="function-content">Chỉnh sửa phần nổi bật</div>
          </a>
        </div>
      </div>
    </section>

    <section class="ad-functions" id="ad-category-web">
      <h1 class="heading">Chức năng <span>danh mục</span></h1>
      <div class="function-boxes">
        <div class="box">
          <a href="list-category.php">
            <i class="bx bx-category"></i>
            <div class="function-content">Danh sách, chỉnh sửa danh mục</div>
          </a>
        </div>
        <div class="box">
          <a href="add-category.php">
            <i class="bx bx-category"></i>
            <div class="function-content">Thêm danh mục</div>
          </a>
        </div>
      </div>
    </section>

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };

      let infoUserForm = document.querySelector(".info-user-form");
      document.querySelector("#info-user-btn").onclick = () => {
        infoUserForm.classList.toggle("active");
      };
    </script>
    <!-- <script src="/assets/js/script.js"></script> -->
  </body>
</html>
