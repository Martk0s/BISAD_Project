<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="./css/style.css"/>
</head>
<?php
    include("./php/connect.php");
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["user_account_id"])){
        header("location: index.php");
        exit;
    }
    
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
        
        $address = stripslashes($_REQUEST['address0']);
        $address = mysqli_real_escape_string($conn, $address);

        if(trim($username) && trim($password) && trim($email) && trim($first_name) && trim($last_name) && trim($telephone) && trim($address) == TRUE) {
            
            $check_sql="SELECT * FROM user_account WHERE username= '".$username."' ";
            $check_username= $conn->query($check_sql) or die($conn->error);

            if(!$check_username->num_rows){
                $hash_password= password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT into `user_account` (username, password, first_name, last_name, email, telephone, address)
                        VALUES ('$username', '" . md5($password) . "', '$first_name', '$last_name', '$email', '$telephone', '$address')";
                $res=mysqli_query($conn,$sql);
                
                $query = "SELECT `user_account_id` FROM `user_account` WHERE username='$username'";
                $result = mysqli_query($conn, $query) or die(mysqli_error());
                while($row = mysqli_fetch_array($result)) {
                    $account_id = $row["user_account_id"];
                }
                
                $sql = "INSERT INTO `cus_order` (account_id) VALUES ($account_id)";
                $res=mysqli_query($conn,$sql);
                echo "<script> alert('Register Success');</script>";
                header("location: login.php");
            }else{
                    echo "<script> alert('This username is unavailable! Please try again.');</script>";
                    header("Refresh:0");
                }   
        }
    }
?>
<body>
    <?php include("php/navbar.php");?>
    <form class="form" action="" id="Form" method="post">
        <div class="form-group">
            <h1 class="login-title">Registration</h1>
            <input type="text" class="form-control" name="username" id="username" onblur="check_username()" placeholder="Username" required />
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" onblur="check_password()" placeholder="Password" required/>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="email" id="email" onblur="check_email()" placeholder="Email Adress" required/>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="first_name" id="first_name" onblur="check_first_name()" placeholder="First Name" required/>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="last_name" id="last_name" onblur="check_last_name()" placeholder="Last Name" required/>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="telephone" id="telephone" onblur="check_Tele()" placeholder="Telephone number" required/>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="address0" id="address0" onblur="check_address0()" placeholder="Address" required/>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" value="submit" class="btn btn btn-primary btn-block">Create Account</button>
        </div>
            <p class="link">Already have an account?<br><a href="login.php">Login</a></p>
    </form>
</body>
<script>
    function check_username() {
        var elem = document.getElementById('username').value;
        if (elem.length != 0) {
            if (elem.match(/^[0-9]+$/i)) {
                alert("Only A-Z, a-z letters and numeric can be entered.")
                document.getElementById('username').value = "";
            }
            
            if (elem.length < 4 || elem.length > 20) {
                alert("The length must be between 4-32 characters.")
                document.getElementById('username').value = "";
            }
        }
    }
    
    function check_password() {
        var elem = document.getElementById('password').value;
        if (elem.length != 0) {
            if (elem.length < 4 || elem.length > 20) {
                alert("The length must be between 4-32 characters.")
                document.getElementById('password').value = "";
            }
        }
    }
    
    function check_email() {
        var elem = document.getElementById('email').value;
        if (elem.length != 0){
            if (elem.length > 200) {
                alert("200 character maximum.")
                document.getElementById('email').value = "";
            }
        }
    }

    function check_address0() {
        var elem = document.getElementById('address0').value;
        if (elem.length != 0) {
            if (elem.length > 200) {
                alert("200 character maximum.")
                document.getElementById('address0').value = "";
            }
        }
    }
    
    function check_first_name() {
        var elem = document.getElementById('first_name').value;
        if (elem.length != 0) {
            if (elem.length > 200) {
                alert("200 character maximum.")
                document.getElementById('first_name').value = "";
            }
        }
    }
    
    function check_last_name() {
        var elem = document.getElementById('last_name').value;
        if (elem.length != 0) {
            if (elem.length > 200) {
                alert("200 character maximum.")
                document.getElementById('last_name').value = "";
            }
        }
    }

    function check_Tele() {
        var elem = document.getElementById('telephone').value;
        if (elem.length != 0) {
            if (!elem.match(/^[0-9]+$/i)) {
                alert("Numeric only.")
                document.getElementById('telephone').value = "";
            }else{
                if (elem.length < 9 || elem.length > 10) {
                    alert("Invalid phone number.")
                    document.getElementById('telephone').value = "";
                }
            }
        }
    }
</script>
</html>