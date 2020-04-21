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
        <p><?php var_dump($_SESSION)?></p>
        <p>User : <?php echo $_SESSION['username']; ?></p>
        <p>First Name : <?php echo $_SESSION['first_name']; ?></p>
        <p>Last Name : <?php echo $_SESSION['last_name']; ?></p>
        <p>email : <?php echo $_SESSION['email']; ?></p>
        <?php
        $username = $_SESSION['username'];
        $query = "SELECT * FROM `user_account` WHERE username='$username'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
              echo "<p>" .$row["username"];
              echo "<p>" .$row["password"];
              echo "<p>" .$row["first_name"];
              echo "<p>" .$row["last_name"];
              echo "<p>" .$row["telephone"];
            echo "</tr>";
            }
        ?>
        <p>You are now user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>

        <?php
            $query = "SELECT * FROM `product`";
            $result = mysqli_query($conn, $query) or die(mysql_error());
            while($row = mysqli_fetch_array($result)) {
                echo "<p>product_name : " .$row["product_name"];
                echo "<p>product_type : " .$row["product_type"];
                echo "<p>gender : " .$row["gender"];
                echo "<p>price : " .$row["price"];
                echo "<p>color : " .$row["color"];
                echo "<p>size_uk : " .$row["size_uk"];
                echo "<p>product_image : " .$row["product_image"];
                echo "<p>brand_id : " .$row["brand_id"];
                echo "<br><br><br><br><br><br>";
            }
        ?>
    </div>
</body>
</html>