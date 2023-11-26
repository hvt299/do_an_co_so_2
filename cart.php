<?php
    session_start();
    require('model/connect_db.php');
    require("model/menu_db.php");
    $menu_list = get_menu();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng | COURSE ONLINE - Bring Course To You!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/73d99ea241.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="index.php">COURSE ONLINE</a></div>
            <ul class="links">
                <?php foreach ($menu_list as $menu) : ?>
                    <li><a href="<?php echo $menu['URLMenu']; ?>"><?php echo $menu['TenMenu']; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <ul class="links">
                <?php if (isset($_COOKIE['username'])) : ?>
                    <li><a href="cart.php" class="cart_btn"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: darkgray;"></i></a></li>
                    <li><a href="#" class="links"><?php echo $_COOKIE['username']; ?></a></li>
                    <li><a href="logout.php" class="action_btn">Đăng xuất</a></li>
                <?php else : ?>
                    <li><a href="cart.php" class="cart_btn"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: darkgray;"></i></a></li>
                    <li><a href="login.php" class="action_btn">Đăng nhập</a></li>
                <?php endif; ?>
            </ul>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        <div class="dropdown_menu">
            <?php foreach ($menu_list as $menu) : ?>
                <li><a href="<?php echo $menu['URLMenu']; ?>"><?php echo $menu['TenMenu']; ?></a></li>
            <?php endforeach; ?>
            <?php if (isset($_COOKIE['username'])) : ?>
                <li><a href="#" class="links"><?php echo $_COOKIE['username']; ?></a></li>
                <li><a href="logout.php" class="action_btn">Đăng xuất</a></li>
            <?php else : ?>
                <li><a href="#" class="cart_btn"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: darkgray;"></i></a></li>
                <li><a href="login.php" class="action_btn">Đăng nhập</a></li>
            <?php endif; ?>
        </div>
    </header>

    <main>
        <section id="home">
            <h1>&lt;/&gt;Bring Course To You!&lt;/&gt;</h1>
            <p>
                We offer a wide range of comprehensive programming courses to equip you <br>
                with the knowledge and skills necessary to succeed in today's digital world.
            </p>
            <form class="form-inline" action="#">
                <input class="form-control mr-sm-2 mb-3" type="text" placeholder="Tìm khóa học bạn đang quan tâm" size="50px">
                <button class="btn btn-primary" type="submit" style="width: 100%">
                    <i class="fa-solid fa-magnifying-glass fa-beat-fade"></i>
                </button>
            </form>
        </section>

        <section class="mb-3">
            <div class="container py-5">
                <h2>Giỏ hàng</h2>
                <?php if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])) { ?>

                <div class="shopping-cart">

                    <div class="column-labels">
                        <label class="product-image">Hình ảnh</label>
                        <label class="product-details">Sản phẩm</label>
                        <label class="product-price">Đơn giá</label>
                        <label class="product-quantity">Số lượng</label>
                        <label class="product-removal">Xóa</label>
                        <label class="product-line-price">Thành tiền</label>
                    </div>

                    <?php
                        $total = 0;
                        $discount = 0;
                        foreach ($_SESSION['cart_item'] as $key_car => $val_cart_item) : ?>

                    <div class="product">
                        <div class="product-image">
                            <img src="<?php echo $val_cart_item['HinhAnhKH']; ?>">
                        </div>
                        <div class="product-details">
                            <div class="product-title"><?php echo $val_cart_item['TenKH']; ?></div>
                            <!-- <p class="product-description"> It has a lightweight, breathable mesh upper with forefoot cables for a locked-down fit.</p> -->
                        </div>
                        <div class="product-price"><?php echo number_format($val_cart_item['GiaHienTaiKH'], 0, ",", ".") . "<ins>đ</ins>"; ?></div>
                        <div class="product-quantity">
                            <input type="number" value="1" max="1" min="1">
                        </div>
                        <div class="product-removal">
                            <form action="cart_process.php" method="post">
                                <input type="hidden" name="course_id" value="<?php echo $val_cart_item['IDKH']; ?>">
                                <input type="hidden" name="action" value="delete">
                                <!-- <input type="submit" name="submit" value="Xóa" /> -->
                                <button class="remove-product">
                                    Xóa khỏi giỏ hàng
                                </button>
                            </form>
                        </div>
                        <div class="product-line-price">
                            <?php
                                $total_item =  ($val_cart_item['GiaHienTaiKH'] * 1);
                                echo number_format($total_item, 0, ",", ".") . "<ins>đ</ins>"; ?>
                        </div>
                    </div>

                    <?php
                        $total += $total_item;
                        $discount += $val_cart_item['GiaGocKH'] - $val_cart_item['GiaHienTaiKH'];
                        endforeach; ?>

                    <?php
                        $vat = $total * .05;
                        $grand_total = $total + $vat; ?>

                    <div class="totals">
                        <div class="totals-item">
                            <label>Tổng tiền</label>
                            <div class="totals-value" id="cart-subtotal"><?php echo number_format($total, 0, ",", ".") . "<ins>đ</ins>"; ?></div>
                        </div>
                        <div class="totals-item">
                            <label>Thuế VAT (5%)</label>
                            <div class="totals-value" id="cart-tax"><?php echo number_format($vat, 0, ",", ".") . "<ins>đ</ins>"; ?></div>
                        </div>
                        <div class="totals-item">
                            <label>Tổng giảm giá</label>
                            <div class="totals-value" id="cart-shipping"><?php echo number_format($discount, 0, ",", ".") . "<ins>đ</ins>"; ?></div>
                        </div>
                        <div class="totals-item totals-item-total">
                            <label>Tổng thanh toán</label>
                            <div class="totals-value" id="cart-total"><?php echo number_format($grand_total, 0, ",", ".") . "<ins>đ</ins>"; ?></div>
                        </div>
                    </div>

                    <button class="checkout">Tiếp tục thanh toán</button>
                    <?php } else { ?>
                        <p class="product-description">
                            Chưa có khóa học nào trong giỏ hàng<br>
                            Cùng khám phá các khóa học tại Course Online nhé!
                        </p>
                    <?php } ?>
                </div>
            </div>
        </section>

        <div class="container">
            <footer class="py-5">
                <div class="row">
                    <div class="col-3">
                        <a href="index.php" class="links">
                            <h5 class="text-primary">COURSE ONLINE</h5>
                        </a>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2">Bring Course To You!</li>
                        </ul>
                    </div>

                    <div class="col-2">
                        <h5 class="text-primary">Menu</h5>
                        <ul class="nav flex-column">
                            <?php foreach ($menu_list as $menu) : ?>
                                <li class="nav-item mb-2"><a href="<?php echo $menu['URLMenu']; ?>" class="nav-link p-0 text-muted"><?php echo $menu['TenMenu']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="col-2">
                        <h5 class="text-primary">Liên kết khác</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="https://www.w3schools.com/" class="nav-link p-0 text-muted">W3Schools</a></li>
                            <li class="nav-item mb-2"><a href="https://openplanning.net/" class="nav-link p-0 text-muted">Openplanning</a></li>
                            <li class="nav-item mb-2"><a href="https://www.coursera.org/" class="nav-link p-0 text-muted">Coursera</a></li>
                            <li class="nav-item mb-2"><a href="https://fullstack.edu.vn/" class="nav-link p-0 text-muted">F8 - Học Lập Trình</a></li>
                            <li class="nav-item mb-2"><a href="https://cuocthilaptrinh.com/" class="nav-link p-0 text-muted">Cuộc thi lập trình VKU</a></li>
                        </ul>
                    </div>

                    <div class="col-4 offset-1">
                        <form>
                            <h5>Đăng ký nhận thông báo tại đây</h5>
                            <p>Thông báo hàng tháng về những điều mới lạ và thú vị mà bạn không thể bỏ lỡ từ chúng tôi.</p>
                            <div class="d-flex w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Email address</label>
                                <input id="newsletter1" type="text" class="form-control" placeholder="Type your email address here...">
                                <button class="btn btn-primary" type="button">Theo dõi</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-flex justify-content-between py-4 my-4 border-top">
                    <p>&copy; <?php echo date("Y"); ?> Course Online, Inc. All rights reserved.</p>
                </div>
            </footer>
        </div>
    </main>

    <script>
        const toggleBtn = document.querySelector('.toggle_btn');
        const toggleBtnIcon = document.querySelector('.toggle_btn i');
        const dropDownMenu = document.querySelector('.dropdown_menu');

        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open');
            const isOpen = dropDownMenu.classList.contains('open');
            toggleBtnIcon.classList = isOpen ?
                'fa-solid fa-xmark' :
                'fa-solid fa-bars'
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>