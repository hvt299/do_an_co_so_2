<?php
    $dsn = 'mysql:host=localhost;dbname=courseonline';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        // include('../errors/database_error.php');
        exit();
    }
?>