<?php
session_start();
require('model/connect_db.php');
require('model/course_db.php');

if (isset($_POST) && !empty($_POST)){
    if (isset($_POST['action'])){
        switch($_POST['action']){
            case 'add':
                if (isset($_POST['course_id'])){
                    $course = get_course_by_id($_POST['course_id']);
                    foreach($course as $c){
                        $course_id = $c['IDKH'];
                    }
                    if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])){
                        if (isset($_SESSION['cart_item'][$course_id])){
                            echo "<script>alert('Khóa học đã có trong giỏ hàng!'); location.href='cart.php';</script>";
                        }else{
                            $cart_item = array();
                            foreach($course as $c){
                                $cart_item['IDKH'] = $c['IDKH'];
                                $cart_item['TenKH'] = $c['TenKH'];
                                $cart_item['HinhAnhKH'] = $c['HinhAnhKH'];
                                $cart_item['GiaGocKH'] = $c['GiaGocKH'];
                                $cart_item['GiaHienTaiKH'] = $c['GiaHienTaiKH'];
                                $_SESSION['cart_item'][$course_id] = $cart_item;
                                header("Location: cart.php");
                            }
                        }
                    }else{
                        $_SESSION['cart_item'] = array();
                        $cart_item = array();
                        foreach($course as $c){
                            $cart_item['IDKH'] = $c['IDKH'];
                            $cart_item['TenKH'] = $c['TenKH'];
                            $cart_item['HinhAnhKH'] = $c['HinhAnhKH'];
                            $cart_item['GiaGocKH'] = $c['GiaGocKH'];
                            $cart_item['GiaHienTaiKH'] = $c['GiaHienTaiKH'];
                            $_SESSION['cart_item'][$course_id] = $cart_item;
                            header("Location: cart.php");
                        }
                    }
                }
                break;
            case 'delete':
                if (isset($_POST['course_id'])) {
                    $course_id = $_POST['course_id'];
                    if (isset($_SESSION['cart_item'][$course_id])) {
                        unset($_SESSION['cart_item'][$course_id]);
                    }
                    header("Location: cart.php");
                }
                break;
        }
    }
}