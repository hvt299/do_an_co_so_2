<?php
    function get_course() {
        global $db;
        $query = 'SELECT * FROM khoahoc';
        $statement = $db->prepare($query);
        $statement->execute();
        $course_list = $statement->fetchAll();
        $statement->closeCursor();
        return $course_list;
    }

    function get_course_by_id($course_id) {
        global $db;
        $query = 'SELECT * FROM khoahoc
                  WHERE IDKH = :idkh';
        $statement = $db->prepare($query);
        $statement->bindValue(':idkh', $course_id);
        $statement->execute();
        $course = $statement->fetchAll();
        $statement->closeCursor();
        return $course;
    }

    function add_course($course_id, $course_name, $course_author, $course_description, $origin_price, $current_price, $url, $image){
        global $db;
        $query = 'INSERT INTO khoahoc (IDKH, TenKH, TacGiaKH, MoTaKH, GiaGocKH, GiaHienTaiKH, URLKH, HinhAnhKH) VALUES (:course_id, :course_name, :course_author, :course_description, :origin_price, :current_price, :url, :image)';
        $statement = $db->prepare($query);
        $statement->bindValue(':course_id', $course_id);
        $statement->bindValue(':course_name', $course_name);
        $statement->bindValue(':course_author', $course_author);
        $statement->bindValue(':course_description', $course_description);
        $statement->bindValue(':origin_price', $origin_price);
        $statement->bindValue(':current_price', $current_price);
        $statement->bindValue(':url', $url);
        $statement->bindValue(':image', $image);
        $statement->execute();
        $statement->closeCursor();
    }

    function get_course_number(){
        global $db;
        $query = 'SELECT COUNT(*) AS SoLuongKhoaHoc FROM khoahoc';
        $statement = $db->prepare($query);
        $statement->execute();
        $course_number = $statement->fetchAll();
        $statement->closeCursor();
        return $course_number;
    }
?>