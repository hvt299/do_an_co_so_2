<?php
    session_start();
    session_destroy();
    setcookie('username','', time() -1);
    setcookie('vaitro','', time() -1);
    setcookie('matkhauungdung','', time() -1);
    setcookie('idhv','', time() -1);
    echo "<script>location.href='index.php';</script>";
?>