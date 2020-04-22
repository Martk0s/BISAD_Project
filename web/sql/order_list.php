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
    //var_dump($query);
    $result = mysqli_query($conn, $query) or die(mysqli_error());
    while($row = mysqli_fetch_array($result)) {
?>

<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:center;" width="7%">Order ID</th>
<th style="text-align:left;">Product Name</th>
<th style="text-align:center;" width="7%">Product ID</th>
<th style="text-align:right;" width="7%">Price</th>
<th style="text-align:center;" width="15%">Order Time</th>
<th style="text-align:center;" width="6%">Remove</th>
</tr>
<?php		
    foreach ($result as $order){
        ?>
        <?php
        $order_id = $order['order_id'];
        $query = "SELECT * FROM `cus_order_product` WHERE `order_id`=" . $order_id;
        $result = mysqli_query($conn, $query) or die(mysqli_error());
        while($row = mysqli_fetch_array($result)) {
            foreach ($result as $prod){
		?>      
				<tr>			
                <?php                
                    $prod_id = $prod['product_id'];
                    $query = "SELECT * FROM `product` WHERE `product_id` =". $prod_id;
                    $result = mysqli_query($conn, $query) or die(mysqli_error());
                    while($row = mysqli_fetch_array($result)) {
                        foreach ($result as $item){ ?>
                            <!-- Order ID -->
                            <td style="text-align:center;"><?php echo $order["order_id"]; ?></td>
                            <!-- Picture -->
				            <td><img src="<?php echo $item["product_image"]; ?>" class="cart-item-image" /><?php echo $item["product_name"]; ?></td>
				            <td style="text-align:center;"><?php echo $item["product_id"]; ?></td>
				            <!-- Price -->
				            <td  style="text-align:right;"><?php echo "$" . $item["price"]; ?></td>
                            <td style="text-align:center;"><?php echo $prod["order_number"]; ?></td>
                        <?php
                        }
                    }
                ?>
				<!-- Remove btn action remove&product code -->
				<td style="text-align:center;"><a href="delete_cart.php?id=<?php echo $prod['order_number'];?>"><img src="img/icon-delete.png"  alt="Remove Item" /></a></td>
                <?php 
                // echo "<br>";
                // var_dump($prod['order_number']); 
                ?> 
                </tr>
				<?php
            }
        }
    }
		        ?>
</tbody>
</table>
<?php
}
?>
</div>
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