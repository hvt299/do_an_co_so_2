<?php
    require("model/connect_db.php");
    require("model/identify_db.php");

    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");

    if (!empty($email) && !empty($password)){
        $account = get_account_by_email_password($email, $password);
        if (empty($account)) {
            header("Location: login.php");
        } else if ($account['VaiTro'] == "Quản lý") {
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }
    } else {
        header("Location: login.php");
    }
?>