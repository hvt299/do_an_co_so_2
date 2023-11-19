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
?>