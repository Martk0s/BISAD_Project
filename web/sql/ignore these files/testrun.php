<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require("php/connect.php");
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
        }
?>
</body>
</html>
