<?php
    if (isset($_POST['edit_btn']) && isset($_POST['action'])){
        require("../model/connect_db.php");
        require("../model/identify_db.php");
        require("../model/student_db.php");
        require("../model/course_db.php");
        require("../model/rating_db.php");

        switch ($_POST['action']){
            case 'taikhoan':
                $email = filter_input(INPUT_POST, "edit_id");
                $name = filter_input(INPUT_POST, "username");
                $password = filter_input(INPUT_POST, "password");
                $vaitro = filter_input(INPUT_POST, "vaitro");
                $matkhauungdung = filter_input(INPUT_POST, 'matkhauungdung');
        
                if (empty($vaitro)){
                    $vaitro = 'Học viên';
                }
        
                if (!empty($name) && !empty($password)){
                    edit_account($email, $name, $password, $vaitro, $matkhauungdung);
                    echo "<script>alert('Sửa thành công!'); location.href='table.php?action=taikhoan';</script>";
                } else {
                    echo "<script>alert('Sửa thất bại!'); location.href='table.php?action=taikhoan';</script>";
                }
                break;
            case 'hocvien':
                $student_id = filter_input(INPUT_POST, "edit_id");
                $student_name = filter_input(INPUT_POST, "username");
                $gender = filter_input(INPUT_POST, 'gioitinh');
                $dob = filter_input(INPUT_POST, "ngaysinh");
                $hometown = filter_input(INPUT_POST, "quequan");
                $email = filter_input(INPUT_POST, 'email');
                $phone = filter_input(INPUT_POST, "sdt");
                
                if (!empty($student_name) && !empty($email)){
                    edit_student($student_id, $student_name, $gender, $dob, $hometown, $email, $phone);
                    echo "<script>alert('Sửa thành công!'); location.href='table.php?action=hocvien';</script>";
                } else {
                    echo "<script>alert('Sửa thất bại!'); location.href='table.php?action=hocvien';</script>";
                }
                break;
            case 'khoahoc':
                $course_id = filter_input(INPUT_POST, "edit_id");
                $course_name = filter_input(INPUT_POST, "tenkhoahoc");
                $course_author = filter_input(INPUT_POST, 'tacgia');
                $course_description = filter_input(INPUT_POST, "mota");
                $origin_price = filter_input(INPUT_POST, "giagoc");
                $current_price = filter_input(INPUT_POST, 'giahientai');
                $url = filter_input(INPUT_POST, "url");
                $image = filter_input(INPUT_POST, "hinhanh");
                
                if (!empty($course_name) && !empty($course_author) && !empty($course_description) && !empty($origin_price) && !empty($current_price) && !empty($url) && !empty($image)){
                    edit_course($course_id, $course_name, $course_author, $course_description, $origin_price, $current_price, $url, $image);
                    echo "<script>alert('Sửa thành công!'); location.href='table.php?action=khoahoc';</script>";
                } else {
                    echo "<script>alert('Sửa thất bại!'); location.href='table.php?action=khoahoc';</script>";
                }
                break;
            case 'danhgia':
                $rating_id = filter_input(INPUT_POST, "edit_id");
                $student_id = filter_input(INPUT_POST, "idhv");
                $course_id = filter_input(INPUT_POST, "idkh");
                $review_content = filter_input(INPUT_POST, "noidung");
                $star_rating = filter_input(INPUT_POST, 'saodanhgia');

                if (!empty($student_id) && !empty($course_id) && !empty($review_content) && !empty($star_rating)){
                    edit_rating($rating_id, $student_id, $course_id, $review_content, $star_rating);
                    echo "<script>alert('Sửa thành công!'); location.href='table.php?action=danhgia';</script>";
                } else {
                    echo "<script>alert('Sửa thất bại!'); location.href='table.php?action=danhgia';</script>";
                }
                break;
        }
    }else{
        echo "<script>location.href='index.php';</script>";
    }
?>