<?php
    if (isset($_POST['add_btn']) && isset($_POST['action'])){
        require("../model/connect_db.php");
        require("../model/identify_db.php");
        require("../model/student_db.php");
        require("../model/course_db.php");
        require("../model/rating_db.php");

        switch ($_POST['action']){
            case 'taikhoan':
                $email = filter_input(INPUT_POST, "email");
                $name = filter_input(INPUT_POST, "username");
                $password = filter_input(INPUT_POST, "password");
                $vaitro = filter_input(INPUT_POST, "vaitro");
                $matkhauungdung = filter_input(INPUT_POST, 'matkhauungdung');
        
                if (empty($vaitro)){
                    $vaitro = 'Học viên';
                }
        
                if (!empty($email) && !empty($name) && !empty($password)){
                    add_account($email, $name, $password, $vaitro, $matkhauungdung);
                    if ($vaitro == "Học viên") add_student("", $name, "", "", "", $email, "");
                    echo "<script>alert('Thêm thành công!'); location.href='table.php?action=taikhoan';</script>";
                } else {
                    echo "<script>alert('Thêm thất bại!'); location.href='table.php?action=taikhoan';</script>";
                }
                break;
            case 'hocvien':
                $student_id = filter_input(INPUT_POST, "idhv");
                $student_name = filter_input(INPUT_POST, "username");
                $gender = filter_input(INPUT_POST, 'gioitinh');
                $dob = filter_input(INPUT_POST, "ngaysinh");
                $hometown = filter_input(INPUT_POST, "quequan");
                $email = filter_input(INPUT_POST, 'email');
                $phone = filter_input(INPUT_POST, "sdt");
                
                if (empty($student_name) || empty($email)){
                    echo "<script>alert('Thêm thất bại!'); location.href='table.php?action=hocvien';</script>";
                    return;
                }

                try {
                    add_student($student_id, $student_name, $gender, $dob, $hometown, $email, $phone);
                    // create account for hocvien with default pass , hoc vien dang nhap co the doi mat khau
                    echo "<script>alert('Thêm thành công!'); location.href='table.php?action=hocvien';</script>";
                } catch (ErrorException $e) {
                    echo "<script>alert('Thêm thất bại!'); location.href='table.php?action=hocvien';</script>";
                    return;
                }
                break;
            case 'khoahoc':
                $course_id = filter_input(INPUT_POST, "idkh");
                $course_name = filter_input(INPUT_POST, "tenkhoahoc");
                $course_author = filter_input(INPUT_POST, 'tacgia');
                $course_description = filter_input(INPUT_POST, "mota");
                $origin_price = filter_input(INPUT_POST, "giagoc");
                $current_price = filter_input(INPUT_POST, 'giahientai');
                $url = filter_input(INPUT_POST, "url");
                $image = filter_input(INPUT_POST, "hinhanh");
                
                if (!empty($course_name) && !empty($course_author) && !empty($course_description) && !empty($origin_price) && !empty($current_price) && !empty($url) && !empty($image)){
                    add_course($course_id, $course_name, $course_author, $course_description, $origin_price, $current_price, $url, $image);
                    echo "<script>alert('Thêm thành công!'); location.href='table.php?action=khoahoc';</script>";
                } else {
                    echo "<script>alert('Thêm thất bại!'); location.href='table.php?action=khoahoc';</script>";
                }
                break;
            case 'danhgia':
                $rating_id = filter_input(INPUT_POST, "iddg");
                $student_id = filter_input(INPUT_POST, "idhv");
                $course_id = filter_input(INPUT_POST, "idkh");
                $review_content = filter_input(INPUT_POST, "noidung");
                $star_rating = filter_input(INPUT_POST, 'saodanhgia');

                if (!empty($student_id) && !empty($course_id) && !empty($review_content) && !empty($star_rating)){
                    add_rating($rating_id, $student_id, $course_id, $review_content, $star_rating);
                    echo "<script>alert('Thêm thành công!'); location.href='table.php?action=danhgia';</script>";
                } else {
                    echo "<script>alert('Thêm thất bại!'); location.href='table.php?action=danhgia';</script>";
                }
                break;
        }
    }else{
        echo "<script>location.href='index.php';</script>";
    }
?>