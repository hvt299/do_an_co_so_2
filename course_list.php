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
    <?php include("view/header.php"); ?>
    <main>
        <section class="mb-3">
            <div class="container py-5">
                <h2 class="text-center"><i class="fa-solid fa-layer-group" style="font-size: 36px;"></i> CÁC KHÓA HỌC CỦA CHÚNG TÔI</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>