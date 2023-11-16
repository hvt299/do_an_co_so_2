<?php
    function get_account_by_email_password($email, $password) {
        global $db;
        $query = 'SELECT * FROM taikhoan
                  WHERE Email = :email AND Password = :password';
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":password", $password);
        $statement->execute();
        $account = $statement->fetchAll();
        $statement->closeCursor();
        return $account;
    }
?>