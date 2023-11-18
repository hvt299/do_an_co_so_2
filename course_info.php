<?php
    session_start();
    require("model/connect_db.php");
    require("model/menu_db.php");
    require("model/course_db.php");
    $menu_list = get_menu();
    $course_list = get_course();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khóa học | COURSE ONLINE - Bring Course To You!</title>
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
                <!-- <li><a href="course_list.php">Khóa học</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Liên hệ</a></li> -->
                <?php endforeach; ?>
            </ul>
            <ul class="links">
                <?php if (isset($_COOKIE['username'])): ?>
                    <li><a href="#" class="links"><?php echo $_COOKIE['username']; ?></a></li>
                    <li><a href="logout.php" class="action_btn">Đăng xuất</a></li>
                <?php else: ?>
                    <li><a href="#" class="cart_btn"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: darkgray;"></i></a></li>
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
            <!-- <li><a href="course_list.php">Khóa học</a></li>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Liên hệ</a></li> -->
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
                <h2 class="text-center"><i class="fa-solid fa-layer-group" style="font-size: 36px;"></i> THÔNG TIN KHÓA HỌC</h2>
                <div class="row row-cols-1 row-cols-md-2 g-4 py-5">
                    <div class="col">
                        <img src="images/khoa-hoc-c-c++(1).png" class="card-img-top" alt="">
                    </div>
                    <div class="col">
                        <div class="card-body">
                        <a href="#" class="card-title"><h2>Khóa học C/C++</h2></a>
                        <p class="card-text">
                            <?php for($i=1;$i<=4;$i++): ?>
                            <i class="fa-solid fa-star"></i>
                            <?php endfor; ?>
                            <i class="fa-regular fa-star"></i>

                            <h4 class="card-text mt-2">
                                <span class="text-primary">159,000 VNĐ</span>
                                <del>199,000 VNĐ</del>
                            </h4>
                            <button class="action_btn" name="add_cart_btn">Thêm vào giỏ hàng</button><br>

                            <hr>
                            <h3>Giới thiệu khóa học</h3>
                            Tác giả: Admin<br>
                            Khóa học lập trình C/C++ từ cơ bản tới nâng cao dành cho người mới bắt đầu. Mục tiêu của khóa học này nhằm giúp các bạn nắm được các khái niệm căn cơ của lập trình, giúp các bạn có nền tảng vững chắc để chinh phục con đường trở thành một lập trình viên.
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <div class="py-5 bg-silver">
                <h2 class="text-center mb-4">CẢM NHẬN CỦA HỌC VIÊN</h2>
                <p class="text-center"><i class="fa-solid fa-quote-right fa-beat-fade" style="font-size: 56px;"></i></p>
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner text-center">
                        <div class="carousel-item active">
                            <!-- <img src="khoa-hoc-c-c++(1).png" class="d-block w-100" alt="..."> -->
                            <p>
                                Hay<br>
                                Học viên: Nguyễn Văn A
                            </p>
                        </div>
                        <div class="carousel-item">
                            <p>
                                Quá Hay<br>
                                Học viên: Nguyễn Văn B
                            </p>
                            <!-- <img src="background_coding.png" class="d-block w-100" alt="..."> -->
                        </div>
                        <div class="carousel-item">
                            <p>
                                Trên cả tuyệt vời<br>
                                Học viên: Nguyễn Văn C
                            </p>
                            <!-- <img src="background_coding.png" class="d-block w-100" alt="..."> -->
                        </div>
                    </div>
                    <button class="carousel-control-prev bg-dark" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next bg-dark" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

        <section class="mb-3">
            <div class="container py-5">
                <h2 class="text-center"><i class="fa-solid fa-layer-group" style="font-size: 36px;"></i> CÁC KHÓA HỌC KHÁC</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4 py-3">
                    <?php foreach ($course_list as $course): ?>
                        <div class="col">
                            <div class="card h-100">
                                <img src="<?php echo $course['HinhAnhKH']; ?>" class="card-img-top" alt="">
                                <div class="card-body">
                                    <a href="#"><h5 class="card-title"><?php echo $course['TenKH']; ?></h5></a>
                                    <p class="card-text">
                                        <!-- <?php echo $course['MoTaKH']; ?><br> -->
                                        <!-- <center> -->
                                        <?php for($i=1;$i<=4;$i++): ?>
                                        <i class="fa-solid fa-star"></i>
                                        <?php endfor; ?>
                                        <i class="fa-regular fa-star"></i>
                                        <!-- </center> -->
                                    </p>
                                </div>
                                <div class="d-flex justify-content-around mb-4">
                                    <h4 class="price"><?php echo number_format($course['GiaHienTaiKH'],0,",",".")."<ins>đ</ins>"; ?></h4>
                                    <del><?php echo number_format($course['GiaGocKH'],0,",",".")."<ins>đ</ins>"; ?></del>
                                    <button class="btn btn-primary">Khám phá ngay</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
                            <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-muted">Trang chủ</a></li>
                            <li class="nav-item mb-2"><a href="course_list.php" class="nav-link p-0 text-muted">Khóa học</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Giới thiệu</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Liên hệ</a></li>
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