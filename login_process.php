<?php
if (isset($_POST['login'])) {
    require("model/connect_db.php");
    require("model/identify_db.php");

    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    if (empty($email) || empty($password)) {
        echo "<script>alert('Đăng nhập thất bại!'); location.href='login.php';</script>";
        return;
    }

    $account = get_account_by_email_password($email, $password);
    if (empty($account)) {
        echo "<script>alert('Đăng nhập thất bại!'); location.href='login.php';</script>";
        return;
    }

    foreach ($account as $acc) {
        $_SESSION['username'] = $acc['Name'];
        $_SESSION['vaitro'] = $acc['VaiTro'];
        $_SESSION['matkhauungdung'] = $acc['MatKhauUngDung'];
        $_SESSION['idhv'] = $acc['IDHV'];
        setcookie("username", $_SESSION['username'], time() + 3600);
        setcookie("vaitro", $_SESSION['vaitro'], time() + 3600);
        setcookie("matkhauungdung", $_SESSION['matkhauungdung'], time() + 3600);
        setcookie("idhv", $_SESSION['idhv'], time() + 3600);

        if ($acc['VaiTro'] == "Quản lý") {
            echo "<script>alert('Đăng nhập thành công!'); location.href='admin/index.php';</script>";
            return;
        }

        if ($acc['VaiTro'] == "Học viên") {
            echo "<script>alert('Đăng nhập thành công!'); location.href='index.php';</script>";
            return;
        }
    }
}
?>