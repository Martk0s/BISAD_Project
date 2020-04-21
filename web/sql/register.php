<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="./css/style.css"/>
</head>
<script src="./js/checkdata.js" type="text/javascript"></script>
<?php
    include("./php/connect.php");
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);

        $password    = stripslashes($_REQUEST['password']);
        $password    = mysqli_real_escape_string($conn, $password);
        
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);

        $first_name    = stripslashes($_REQUEST['first_name']);
        $first_name    = mysqli_real_escape_string($conn, $first_name);

        $last_name    = stripslashes($_REQUEST['last_name']);
        $last_name    = mysqli_real_escape_string($conn, $last_name);

        $telephone    = stripslashes($_REQUEST['telephone']);
        $telephone    = mysqli_real_escape_string($conn, $telephone);
        
        $address = stripslashes($_REQUEST['address']);
        $address = mysqli_real_escape_string($conn, $address);

        if(trim($username) && trim($password) && trim($email) && trim($first_name) && trim($last_name) && trim($telephone) && trim($address) == TRUE) {
            
            $create_datetime = date("Y-m-d H:i:s");

            $check_sql="SELECT * FROM user_account WHERE username= '".$username."' ";
            $check_username= $conn->query($check_sql) or die($conn->error);

            if(!$check_username->num_rows){
                $hash_password= password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT into `user_account` (username, password, first_name, last_name, email, telephone, address)
                        VALUES ('$username', '" . md5($password) . "', '$first_name', '$last_name', '$email', '$telephone', '$address')";
                $res=mysqli_query($conn,$sql);
                    echo "<script> alert('Register Success');</script>";
                    header("location: login.php");
            }else{
                    echo "<script> alert('ชื่อผู้ใช้นี้ ถูกใช้ไปแล้ว! โปรดกรอกข้อมูลใหม่อีกครั้ง');</script>";
                    header("Refresh:0");
                }   
        }
    }
?>
<body>
    <form class="form" action="" id="Form" method="post" onsubmit="return checkdata()">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="password" class="login-input" name="password" placeholder="Password" required/>
        <input type="text" class="login-input" name="email" placeholder="Email Adress" required/>
        <input type="text" class="login-input" name="first_name" placeholder="First Name" required/>
        <input type="text" class="login-input" name="last_name" placeholder="Last Name" required/>
        <input type="text" class="login-input" name="telephone" placeholder="Telephone number" required/>
        <input type="text" class="login-input" name="address" placeholder="Address" required/>
        <input type="submit" name="submit" value="submit" class="login-button">
        <p class="link">Already have an account?<br><br><a href="login.php">Login</a></p>
    </form>
</body>
</html>