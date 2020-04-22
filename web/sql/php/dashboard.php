<?php
//include auth_session.php file on all user panel pages
include("connect.php");
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
        <p>You're logged in as : <?php echo $_SESSION['first_name']; ?> <br></p>
        <?php
        // $username = $_SESSION['username'];
        // $query = "SELECT * FROM `user_account` WHERE username='$username'";
        // $result = mysqli_query($conn, $query) or die(mysql_error());
        // while($row = mysqli_fetch_array($result)) {
        //     echo "<tr>";
        //       echo "<p>" .$row["username"];
        //       echo "<p>" .$row["password"];
        //       echo "<p>" .$row["first_name"];
        //       echo "<p>" .$row["last_name"];
        //       echo "<p>" .$row["telephone"];
        //     echo "</tr>";
        //     }
        echo "<p>" . $_SESSION["user_account_id"];
        echo "<p>" . $_SESSION["first_name"];
        echo "<p>" . $_SESSION["last_name"];
        echo "<p>" . $_SESSION["address"];
        echo "<p>" . $_SESSION["telephone"];
        ?>
        <p>You are now user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>