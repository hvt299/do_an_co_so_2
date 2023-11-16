<?php
    function get_menu() {
        global $db;
        $query = 'SELECT * FROM menu';
        $statement = $db->prepare($query);
        $statement->execute();
        $menu_list = $statement->fetchAll();
        $statement->closeCursor();
        return $menu_list;
    }
?>