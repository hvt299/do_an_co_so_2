<?php
    function get_rating() {
        global $db;
        $query = 'SELECT hocvien.TenHV, khoahoc.TenKH, NoiDungDG, SaoDG
                  FROM hocvien, khoahoc, danhgia
                  WHERE hocvien.IDHV = danhgia.IDHV AND khoahoc.IDKH = danhgia.IDKH
                  LIMIT 0, 10;';
        $statement = $db->prepare($query);
        $statement->execute();
        $rating_list = $statement->fetchAll();
        $statement->closeCursor();
        return $rating_list;
    }

    function get_rating_2() {
        global $db;
        $query = 'SELECT * FROM danhgia';
        $statement = $db->prepare($query);
        $statement->execute();
        $rating_list = $statement->fetchAll();
        $statement->closeCursor();
        return $rating_list;
    }

    function get_rating_by_course_id($course_id) {
        global $db;
        // them hocvien.ID
        $query = 'SELECT hocvien.TenHV, khoahoc.IDKH, khoahoc.TenKH, NoiDungDG, SaoDG, hocvien.IDHV
                  FROM hocvien, khoahoc, danhgia
                  WHERE hocvien.IDHV = danhgia.IDHV AND khoahoc.IDKH = danhgia.IDKH AND danhgia.IDKH = :idkh
                  LIMIT 0, 10;';
        $statement = $db->prepare($query);
        $statement->bindValue(':idkh', $course_id);
        $statement->execute();
        $ratings = $statement->fetchAll();
        $statement->closeCursor();
        return $ratings;
    }

    function add_rating($rating_id, $student_id, $course_id, $review_content, $star_rating){
        global $db;
        $query = 'INSERT INTO danhgia (IDDG, IDHV, IDKH, NoiDungDG, SaoDG) VALUES (:rating_id, :student_id, :course_id, :review_content, :star_rating)';
        $statement = $db->prepare($query);
        $statement->bindValue(':rating_id', $rating_id);
        $statement->bindValue(':student_id', $student_id);
        $statement->bindValue(':course_id', $course_id);
        $statement->bindValue(':review_content', $review_content);
        $statement->bindValue(':star_rating', $star_rating);
        $statement->execute();
        $statement->closeCursor();
    }
    // 2 them 2 ham
    function get_idrating_by_student_course($student_id, $course_id) {
        global $db; 
        $query = 'SELECT IDDG FROM danhgia WHERE IDHV = :student_id AND IDKH = :course_id';
        $statement = $db->prepare($query);
        $statement->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $statement->bindParam(':course_id', $course_id, PDO::PARAM_INT);
        $statement->execute();
        $idrating = $statement->fetchColumn();
        $statement->closeCursor();
        return $idrating;
    }
    
    function update_rating($rating_id, $review_content, $star_rating) {
        global $db;
        $query = 'UPDATE danhgia
                  SET NoiDungDG = :review_content, SaoDG = :star_rating
                  WHERE IDDG = :rating_id';
        $statement = $db->prepare($query);
        $statement->bindParam(':rating_id', $rating_id, PDO::PARAM_INT);
        $statement->bindParam(':review_content', $review_content);
        $statement->bindParam(':star_rating', $star_rating, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();
    }
    function get_avg_star_rating_by_course_id($course_id) {
        global $db;
        $query = 'SELECT AVG(danhgia.SaoDG) AS avg_star_rating
                  FROM danhgia
                  WHERE IDKH = :idkh
                  GROUP BY danhgia.IDKH;';
        $statement = $db->prepare($query);
        $statement->bindValue(':idkh', $course_id);
        $statement->execute();
        $avg_star_rating = $statement->fetchAll();
        $statement->closeCursor();
        return $avg_star_rating;       
    }

    function get_rating_number(){
        global $db;
        $query = 'SELECT COUNT(*) AS SoLuongDanhGia FROM danhgia';
        $statement = $db->prepare($query);
        $statement->execute();
        $rating_number = $statement->fetchAll();
        $statement->closeCursor();
        return $rating_number;
    }

    function get_avg_star_rating(){
        global $db;
        $query = 'SELECT AVG(SaoDG) AS TiLeDanhGia
                  FROM danhgia';
        $statement = $db->prepare($query);
        $statement->execute();
        $avg_star_rating = $statement->fetchAll();
        $statement->closeCursor();
        return $avg_star_rating;
    }
?>