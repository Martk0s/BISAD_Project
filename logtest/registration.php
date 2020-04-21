<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<script src="checkdata.js" type="text/javascript"></script>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);

        $password    = stripslashes($_REQUEST['password']);
        $password    = mysqli_real_escape_string($con, $password);
        
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);

        $fname    = stripslashes($_REQUEST['fname']);
        $fname    = mysqli_real_escape_string($con, $fname);

        $lname    = stripslashes($_REQUEST['lname']);
        $lname    = mysqli_real_escape_string($con, $lname);

        $tel    = stripslashes($_REQUEST['tel']);
        $tel    = mysqli_real_escape_string($con, $tel);
        
        $address = stripslashes($_REQUEST['address']);
        $address = mysqli_real_escape_string($con, $address);
        
        $create_datetime = date("Y-m-d H:i:s");

        $check_sql="SELECT * FROM users WHERE username= '".$username."' ";
        $check_username= $con->query($check_sql) or die($con->error);

        if(!$check_username->num_rows){
            $hash_password= password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT into `users` (fname, lname, tel, address, username, password, email, create_datetime)
                    VALUES ('$fname', '$lname', '$tel', '$address', '$username', '" . md5($password) . "', '$email', '$create_datetime')";
            $res=mysqli_query($con,$sql);
                echo "<script> alert('Register Success');</script>";
                header("location: login.php");
        }else{
                echo "<script> alert('ชื่อผู้ใช้นี้ ถูกใช้ไปแล้ว! โปรดกรอกข้อมูลใหม่อีกครั้ง');</script>";
                header("Refresh:0");
        }        
    } else {
?>
    <form class="form" action="" id="Form" method="post" onsubmit="return checkData()">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="text" class="login-input" name="fname" placeholder="First Name">
        <input type="text" class="login-input" name="lname" placeholder="Last Name">
        <input type="text" class="login-input" name="tel" placeholder="Telephone number">
        <input type="text" class="login-input" name="address" placeholder="Address">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>