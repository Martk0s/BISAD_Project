<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/color.css">
    <link rel="stylesheet" href="./css/ScrollToTop.css">
    <link rel="stylesheet" href="./css/styleor.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
        right: 42;
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
        if ($_SESSION['account_type'] != 'staff') {
            echo
            '<script>
                alert("You don\'t have permission to view this page.");
                window.location.replace("index.php");
            </script>';
            die();
        }
    ?>

    <!-- Scroll To Top Button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>
    <!-- END of Scroll To Top Button -->
    <div class="container-classb">
        <h4 class="head page-headerb"><br>CHECK ORDER DETAIL</h4>
    </div>
    <div class='container py-2'>
        <div class='row'>
            <div class='col'></div>
            <div class='w-50'>
                <br><br><br><br>
                <button type="button" class="btn btn-info btn-block" onclick="go_back()">Back</button>
            </div>
            <div class='col'></div>
        </div>
    </div>
    <br><br><br><br><br><br>
    <!-- filter container -->

    <div id="shopping-cart">

    <?php
        error_reporting(~E_NOTICE );
        error_reporting(E_ERROR | E_PARSE);

        $ord_id = $_POST['_id'];

        $quantity = "SELECT count(`order_id`) FROM `cus_order_product` WHERE `order_id`= ". $ord_id;
        $result = mysqli_query($conn, $quantity) or die(mysqli_error());
        while($row = mysqli_fetch_array($result)) {
            foreach ($row as $total){
                $total_quantity = $total;
            }
        }

        $price_list = "SELECT `price_each` FROM `cus_order_product` WHERE `order_id`= ". $ord_id;
        $result = mysqli_query($conn, $price_list) or die(mysqli_error());
        $total_amount = 0;
        while($row = mysqli_fetch_array($result)) {
            $total_amount += $row['price_each'];
        }
    ?>

    <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
            <tr>
                <th style="text-align:center;" width="7%">Order ID</th>
                <th style="text-align:left;">Product Name</th>
                <th style="text-align:center;" width="7%">Product ID</th>
                <th style="text-align:right;" width="7%">Price</th>
                <th style="text-align:center;" width="15%">Order Time</th>
            </tr>

    <?php

        $query = "SELECT * FROM `cus_order_product` WHERE `order_id`=" . $ord_id;
        $result = mysqli_query($conn, $query) or die(mysqli_error());
        while($row = mysqli_fetch_array($result)) {
            foreach ($result as $prod){
                echo '<tr>';

                $prod_id = $prod['product_id'];
                $query = "SELECT * FROM `product` WHERE `product_id` =". $prod_id;
                $result = mysqli_query($conn, $query) or die(mysqli_error());
                while($row = mysqli_fetch_array($result)) {
                    foreach ($result as $item){
                        echo '<td style="text-align:center;">' . $ord_id . '</td>';
                        echo '<td><img src="' . $item['product_image'] . '" class="cart-item-image"/>' . $item['product_name'] . '</td>';
                        echo '<td style="text-align:center;">' . $item['product_id']. '</td>';
                        echo '<td  style="text-align:right;">' . "$" . $item["price"] . '</td>';
                        echo '<td style="text-align:center;">' .$prod["order_number"]. '</td>';
                        echo '</tr>';
                    }
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
            </tr>
        </tbody>
    </table>
    
    </div>
</body>

<script>
    // -=[Scroll To Top Button script]=- //

    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () { scrollFunction() };

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
<script>
    function go_back() {
        window.location.replace("check_cus_order_(for_staff).php");
    }
</script>
</html>
