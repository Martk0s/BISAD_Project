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
    background-image: url('./img/background.jpg');
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

    .container-classm {
    width: 50%;
    height: 50px;
    border-radius: 25px;
    position: relative;
    border: 3px;
    }

    .container-classs {
    width: 20%;
    height: 50px;
    border-radius: 25px;
    position: relative;
    border: 3px;
    }

    .container-classd {
    width: 30%;
    height: 100px;
    border-radius: 15px;
    position: relative;
    left: 900px;
    border: 3px;  
    }

    .container-classxxx {
    width: 100%;
    height: 300px;
    border-radius: 2px dashed #333;
    position: relative;
    border: 3px;
    }

    .container-classxx {
    width: 100%;
    height: 150px;
    border-radius: 2px dashed #333;
    position: relative;
    border: 3px;
    }

    .container-classxl {
    width: 50%;
    height: 150px;
    border-radius: 2px dashed #333;
    position: relative;
    border: 3px;
    left: 100px;
    }

    .container-classxr {
    width: 50%;
    height: 200px;
    border-radius: 2px dashed #333;
    border: 3px;
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
        right:0;
    }

    .update-btnn {
        position: absolute;
        /* right: 125; */
        right:15;
    }

    .update-btnnn {
        position: absolute;
        right:160;
        /* right: 125; */
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
        include("php/auth_session.php");
        //var_dump($_SESSION);

        $username = $_SESSION['username'];
        $account_id = $_SESSION['user_account_id'];
        $first_name = $_SESSION['first_name'];
        $last_name = $_SESSION['last_name'];
        $address = $_SESSION['address'];
        $telephone = $_SESSION['telephone'];
        $email = $_SESSION['email'];
        $shipping_address = $_SESSION['address'];
        $ord_id = $_SESSION['order_id'];

        //Quantity Variable
        $quantity = "SELECT count(`order_id`) FROM `cus_order_product` WHERE `order_id`= ". $ord_id;
        $result = mysqli_query($conn, $quantity) or die(mysqli_error());
        while($row = mysqli_fetch_array($result)) {
            foreach ($row as $total){
                $total_quantity = $total;
            }
        }

        //Total price Variable
        $price_list = "SELECT `price_each` FROM `cus_order_product` WHERE `order_id`= ". $ord_id;
        $result = mysqli_query($conn, $price_list) or die(mysqli_error());
        $total_amount = 0;
        while($row = mysqli_fetch_array($result)) {
            $total_amount += $row['price_each'];
        }
    ?>

    <?php

        if (isset($_POST['confirm'])){
            $price_list = "SELECT `price_each` FROM `cus_order_product` WHERE `order_id`= ". $ord_id;
            $result = mysqli_query($conn, $price_list) or die(mysqli_error());
            $total_amount = 0;
            while($row = mysqli_fetch_array($result)) {
                $total_amount += $row['price_each'];
            }
            //เวลา
            if (strlen($_POST['new_address'])){
                $shipping_address = $_POST['new_address'];
            }

            $date = date('Y-m-d H:i:s');
            $query = "UPDATE `cus_order` SET `order_date` ='". $date ."', `shipping_address` ='". $shipping_address ."', `order_status` = 'confirmed', `total_amount` =". $total_amount ." WHERE `order_status`='pending' AND `order_id` =". $ord_id ; 
            echo "<br>";
            $result = mysqli_query($conn, $query) or die(mysqli_error());
            $sql = "INSERT INTO `cus_order` (account_id) VALUES ($account_id)";
            $res=mysqli_query($conn,$sql);
            $query = "SELECT * FROM `cus_order` WHERE account_id=" . $account_id . " AND `order_status`='pending'";
            // var_dump($query);
            $result = mysqli_query($conn, $query) or die(mysqli_error());
            while($roww = mysqli_fetch_array($result)) {
                $_SESSION["order_id"] = $roww["order_id"];
            }
            echo "<script type='text/javascript'>alert('Purchase Confirmed.'); 
                              window.location.replace('index.php');</script>";
            
        }
    ?>
    
    <!-- Scroll To Top Button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>
    <!-- END of Scroll To Top Button -->

    <div class = "container-classb">
        <br>
        <h4 class="head page-headerb">PURCHASE</h4>
    </div>
    <br><br><br><br><br>
    

<!-- /// CONFIRM FORM /// -->
<div class="container-classxxx">
    <!-- \\\ UPPER CONTAINER \\\-->
    <div class="container-classxx row">
        <!-- /// USER DATA /// -->
        <div class="container-classxl col">
        <br>
        <br>
            First Name | <?php echo $first_name ?> <br>
            Last Name  | <?php echo $last_name ?> <br>
            Email      | <?php echo $email ?> <br>
        </div>
        <!-- /// USER DATA /// -->
        <!-- /// USER ADDRESS /// -->
        <div class="container-classxr col">
            <br><br><br>
            Current Address | <?php echo $address ?>
        </div>
        <!-- /// USER ADDRESS /// -->
    </div>
    <!-- \\\ UPPER CONTAINER \\\-->
    <!-- \\\ LOWER CONTAINER \\\-->
    <div class="container-classxx row">
        <!-- /// CONFIRM FORM /// -->
        <div class="container-classxl col">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="container-classm">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Credit Card</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="ccnumber" name="ccnumber" onblur="check_ccnumber();" required />
                    </div>
                </div>

                <div class="container-classs">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">CVV</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="cvv" name="cvv" onblur="check_cvv();" required /><br>
                    </div>
                </div>
            
                <div class="container-classm">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Expiration</span>
                            <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" type="month" value="2020-01" id="example-month-input">
                        </div>                  
                    </div>
                </div><br><br>
        </div>
        <!-- /// CONFIRM FORM /// -->
        <!-- /// CHANGE ADDRESS FORM /// -->
        <div class="container-classxr col">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Address</span>
            </div>
                <textarea class="form-control" aria-label="With textarea" id="new_address" name="new_address" rows="5" cols="40" placeholder="Want us to send it somewhere else? No problem! Write the address here." onblur="check_address()"></textarea>
            </div><br>
            <?php 
                if ($total_quantity == 0) {
                    echo '<button type="input" class="btn btn-success update-btnnn" name="confirm" id="confirm" value="submit" class="login-button" disabled><i class="fas fa-cash-register"></i> Confirm </button>';
                }else{
                    echo '<button type="input" class="btn btn-success update-btnnn" name="confirm" id="confirm" value="submit" class="login-button"><i class="fas fa-cash-register"></i> Confirm </button>';
                }
            ?>
            </form>
            <a href="order_list.php"><button type="input" class="btn btn-warning update-btnn" class="login-button"><i class="fas fa-shopping-cart"></i> Back to Cart </button></a>
        <!-- /// CHANGE ADDRESS FORM /// -->
        </div>
    </div>
    <!-- \\\ LOWER CONTAINER \\\-->
</div>

<!--/// PENDING INPROGRESS ///-->
<div id="shopping-cart">
<center> /// CURRENTLY ORDER /// </center><br>
<?php
    $query = "SELECT * FROM `cus_order` WHERE `account_id`= '". $account_id ."' AND `order_status`='pending' ";
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
                </tr>
				<?php
            }
        }
    }
		        ?>
    <tr>
    <td colspan="2" align="right">Total:</td>
    <!-- echo Total quantity and Price -->
    <td align="center"><strong><?php echo $total_quantity; ?></strong></td>
    <td align="right"><strong><?php echo "$" .$total_amount; ?></strong></td>
    <td></td>
    <td></td>
    </tr>
