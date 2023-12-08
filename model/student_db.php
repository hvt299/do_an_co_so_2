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

    function add_student($student_id, $student_name, $gender, $dob, $hometown, $email, $phone) {
        global $db;
        $query = 'INSERT INTO hocvien
                     (IDHV, TenHV, GioiTinh, NgaySinh, QueQuan, Email, SDT)
                  VALUES
                     (:student_id, :student_name, :gender, :dob, :hometown, :email, :phone)';
        $statement = $db->prepare($query);
        $statement->bindValue(':student_id', $student_id);
        $statement->bindValue(':student_name', $student_name);
        $statement->bindValue(':gender', $gender);
        $statement->bindValue(':dob', $dob);
        $statement->bindValue(':hometown', $hometown);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->execute();
        $statement->closeCursor();
    }

    function edit_student($student_id, $student_name, $gender, $dob, $hometown, $email, $phone) {
        global $db;
        $query = 'UPDATE hocvien SET TenHV = :student_name, GioiTinh = :gender, NgaySinh = :dob, QueQuan = :hometown, Email = :email, SDT = :phone WHERE IDHV = :student_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':student_id', $student_id);
        $statement->bindValue(':student_name', $student_name);
        $statement->bindValue(':gender', $gender);
        $statement->bindValue(':dob', $dob);
        $statement->bindValue(':hometown', $hometown);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_student($student_id){
        global $db;
        $query = 'DELETE FROM hocvien WHERE IDHV = :student_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':student_id', $student_id);
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