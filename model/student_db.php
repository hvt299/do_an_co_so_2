<?php
    function get_student() {
        global $db;
        $query = 'SELECT * FROM hocvien';
        $statement = $db->prepare($query);
        $statement->execute();
        $student_list = $statement->fetchAll();
        $statement->closeCursor();
        return $student_list;
    }

    function add_student($name, $email) {
        global $db;
        $query = 'INSERT INTO hocvien
                     (TenHV, Email)
                  VALUES
                     (:name, :email)';
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $statement->closeCursor();
    }

    function get_student_number(){
        global $db;
        $query = 'SELECT COUNT(*) AS SoLuongHocVien FROM hocvien';
        $statement = $db->prepare($query);
        $statement->execute();
        $student_number = $statement->fetchAll();
        $statement->closeCursor();
        return $student_number;
    }
?>