<?php
require("model/connect_db.php");
require("login_process.php");
require("model/student_db.php");
// require("profile.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idhv = $_COOKIE['idhv'];
    $tenhv = $_POST['tenhv'];
    $gioiTinh = $_POST['gioiTinh'];
    $ngaySinh = $_POST['ngaySinh'];
    $queQuan = $_POST['queQuan'];
    $email = $_POST['Email'];
    $sdt =  $_POST['soDienThoai'];
    update_profile_student($idhv, $tenhv, $gioiTinh, $ngaySinh, $queQuan, $email, $sdt);
    echo "<script>alert('Chỉnh sửa thành công!'); location.href='profile.php';</script>";
}

?>