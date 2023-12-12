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

    function get_student_by_id($current_student_id) {
        global $db;
    
        try {
            $query = 'SELECT * FROM hocvien WHERE idhv = :current_student_id';
            $statement = $db->prepare($query);
            $statement->bindParam(':current_student_id', $current_student_id, PDO::PARAM_INT);
            $statement->execute();
            $student = $statement->fetch(PDO::FETCH_ASSOC);
            $statement->closeCursor();
            return $student;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return;
        }
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
        $result = $statement->execute();
        $statement->closeCursor();
        // if false throw error
        if(!$result) throw new ErrorException("Can not insert data");
        return $result;
    }

    function edit_student($student_id, $student_name, $gender, $dob, $hometown, $email, $phone) {
        global $db;
        try{
            $query = 'UPDATE hocvien SET TenHV = :student_name, GioiTinh = :gender, NgaySinh = :dob, QueQuan = :hometown, Email = :email, SDT = :phone WHERE IDHV = :student_id';
            $statement = $db->prepare($query);
            $statement->bindValue(':student_id', $student_id, PDO::PARAM_STR);
            $statement->bindValue(':student_name', $student_name, PDO::PARAM_INT);
            $statement->bindValue(':gender', $gender, PDO::PARAM_STR);
            $statement->bindValue(':dob', $dob, PDO::PARAM_STR);
            $statement->bindValue(':hometown', $hometown, PDO::PARAM_STR);
            $statement->bindValue(':email', $email, PDO::PARAM_STR);
            $statement->bindValue(':phone', $phone, PDO::PARAM_STR);
            $result = $statement->execute();
            $statement->closeCursor();
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            return;
        }
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

    function has_number($current_student_id, $course_id) {
        global $db;
    
        $query = 'SELECT COUNT(*) AS SoLuongDanhGia FROM danhgia WHERE idhv = :current_student_id and IDKH = :course_id';
        $statement = $db->prepare($query);
        $statement->bindParam(':current_student_id', $current_student_id, PDO::PARAM_INT);
        $statement->bindParam(':course_id', $course_id, PDO::PARAM_INT);
        $statement->execute();
        $number_comment = $statement->fetchColumn();  
        return $number_comment == 0;
    }
?>