</tbody>
</table>
<!-- /// PURCHASE CONFIRM /// -->

<br>
<!-- <a href="order_list.php"><button type="input" class="btn btn-success update-btn" class="login-button"><i class="fas fa-cart-plus"></i> Back to Cart </button></a> -->
<!-- /// PURCHASE CONFIRM /// -->
<?php
}
?>
</div><br>
<!--/// PENDING INPROGRESS ///-->
<script>
    function check_ccnumber() {
        var elem = document.getElementById('ccnumber').value;
        if (elem.length != 0){
            if (!elem.match(/^[0-9]+$/i)) {
                alert("Numeric only.")
                document.getElementById('ccnumber').value = "";
            }
    
            if (elem.length != 16) {
                alert("Credit card must be 16 digit.")
            }
        }
    }

    
    function check_cvv() {
        var elem = document.getElementById('cvv').value;
        if (elem.length != 0){
            if (!elem.match(/^[0-9]+$/i)) {
                alert("Numeric only.")
                document.getElementById('cvv').value = "";
            }
    
            if (elem.length != 3) {
                alert("CVV number must be 3 digit.")
            }
        }
    }

    function check_address() {
        var elem = document.getElementById('address').value;
        if (elem.length != 0) {
            if (elem.length > 200) {
                alert("200 character maximum.")
                document.getElementById('address').value = "";
            }
        }
    }

</script>
    

</body>
</html>