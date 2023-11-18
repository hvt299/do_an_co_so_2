<?php
    session_start();

    if (isset($_POST['login'])){
        require("model/connect_db.php");
        require("model/identify_db.php");

        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");

        if (!empty($email) && !empty($password)){
            $account = get_account_by_email_password($email, $password);
            if (empty($account)) {
                echo "<script>alert('Login Failed.'); location.href='login.php';</script>";
                // header("Location: login.php");
            } else {
                foreach($account as $acc){
                    if ($acc['VaiTro'] == "Quản lý") {
                        header("Location: admin.php");
                    } else {
                        $_SESSION['username'] = $acc['Name'];
                        $_SESSION['vaitro'] = $acc['VaiTro'];
                        setcookie("username", $_SESSION['username'], time() + 60);
                        setcookie("vaitro", $_SESSION['vaitro'], time() + 60);
                        header("Location: index.php");
                    }
                }
            }
        } else {
            echo "<script>alert('Login Failed.'); location.href='login.php';</script>";
            // header("Location: login.php");
        }
    }
?>