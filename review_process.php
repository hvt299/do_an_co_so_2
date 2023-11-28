<?php
    require("model/connect_db.php");
    require("model/rating_db.php");
    if (!isset($_COOKIE['idhv'])) {
        echo "<script>alert('Vui lòng đăng nhập để đánh giá!'); location.href='login.php';</script>";
    } else {
        $course_id = $_POST['course_id'];
        $idhv = $_COOKIE['idhv'];
        $review_content = $_POST['review_content'];
        $star_rating = $_POST['star_rating'];
        add_rating($idhv, $course_id, $review_content, $star_rating);
        echo "<script>alert('Cảm ơn đánh giá của bạn!'); location.href='course_info.php?course_id=$course_id';</script>";
        // header("Location: course_info.php?course_id=$course_id");
    }
?>
