<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/color.css">
    <link rel="stylesheet" href="./css/ScrollToTop.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9cdefafb29.js" crossorigin="anonymous"></script>
    <title>Shoes Shoes 🚂</title>
</head>
<style>
    /* Head container */
    .container-classa {
    background-image: url('./img/head.jpg');
    background-repeat: no-repeat;
    background-position: top;
    width: 48%;
    height: 300px;
    border: 2px dashed #333;
    border-radius: 25px;
    position: relative;
    top: 80px;
    margin: 0 auto;
    }
    .page-header {
        font-size: 80px;
        color:white;
        text-align: center;
    }
    .container-border{
        position: relative;
        margin: 0 auto;
        border: 2px dashed #333;
        border-radius: 25px;
    }
    .shoes-image {
        width: 100%;
    }
    
    .id-no {
        position: absolute;
        right: 30;
    }

    .card-text {
        color: rgb(100, 100, 100);
    }
    .update-btn {
        position: absolute;
        /* right: 125; */
        right: 25;
    }
    .delete-btn {
        position: absolute;
        right: 25;
    }
</style>
<body>
    
    <?php
        include("php/connect.php");
        include("php/navbar.php");
        // var_dump($_SESSION); // Debug
    ?>

    <!-- Scroll To Top Button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>
    <!-- END of Scroll To Top Button -->

    <div class = "container-classa">
        <h4 class="head page-header"><br>SHOES &ensp;SHOES</h4>
    </div>
    <br><br><br><br><br><br>
    <!-- filter container -->
    <div class="container container-border">
        <form action="" method="POST" class="form-group">
            <div class="row" style="margin-left: 100; margin-right: 100;">
                <!-- brand -->
                <div class="col-md-auto" style="margin: auto;">
                    <br><br>
                    <label for="brand">Brand&ensp;:&ensp; </label>
                    <select name='brand' id='brand' class="form-control" style="width: 180px; display: inline;">
                        <option value="" >-- Show All --</option>
                        <?php
                            $query = "SELECT * FROM `brand`";
                            $result = mysqli_query($conn, $query) or die(mysqli_error());
                            while($row = mysqli_fetch_array($result)) {
                                echo '<option value="' . $row["brand_id"] . '">' . $row["brand_name"] . '</option>';
                                
                            }
                        ?>
                    </select>
                </div>
                <!-- end of brand -->

                <!-- product type -->
                <div class="col-md-auto" style="margin: auto;">
                    <br><br>
                    <label for="type">Type&ensp;:&ensp; </label>
                    <select name='type' id='type' class="form-control" style="width: 180px; display: inline;">
                        <option value="">-- Show All --</option>
                        <?php
                            $query = "SELECT * FROM `product`";
                            $result = mysqli_query($conn, $query) or die(mysqli_error());
                            $check_dup = [];
                            while($row = mysqli_fetch_array($result)) {
                                array_push($check_dup, $row["product_type"]);
                            }
                            $check_dup = array_unique($check_dup);
                            $check_dup = array_values($check_dup);
                            sort($check_dup);
                            for($i = 0; $i != count($check_dup); $i++){
                                echo '<option value="' . $check_dup[$i] . '">' . $check_dup[$i] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <!--end of product type -->

                <!-- color -->
                <div class="col-md-auto" style="margin: auto;">
                    <br><br>
                    <label for="color">Color&ensp;:&ensp; </label>
                    <select name='color' id='color' class="form-control" style="width: 180px; display: inline;">
                        <option value="">-- Show All --</option>
                        <?php
                            $query = "SELECT * FROM `product`";
                            $result = mysqli_query($conn, $query) or die(mysqli_error());
                            $check_dup = [];
                            while($row = mysqli_fetch_array($result)) {
                                array_push($check_dup, $row["color"]);
                            }
                            $check_dup = array_unique($check_dup);
                            $check_dup = array_values($check_dup);
                            sort($check_dup);
                            for($i = 0; $i != count($check_dup); $i++){
                                echo '<option value="' . $check_dup[$i] . '">' . $check_dup[$i] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <!-- end of color -->
            </div>
                
            <div class="row" style="margin-top: auto; margin-bottom: auto;">
                &ensp;&ensp;
                <div class="col-md-auto" style="margin: 0 auto;">
                    <br><br>
                    <!-- GENDER -->
                    <label for="Gender">Gender&ensp;:&ensp; </label>
                    <!-- MALE -->
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="Male" id="Male" name="Male" value="Male">
                        <label class="custom-control-label" for="Male">Male</label>
                    </div>

                    <!-- FEMALE -->
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="Female" name="Female" value="Female">
                        <label class="custom-control-label" for="Female">Female</label>
                    </div>
                    <!-- END GENDER -->
                </div>
            </div>
            <!-- BUTTON -->
            <br>
            <div class="row" style="margin-left: 100; margin-right: 100;">
                <button type="input" id="filter" class="btn btn-secondary btn-block" name="filter"><i class="fas fa-filter"></i> Filter</i></button>
            <!-- END BUTTON -->
            </div>
        </form>
    </div>
    
    <?php
    error_reporting(~E_NOTICE );
        $filter = "";
        // if(isset($_POST['filter'])) {
        if($_POST['brand'] != ""){
            $filter = $filter . "brand_id=" . $_POST['brand'];
        }

        if($_POST['type'] != ""){
            if(strlen($filter)){
                $filter = $filter . " AND ";
            }
            $filter = $filter . "product_type='" . $_POST['type'] . "'";
        }

        if($_POST['color'] != ""){
            if(strlen($filter)){
                $filter = $filter . " AND ";
            }
            $filter = $filter . "color='" . $_POST['color'] . "'";
        }

        if(array_key_exists('Male', $_POST)){
            if(strlen($filter)){
                $filter = $filter . " AND ";
            }
            $filter = $filter . "gender='" . $_POST['Male'] . "'";
        }

        if(array_key_exists('Female', $_POST)){
            if(strlen($filter)){
                $filter = $filter . " AND ";
            }
            $filter = $filter . "gender='" . $_POST['Female'] . "'";
        }
        if(strlen($filter)){
            $query = "SELECT * FROM `product` WHERE " . $filter;
        }else{
            $query = "SELECT * FROM `product`";
        }
        
        // var_dump($query); //Debug
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
            echo '<form action="" method="POST">
            <input type="hidden" name="_id" value="' . $row["product_id"] . '">
            <input type="hidden" name="price" value="' . $row["price"] . '">';

            if ($_SESSION['account_type'] == 'staff'){
               echo '<button type="input" id="add_to_cart" name="add_to_cart" class="btn btn-success update-btn" disabled><i class="fas fa-cart-plus"></i> Add to cart</button>';
            }else{
                echo '<button type="input" id="add_to_cart" name="add_to_cart" class="btn btn-success update-btn"><i class="fas fa-cart-plus"></i> Add to cart</button>';
            }

            echo '</form>';
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        // }

    ?>
<!-- ADD TO CART -->
<?php
    if(isset($_POST['add_to_cart'])) {
        if(!isset($_SESSION["username"])) {
            echo
            '<script>
                alert("Please login.");
                window.location.replace("login.php");
            </script>';
        }else{
            $product_id = $_POST["_id"];
            $order_id = $_SESSION["order_id"];
            $price_each = $_POST["price"];
            $sql = "INSERT into `cus_order_product` (product_id, order_id, price_each)
                    VALUES ($product_id, $order_id, $price_each)";
            $res=mysqli_query($conn,$sql);

            $quantity = "SELECT count(`order_id`) FROM `cus_order_product` WHERE `order_id`= ". $_SESSION["order_id"];
            $result = mysqli_query($conn, $quantity) or die(mysqli_error());
            while($row = mysqli_fetch_array($result)) {
                foreach ($row as $total){
                    $_SESSION['total_quantity'] = $total;// get total item(s) in cart
                }
            }
            echo "<script> alert('Successfully added item to cart.');window.location.replace('index.php');</script>";
        }
    }
?>

</body>
<script>
// -=[Scroll To Top Button script]=- //

//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
// -=[End of Scroll To Top Button script]=- //
</script>
</html>