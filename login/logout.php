<?php
    session_start();
    unset($_SESSION['S_usuario']);
    session_destroy();
    header("Location:../index.php");
?>