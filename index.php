<?php
    // Khởi động session
    session_start();

    // Kết nối database và các bảng
    require("model/connect_db.php");
    require("model/menu_db.php");
    require("model/course_db.php");
    require("model/rating_db.php");

    // Lấy dữ liệu từ các bảng
    $menu_list = get_menu();
    $course_list = get_course();
    $rating_list = get_rating();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tiêu đề -->
    <title>COURSE ONLINE - Bring Course To You!</title> 
    
    <!-- CSS tự làm -->
    <link rel="stylesheet" href="style.css">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- CSS Swiper -->
    <link href="https://cdn.jsdelivr.net/npm/swiper@11.0.4/swiper-bundle.min.css" rel="stylesheet">
    
    <!-- JS Font Awesome (Icon) -->
    <script src="https://kit.fontawesome.com/73d99ea241.js" crossorigin="anonymous"></script>

</head>
<body>
    <!-- Phần header (menu) -->
    <?php include("view/header.php"); ?>
    <!-- Phần main (nội dung chính) -->
    <main>
        <!-- Banner quảng cáo -->
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

        <!-- Mục các khóa học hiện có -->
        <section class="mb-3">
            <div class="container py-5">
                <h2 class="text-center"><i class="fa-solid fa-layer-group" style="font-size: 36px;"></i> CÁC KHÓA HỌC CỦA CHÚNG TÔI</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4 py-5">

                    <!-- Vòng lặp tạo danh sách các khóa học -->
                    <?php foreach ($course_list as $course): ?>
                        <!-- Sử dụng form với phương thức GET để truyền dữ liệu sang trang course_info.php -->
                        <form action="course_info.php" method="GET">
                            <!-- Lấy dữ liệu ID của khóa học -->
                            <input type="hidden" name="course_id" value="<?php echo $course['IDKH']; ?>">
                            
                            <!-- Nội dung của một khóa học -->
                            <div class="col h-100">
                                <div class="card h-100">
                                    <!-- Lấy dữ liệu hình ảnh của khóa học -->
                                    <img src="<?php echo $course['HinhAnhKH']; ?>" class="card-img-top" alt="">
                                    <!-- Phần thân của khóa học -->
                                    <div class="card-body">
                                        <!-- Lấy dữ liệu ID và tên của khóa học -->
                                        <a href="course_info.php?course_id=<?php echo $course['IDKH']; ?>"><h5 class="card-title"><?php echo $course['TenKH']; ?></h5></a>
                                        
                                        <!-- Lấy dữ liệu sao đánh giá của khóa học -->
                                        <p class="card-text">
                                            <?php
                                                // Lấy dữ liệu giá trị trung bình của sao đánh giá của khóa học
                                                $avg_star_rating = get_avg_star_rating_by_course_id($course['IDKH']);

                                                if (!empty($avg_star_rating)) {
                                                    foreach ($avg_star_rating as $avg){
                                                        $avg_star_rating = $avg['avg_star_rating'];
                                                    }
                                                    // Làm tròn sao đánh giá
                                                    $avg_star_rating = round($avg_star_rating);
                                                }else {
                                                    $avg_star_rating = 0;
                                                }
                                            ?>
                                            <!-- In ra số sao đánh giá -->
                                            <?php for ($i = 1; $i <= $avg_star_rating; $i++): ?>
                                            <i class="fa-solid fa-star"></i>
                                            <?php endfor; ?>

                                            <!-- In ra số sao còn lại -->
                                            <?php for ($i = 1; $i <= 5 - $avg_star_rating; $i++): ?>
                                            <i class="fa-regular fa-star"></i>
                                            <?php endfor; ?>
                                        </p>
                                    </div>
                                    <!-- Phần đơn giá của khóa học -->
                                    <div class="d-flex justify-content-around mb-4">
                                        <!-- Lấy dữ liệu đơn giá hiện tại và giá gốc của khóa học -->
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

        <!-- Mục các vấn đề gặp phải khi tự học lập trình -->
        <section class="mb-3">
            <div class="py-5 f5f6fa-bg-color">
                <h2 class="text-center"><i class="fa-solid fa-brain" style="font-size: 36px;"></i> NHỮNG VẤN ĐỀ GẶP PHẢI KHI TỰ HỌC LẬP TRÌNH</h2>
                <div class="row d-flex justify-content-center text-center py-5">
                    <div class="col-lg-2 col-sm-6">
                        <img src="images/lo-trinh.png" class="img-item" alt="">
                        <p class="card-text">Bạn muốn bắt đầu học lập trình nhưng không biết cần học những kiến thức nào, lộ trình ra sao cho hiệu quả.</p>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <img src="images/tu-duy.png" class="img-item" alt="">
                        <p class="card-text">Bạn là sinh viên IT đã từng học lập trình nhưng vẫn chưa có được nền tảng kỹ thuật lập trình vững chắc và tư duy giải quyết bài toán.</p>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <img src="images/lap-trinh-vien.png" class="img-item" alt="">
                        <p class="card-text">Bạn là sinh viên các ngành học khác muốn theo ngành IT và muốn trở thành một lập trình viên trong tương lai.</p>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <img src="images/kho-khan.png" class="img-item" alt="">
                        <p class="card-text">Bạn gặp khó khăn khi tự học do không có người định hướng, hướng dẫn và kèm cặp dẫn đến chán nản và dễ bỏ cuộc.</p>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <img src="images/hoc-offline.png" class="img-item" alt="">
                        <p class="card-text">Điều kiện của bạn không cho phép để có thể học lập trình trực tiếp tại các trung tâm ở các thành phố lớn.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mục cảm nhận của học viên -->
        <section class="mb-3">
            <div class="py-5">
                <h2 class="text-center"><i class="fa-solid fa-quote-left" style="font-size: 36px;"></i> CẢM NHẬN CỦA HỌC VIÊN</h2>
                <div class="wrapper">
                    <div class="slide-container">
                        <div class="slide-content swiper mySwiper pb-1">
                            <div class="card-wrapper swiper-wrapper">
                                <?php foreach ($rating_list as $rating): ?>
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
                    <!-- <div class="swiper-button-next swiper-navBtn"></div> -->
                    <!-- <div class="swiper-button-prev swiper-navBtn"></div> -->
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
            </div>
        </section>

        <!-- Phần footer -->
        <?php include("view/footer.php"); ?>
    </main>

    <!-- JS Dropdown Menu -->
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

    <!-- JS Swiper -->
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

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS tự làm -->
    <script src="script.js"></script>
</body>
</html>