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

    <?php include("php/connect.php");?>

    <!-- Scroll To Top Button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>
    <!-- END of Scroll To Top Button -->

    <div class = "container-classa">
        <h4 class="head page-header"><br>SHOES</h4>
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
                <button type="input" class="btn btn-secondary btn-block" name="filter"><i class="fas fa-filter"></i> Filter</i></button>
            <!-- END BUTTON -->
            </div>
        </form>
    </div>
    
    <?php
        include("php/product.php")//แสดงรายการสินค้าทั้งหมด
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