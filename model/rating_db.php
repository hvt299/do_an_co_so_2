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
        $query = 'SELECT hocvien.TenHV, khoahoc.IDKH, khoahoc.TenKH, NoiDungDG, SaoDG
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
?>