<?php
// if (!isset($_SESSION)) {
//     session_start();
// }
// $idhv = $_COOKIE['idhv'];

require("model/connect_db.php");
require("model/menu_db.php");
require("model/course_db.php");
require("model/rating_db.php");
require("login_process.php");
if (!isset($_SESSION['idhv'])){
    echo "<script>alert('Vui lòng đăng nhập để đánh giá.'); location.href='login.php';</script>";
}else{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy id
        if (isset($_POST['idhv'])) {
            $idhv = $_POST['idhv'];
        }
        
        $course_id = $_POST['course_id'];
        $review_content = $_POST['review_content'];
        $star_rating = $_POST['star_rating'];
        $conn = mysqli_connect("localhost", "root", "", "courseonline");
        // sql
        $sql = "INSERT INTO danhgia (IDHV, IDKH, NoiDungDG, SaoDG) VALUES ($idhv, $course_id, '$review_content', $star_rating)";
        $result = mysqli_query($conn, $sql);
    
        // Kiểm tra
        if ($result) {
            header("Location: course_info.php?course_id=$course_id&review_added=true");
            exit();
        } else {
            echo "Đã có lỗi xảy ra, vui lòng thử lại sau";
        }
    }
}
?>
