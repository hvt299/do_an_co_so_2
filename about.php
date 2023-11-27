<?php
    session_start();
    require("model/connect_db.php");
    require("model/menu_db.php");
    require("model/course_db.php");
    require("model/rating_db.php");
    $menu_list = get_menu();
    $course_list = get_course();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khóa học | COURSE ONLINE - Bring Course To You!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/73d99ea241.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="index.php">COURSE ONLINE</a></div>
            <ul class="links">
                <?php foreach ($menu_list as $menu): ?>
                <li><a href="<?php echo $menu['URLMenu']; ?>"><?php echo $menu['TenMenu']; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <ul class="links">
                <?php if (isset($_COOKIE['username'])): ?>
                    <li><a href="cart.php" class="cart_btn"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: darkgray;"></i></a></li>
                    <li><a href="#" class="links"><?php echo $_COOKIE['username']; ?></a></li>
                    <li><a href="logout.php" class="action_btn">Đăng xuất</a></li>
                <?php else: ?>
                    <li><a href="cart.php" class="cart_btn"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: darkgray;"></i></a></li>
                    <li><a href="login.php" class="action_btn">Đăng nhập</a></li>
                <?php endif; ?>
            </ul>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        <div class="dropdown_menu">
            <?php foreach ($menu_list as $menu): ?>
            <li><a href="<?php echo $menu['URLMenu']; ?>"><?php echo $menu['TenMenu']; ?></a></li>
            <?php endforeach; ?>
            <?php if (isset($_COOKIE['username'])): ?>
                <li><a href="#" class="links"><?php echo $_COOKIE['username']; ?></a></li>
                <li><a href="logout.php" class="action_btn">Đăng xuất</a></li>
            <?php else: ?>
                <li><a href="#" class="cart_btn"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: darkgray;"></i></a></li>
                <li><a href="login.php" class="action_btn">Đăng nhập</a></li>
            <?php endif; ?>
        </div>
    </header>

    <main>
        <section class="mb-3">
            <div class="container py-5">
                <div class="title">
                    <h1>Đội ngũ phát triển</h1>
                </div>
                <div class="teams">
                    <img src="images/lap-trinh-vien.png" height="100px" alt="">
                    <div class="name">Hứa Viết Thái</div>
                    <div class="role">Developer</div>
                    <div class="about">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus inventore atque voluptate fugiat nobis tenetur alias, dolorem dicta consequatur at accusantium nostrum, ut expedita odio. Doloribus eaque fuga perspiciatis in.
                    </div>
                    <div class="social-links">
                        <a href="" class="card-title"><i class="fa-brands fa-facebook" style="position:unset;transform:none;"></i></a>
                        <a href="" class="card-title"><i class="fa-brands fa-facebook" style="position:unset;transform:none;"></i></a>
                        <a href="" class="card-title"><i class="fa-brands fa-facebook" style="position:unset;transform:none;"></i></a>
                        <a href="" class="card-title"><i class="fa-brands fa-facebook" style="position:unset;transform:none;"></i></a>
                    </div>
                </div>

                <div class="teams">
                    <img src="images/lap-trinh-vien.png" height="100px" alt="">
                    <div class="name">Phạm Thế Anh</div>
                    <div class="role">Developer</div>
                    <div class="about">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus inventore atque voluptate fugiat nobis tenetur alias, dolorem dicta consequatur at accusantium nostrum, ut expedita odio. Doloribus eaque fuga perspiciatis in.
                    </div>
                    <div class="social-links">
                        <a href="" class="card-title"><i class="fa-brands fa-facebook" style="position:unset;transform:none;"></i></a>
                        <a href="" class="card-title"><i class="fa-brands fa-facebook" style="position:unset;transform:none;"></i></a>
                        <a href="" class="card-title"><i class="fa-brands fa-facebook" style="position:unset;transform:none;"></i></a>
                        <a href="" class="card-title"><i class="fa-brands fa-facebook" style="position:unset;transform:none;"></i></a>
                    </div>
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