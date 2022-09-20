<?php
    include 'header.php';

    if(isset($_SESSION['loggedin'])){
        session_unset();
        unset($_SESSION["loggedin"]);
        $_SESSION = array();

        //header('Location: ' . $_SERVER['HTTP_REFERER'] . '?clear=1');
        header('Location: ' . $_SERVER['HTTP_REFERER'] );
    } 
?>