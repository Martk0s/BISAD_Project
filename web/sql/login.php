<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css"/>
</head>
<body>
<?php
    error_reporting(~E_NOTICE );
    include("./php/connect.php");
    include("./php/navbar.php");
    session_start();

    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["user_account_id"])){
        header("location: index.php");
        exit;
    }

    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `user_account` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $row = mysqli_num_rows($result);
        if ($row == 1) {
            $_SESSION['username'] = $username;
            // // Redirect to user dashboard page

            while($row = mysqli_fetch_array($result)) {
                $_SESSION["user_account_id"] = $row["user_account_id"];// get user id
                $_SESSION["first_name"] = $row["first_name"];// get first name
                $_SESSION["last_name"] = $row["last_name"];// get last name
                $_SESSION["address"] = $row["address"];// get address
                $_SESSION["telephone"] = $row["telephone"];// get tel. no.
                $_SESSION["email"] = $row["email"];// get email
                $_SESSION["account_type"] = $row["account_type"];// get account type
                }
            $user_account_id = $_SESSION["user_account_id"];
            $query = "SELECT * FROM `cus_order` WHERE account_id=" . $user_account_id . " AND `order_status`='pending'";
            // var_dump($query);
            $result = mysqli_query($conn, $query) or die(mysqli_error());
            while($roww = mysqli_fetch_array($result)) {
                $_SESSION["order_id"] = $roww["order_id"];// get currenty order id
            }
            $quantity = "SELECT count(`order_id`) FROM `cus_order_product` WHERE `order_id`= ". $_SESSION["order_id"];
            var_dump($quantity);
            $resultt = mysqli_query($conn, $quantity) or die(mysqli_error());
            while($row = mysqli_fetch_array($resultt)) {
                foreach ($row as $total){
                    $_SESSION['total_quantity'] = $total;// get total item(s) in cart
                }
            }
            if ($_SESSION["account_type"] == "staff") {
                header("Location: check_cus_order_(for_staff).php");
            }else{
                header("Location: index.php");
            }
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username <br>or<br> Password.</h3><br/>
                  <p class='link'><a href='login.php'>Try again.</a></p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <div class="form-group">
            <h1 class="login-title">Login</h1>
            <input type="text" class="form-control" name="username" placeholder="Username" autofocus="true"/>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password"/>
        </div>
        <div class="form-group">
            <button type="submit" id="login" class="btn btn btn-primary btn-block" name="submit">Login</button>
        </div>
        <p class="link">Don't have an account?<br><a href="register.php">Create new one</a></p>
  </form>
<?php
    }
?>
</body>
</html>