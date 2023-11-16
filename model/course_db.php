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
?>