<?php
//include auth_session.php file on all user panel pages
require('db.php');
include("auth_session.php");

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>User : <?php echo $_SESSION['username']; ?>!</p>
        <p>First Name : <?php echo $_SESSION['fname']; ?>!</p>
        <p>Last Name : <?php echo $_SESSION['lname']; ?>!</p>
        <p>email : <?php echo $_SESSION['email']; ?>!</p>
        <p>You are now user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
        <p class="link"><a href="ChangePass.php">Change Password</a></p>
    </div>
</body>
</html>