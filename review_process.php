<?php
    require("model/student_db.php");
    require("model/connect_db.php");
    require("model/rating_db.php");
    $count = 0;
    $idhv = null;
    if (!isset($_COOKIE['idhv'])) {
        echo "<script>alert('Vui lòng đăng nhập để đánh giá!'); location.href='login.php';</script>";
        return;
    }
    else{
        $idhv = $_COOKIE['idhv'];
    }
    $current_course = $_POST['course_id'];
    $course_id = $_POST['course_id'];
    $idhv = $_COOKIE['idhv'];
    $review_content = $_POST['review_content'];
    $star_rating = $_POST['star_rating'];
    if(has_number($idhv, $current_course) == true){
            add_rating("", $idhv, $course_id, $review_content, $star_rating);
            echo "<script>alert('Cảm ơn đánh giá của bạn!'); location.href='course_info.php?course_id=$course_id';</script>";
            // header("Location: course_info.php?course_id=$course_id");
    }
    else{
        $idrating = get_idrating_by_student_course($idhv, $current_course);
        update_rating($idrating, $review_content, $star_rating);
        echo "<script>alert('Bạn đã chỉnh sửa đánh giá thành công!'); location.href='course_info.php?course_id=$course_id';</script>";
    }
?>
