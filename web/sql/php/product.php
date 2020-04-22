<?php
    // include("php/connect.php");
    $query = "SELECT * FROM `product`";
    $result = mysqli_query($conn, $query) or die(mysqli_error());
    while($row = mysqli_fetch_array($result)) {
        echo "<div class='container py-3'>";
        echo "<div class='card'>";
        echo "<div class='row'>";
        echo "<div class='col-md-4'>";
        echo "<img src='" . $row['product_image'] . "' class='shoes-image'>";
        
        echo "</div>";
        echo "<div class='col-md-8 px-3 py-3'>";
        echo "<div class='card-block px-3'>";
        $brand_id = $row["brand_id"];
        $query = "SELECT * FROM `brand` WHERE brand_id='$brand_id'";
        $brand_id = mysqli_query($conn, $query) or die(mysqli_error());
        while($brand_name = mysqli_fetch_array($brand_id)) {
            echo "<h2 class='card-title'>" . $brand_name["brand_name"] . "</h2>";//brand name
        }
        echo "<p class='card-text'> <b>Model</b><br>&ensp;&ensp;" .$row["product_name"] . "</p>";//name
        echo "<p class='card-text'> <b>Type</b><br>&ensp;&ensp;" .$row["product_type"] . "</p>";//type
        echo "<hr>";
        echo "<p class='card-text'> <b>Gender</b><br>&ensp;&ensp;" .$row["gender"] . "</p>";//gender
        echo "<p class='card-text'>";

        $size_list = explode(",", $row["size_uk"]);
        echo "<b>Size (UK) &ensp;</b>";//size (UK)
        foreach ($size_list as $UK) {
            echo $UK . "&ensp;&ensp;";
        }
        echo "<br>";
        echo "</p>";

        echo "<div class='container'>";
        echo "<div class='row'>";
        echo "<p class='card-text'><b>Color&ensp;</b></p>";
        echo "<div class='color-box " . $row["color"] . "'></div>";//color box
        echo "<p class='card-text'>" . $row["color"] . "</p>";//color text
        echo "</div>";
        echo "</div>";
        echo "<h4 style='color: #00a2e2;'>$ " . $row["price"] . "</h4>";//price ($)
        echo "<div>";
        echo '<form action="update.php" method="POST">
        <input type="hidden" name="_id" value="' . $row["product_id"] . '">
        <button type="input" class="btn btn-success update-btn"><i class="fas fa-cart-plus"></i> Add to cart</button>
        </form>';
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
?>