<?php
    error_reporting(~E_NOTICE );
    session_start();
    if(!isset($_SESSION["username"])) {
        echo
            '<script>
                alert("Please login.");
                window.location.replace("login.php");
            </script>';
        // header("Location: ./login.php");
        exit();
    }
?>