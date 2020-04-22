<?php
    error_reporting(~E_NOTICE );
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: ./login.php");
        exit();
    }
?>