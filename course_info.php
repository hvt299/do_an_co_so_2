<?php
    // if(!isset($_SESSION)) { 
        session_start(); 
    // }
    require("model/connect_db.php");
    require("model/menu_db.php");
    require("model/course_db.php");
    require("model/rating_db.php");
    require("login_process.php");
    $menu_list = get_menu();
    $course_list = get_course();

    if (is_null(filter_input(INPUT_GET, 'course_id'))){
        $course_id = 1;
    }else{
        $course_id = filter_input(INPUT_GET, 'course_id');
    }

    $course = get_course_by_id($course_id);
    $ratings = get_rating_by_course_id($course_id);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khóa học | COURSE ONLINE - Bring Course To You!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/swiper@11.0.4/swiper-bundle.min.css" rel="stylesheet">
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
            <?php endforeach; ?>
            <?php if (isset($_COOKIE['username'])): ?>
                <li><a href="cart.php" class="cart_btn"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: darkgray;"></i></a></li>
                <li><a href="#" class="links"><?php echo $_COOKIE['username']; ?></a></li>
                <li><a href="logout.php" class="action_btn">Đăng xuất</a></li>
            <?php else: ?>
                <li><a href="cart.php" class="cart_btn"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: darkgray;"></i></a></li>
                <li><a href="login.php" class="action_btn">Đăng nhập</a></li>
            <?php endif; ?>
        </div>
    </header>

    <main>
        <section class="mb-3">
            <div class="container py-5">
                <h2 class="text-center"><i class="fa-solid fa-layer-group" style="font-size: 36px;"></i> THÔNG TIN KHÓA HỌC</h2>
                <div class="row row-cols-1 row-cols-md-2 g-4 py-5">
                    <?php foreach($course as $c): ?>
                        <div class="col">
                            <img src="<?php echo $c['HinhAnhKH']; ?>" class="card-img-top" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                            <a href="#" class="card-title"><h2><?php echo $c['TenKH']; ?></h2></a>
                            <p class="card-text">
                            <?php
                                $avg_star_rating = get_avg_star_rating_by_course_id(filter_input(INPUT_GET, "course_id"));
                                    if (!empty($avg_star_rating)) {
                                        foreach ($avg_star_rating as $avg){
                                            $avg_star_rating = $avg['avg_star_rating'];
                                        }
                                        $avg_star_rating = round($avg_star_rating);
                                    }else {
                                        $avg_star_rating = 0;
                                    }
                            ?>
                            <?php for ($i = 1; $i <= $avg_star_rating; $i++): ?>
                                <i class="fa-solid fa-star"></i>
                                    <?php endfor; ?>
                            <?php for ($i = 1; $i <= 5 - $avg_star_rating; $i++): ?>
                                <i class="fa-regular fa-star"></i>
                            <?php endfor; ?>

                                <h4 class="card-text mt-2">
                                    <span class="text-primary"><?php echo number_format($c['GiaHienTaiKH'],0,",",".")."<ins>đ</ins>"; ?></span>
                                    <del><?php echo number_format($c['GiaGocKH'],0,",",".")."<ins>đ</ins>"; ?></del>
                                </h4>
                                <form action="cart_process.php" method="POST">
                                    <input type="hidden" name="action" value="add">
                                    <input type="hidden" name="course_id" value="<?php echo $c['IDKH']; ?>">
                                    <button class="action_btn" name="add_cart_btn">Thêm vào giỏ hàng</button><br>
                                </form>
                                <hr>
                                <h3>Giới thiệu khóa học</h3>
                                Tác giả: <?php echo $c['TacGiaKH']; ?><br>
                                <?php echo $c['MoTaKH']; ?>
                            </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="mb-3">
            <div class="py-5">
                <h2 class="text-center"><i class="fa-solid fa-quote-left" style="font-size: 36px;"></i> CẢM NHẬN CỦA HỌC VIÊN</h2>
                <?php if (empty($ratings)): echo "<center>Chưa có lượt đánh giá nào</center>"; else: ?>
                <div class="wrapper">
                    <div class="slide-container">
                        <div class="slide-content swiper mySwiper pb-1">
                            <div class="card-wrapper swiper-wrapper">
                                <?php foreach ($ratings as $rating): ?>
                                    <div class="card card-rating swiper-slide">
                                        <div class="image-content">
                                            <span class="overlay">

                                            </span>
                                            <div class="card-image">
                                                <img src="images/lap-trinh-vien.png" alt="" class="card-img">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h2 class="name">
                                                <?php
                                                    echo $rating['TenHV'];
                                                    echo "<br>";
                                                    echo $rating['TenKH'];
                                                ?>
                                            </h2>
                                            <p class="description">
                                                <?php for ($i = 1; $i <= $rating['SaoDG']; $i++): ?>
                                                    <i class="fa-solid fa-star"></i>
                                                <?php endfor; ?>
                                                <?php for ($i = 1; $i <= 5 - $rating['SaoDG']; $i++): ?>
                                                    <i class="fa-regular fa-star"></i>
                                                <?php endfor; ?>
                                                <br>
                                                <?php echo $rating['NoiDungDG']; ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Form Đánh Giá -->
        <style>
            #review_form {
                max-width: 400px;
                margin: 20px auto;
                padding: 15px;
                background-color: #f5f5f5;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            label {
                display: block;
                margin-bottom: 8px;
            }

            textarea, input {
                width: 100%;
                padding: 8px;
                margin-bottom: 15px;
                box-sizing: border-box;
            }

            button {
                background-color: #4caf50;
                color: white;
                padding: 10px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
        </style>

        <div id="review_form">
            <h2>Đánh Giá Khóa Học</h2>
            <form action="review_process.php" method="post">
                <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
                <input type="hidden" name="idhv" value="<?php if (isset($_SESSION['idhv'])){ echo $_SESSION['idhv'];} ?>">
                <label for="review_content">Nội dung đánh giá:</label>
                <textarea name="review_content" id="review_content" rows="4" required></textarea>

                <label for="star_rating">Số sao (1-5):</label>
                <input type="number" name="star_rating" id="star_rating" min="1" max="5" required />

                <button type="submit">Gửi Đánh Giá</button>
            </form>
        </div>
            
        <section class="mb-3">
            <div class="container py-5">
                <h2 class="text-center"><i class="fa-solid fa-layer-group" style="font-size: 36px;"></i> CÁC KHÓA HỌC KHÁC</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4 py-3">
                    <?php foreach ($course_list as $course): ?>
                        <form action="course_info.php" method="GET">
                            <input type="hidden" name="course_id" value="<?php echo $course['IDKH']; ?>">
                            <div class="col h-100">
                                <div class="card h-100">
                                    <img src="<?php echo $course['HinhAnhKH']; ?>" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <a href="course_info.php?course_id=<?php echo $course['IDKH']; ?>"><h5 class="card-title"><?php echo $course['TenKH']; ?></h5></a>
                                        <p class="card-text">
                                            <?php
                                                $avg_star_rating = get_avg_star_rating_by_course_id($course['IDKH']);
                                                if (!empty($avg_star_rating)) {
                                                    foreach ($avg_star_rating as $avg){
                                                        $avg_star_rating = $avg['avg_star_rating'];
                                                    }
                                                    $avg_star_rating = round($avg_star_rating);
                                                }else {
                                                    $avg_star_rating = 0;
                                                }
                                            ?>
                                            <?php for ($i = 1; $i <= $avg_star_rating; $i++): ?>
                                            <i class="fa-solid fa-star"></i>
                                            <?php endfor; ?>
                                            <?php for ($i = 1; $i <= 5 - $avg_star_rating; $i++): ?>
                                            <i class="fa-regular fa-star"></i>
                                            <?php endfor; ?>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-around mb-4">
                                        <h4 class="price"><?php echo number_format($course['GiaHienTaiKH'],0,",",".")."<ins>đ</ins>"; ?></h4>
                                        <del><?php echo number_format($course['GiaGocKH'],0,",",".")."<ins>đ</ins>"; ?></del>
                                        <button class="btn btn-primary" type="submit">Khám phá ngay</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11.0.4/swiper-bundle.min.js"></script>
    <script>
        // Initialize Swiper
        var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop:true,
        centerSlide:'true',
        fade:'true',
        grabCursor:'true',
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets:true,
        },
        navigation:{
            nextEl:".swiper-button-next",
            prevEl:".swiper-button-prev",
        },
        breakpoints:{
            0:{
                slidesPerView:1,
            },
            520:{
                slidesPerView:2,
            },
            950:{
                slidesPerView:3,
            },
        },
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>