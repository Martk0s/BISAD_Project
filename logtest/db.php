<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $con = mysqli_connect("localhost:3307","root","","LoginSystem");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $mysqli = new mysqli("localhost:3307","root","","LoginSystem");

    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }
?>