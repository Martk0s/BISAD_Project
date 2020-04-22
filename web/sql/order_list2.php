<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/color.css">
    <link rel="stylesheet" href="./css/ScrollToTop.css">
    <link rel="stylesheet" href="./css/styleor.css">
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
    .container-classb {
    background-image: url('./img/head.jpg');
    background-repeat: no-repeat;
    background-position: top;
    width: 48%;
    height: 100px;
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
    .page-headerb {
        font-size: 30px;
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
    ?>

    <!-- Scroll To Top Button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>
    <!-- END of Scroll To Top Button -->

    <div class = "container-classB">
        <h4 class="head page-headerb"><br>Order List</h4>
    </div>
    <br><br><br><br><br><br>

<div id="shopping-cart">
<?php
    // cus-order-Prod [Prod_id]-> $XX -> product[Prod_id]
    $query = "SELECT * FROM `cus_order` WHERE `account_id`=1 AND `order_status`='pending' ";
    var_dump($query);
    $result = mysqli_query($conn, $query) or die(mysqli_error());
    while($row = mysqli_fetch_array($result)) {
?>

<table class="tbl-cart"  border ="1" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;" width="7%">Product ID</th>
<th style="text-align:left;" >Product Name</th>
<th style="text-align:center;" width="7%">Order ID</th>
<th style="text-align:right;" width="7%">Price</th>
<th style="text-align:right;" width="15%">Order Time</th>
<th style="text-align:center;" width="6%">Remove</th>
</tr>
<?php		
    foreach ($result as $order){
        $order_id = $order['order_id'];
        $query = "SELECT * FROM `cus_order_product` WHERE `order_id`=" . $order_id;
        $result = mysqli_query($conn, $query) or die(mysqli_error());
        while($row = mysqli_fetch_array($result)) {
		?>  
				<tr>
				<!-- Picture -->
				<td><img src="<?php echo $item["product_image"]; ?>" class="cart-item-image" /><?php echo $item["product_name"]; ?></td>
				<td style="text-align:center;"><?php echo $item["product_id"]; ?></td>
				<!-- Price -->
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				
                <?php
                    $query = "SELECT * FROM `cus_order_product`";
                    $result = mysqli_query($conn, $query) or die(mysqli_error());
                    while($row = mysqli_fetch_array($result)) {
                        foreach ($result as $item){
                            echo "<td  style='text-align:right;'> <?php echo" . $item['order_number'].";?> </td>";
                        }
                    }
                ?>
				<!-- Remove btn action remove&product code -->
				<td style="text-align:center;"><a href="" class="btnRemoveAction"><img src="img/icon-delete.png"  alt="Remove Item" /></a></td>
				</tr>
				<?php
            }
		}
		?>
</tbody>
</table>
<?php
}
?>
</div>
    <!--?php
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
    ?-->
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