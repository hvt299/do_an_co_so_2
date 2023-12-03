<?php
    if (isset($_POST['add_btn']) && isset($_POST['action'])){
        require("../model/connect_db.php");
        require("../model/identify_db.php");
        require("../model/student_db.php");

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
                    if ($vaitro == "Học viên") add_student($name, $email);
                    echo "<script>alert('Thêm thành công!'); location.href='table.php?action=taikhoan';</script>";
                } else {
                    echo "<script>alert('Thêm thất bại!'); location.href='table.php?action=taikhoan';</script>";
                }
                break;
            case 'hocvien':
                echo "<script>location.href='table.php?action=hocvien';</script>";
                break;
            case 'khoahoc':
                echo "<script>location.href='table.php?action=khoahoc';</script>";
                break;
            case 'danhgia';
                echo "<script>location.href='table.php?action=danhgia';</script>";
                break;
        }
    }else{
        echo "<script>location.href='index.php';</script>";
    }
?>