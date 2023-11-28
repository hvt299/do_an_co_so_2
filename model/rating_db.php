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

    function add_rating($idhv, $course_id, $review_content, $star_rating){
        global $db;
        $query = 'INSERT INTO danhgia (IDHV, IDKH, NoiDungDG, SaoDG) VALUES (:idhv, :course_id, :review_content, :star_rating)';
        $statement = $db->prepare($query);
        $statement->bindValue(':idhv', $idhv);
        $statement->bindValue(':course_id', $course_id);
        $statement->bindValue(':review_content', $review_content);
        $statement->bindValue(':star_rating', $star_rating);
        $statement->execute();
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