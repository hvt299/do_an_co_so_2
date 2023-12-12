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
    <style>
        #review_form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #review_form h2 {
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        #review_form form {
            margin-top: 20px;
        }

        .review-title {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        #review_content,
        #star_rating {
            width: 100%;
            padding: 12px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        #star_rating {
            appearance: none;
            width: 100%;
            height: 30px;
            background: url('path/to/star-icon.png') repeat-x; /* Thay 'path/to/star-icon.png' bằng đường dẫn đến biểu tượng sao của bạn */
            background-size: contain;
            border: none;
            outline: none;
        }

        .btn-rating {
            background-color: #3498db;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-rating:hover {
            background-color: #2980b9;
        }

    </style>
</head>
<body>
    <?php include("view/header.php"); ?>
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
        
        <div id="review_form">
            <h2><i class="fa-regular fa-message" style="font-size: 30px;"></i> ĐÁNH GIÁ KHÓA HỌC</h2>
            <form action="review_process.php" method="post">
                <input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
                <label for="review_content" class="review-title">Nội dung đánh giá:</label>
                <textarea name="review_content" id="review_content" rows="4" required></textarea>

                <label for="star_rating" class="review-title">Số sao (1-5):</label>
                <input type="number" name="star_rating" id="star_rating" min="1" max="5" required />

                <button class="btn-rating" type="submit">Gửi Đánh Giá</button>
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
        <?php include("view/footer.php"); ?>
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