<?php
    if (isset($_POST['login'])){
        require("model/connect_db.php");
        require("model/identify_db.php");

        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");

        if (!empty($email) && !empty($password)){
            $account = get_account_by_email_password($email, $password);
            if (empty($account)) {
                $account = get_account_by_email_password_2($email, $password);
                if (empty($account)) {
                    echo "<script>alert('Đăng nhập thất bại!'); location.href='login.php';</script>";
                    // header("Location: login.php");
                } else {
                    foreach($account as $acc){
                        if ($acc['VaiTro'] == "Quản lý") {                        
                            $_SESSION['username'] = $acc['Name'];
                            $_SESSION['vaitro'] = $acc['VaiTro'];
                            $_SESSION['matkhauungdung'] = $acc['MatKhauUngDung'];
                            setcookie("username", $_SESSION['username'], time() + 3600);
                            setcookie("vaitro", $_SESSION['vaitro'], time() + 3600);
                            setcookie("matkhauungdung", $_SESSION['matkhauungdung'], time() + 3600);
                            echo "<script>alert('Đăng nhập thành công!'); location.href='admin/index.php'; </script>";                        
                        }
                    }
                }
            } else {
                foreach($account as $acc){
                    if ($acc['VaiTro'] == "Học viên") {
                        $_SESSION['idhv'] = $acc['IDHV']; // Đổi tên trường này
                        $_SESSION['username'] = $acc['Name'];
                        $_SESSION['vaitro'] = $acc['VaiTro'];
                        $_SESSION['matkhauungdung'] = $acc['MatKhauUngDung'];
                        setcookie("idhv", $_SESSION['idhv'], time() + 3600); // Đổi tên trường này
                        setcookie("username", $_SESSION['username'], time() + 3600);
                        setcookie("vaitro", $_SESSION['vaitro'], time() + 3600);
                        setcookie("matkhauungdung", $_SESSION['matkhauungdung'], time() + 3600);
                        echo "<script>alert('Đăng nhập thành công!'); location.href='index.php'; </script>";                        
                        // header("Location: index.php");
                    }
                }
            }
        } else {
            echo "<script>alert('Đăng nhập thất bại!'); location.href='login.php';</script>";
            // header("Location: login.php");
        }
    }
?>