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

    function add_account($email, $name, $password) {
        global $db;
        $query = 'INSERT INTO taikhoan
                     (Email, Name, Password)
                  VALUES
                     (:email, :name, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    }
?>