<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/color.css">
    <link rel="stylesheet" href="./css/ScrollToTop.css">
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

    .page-header {
        font-size: 80px;
        color: white;
        text-align: center;
    }

    .container-border {
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

    .detail-btn {
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

    <div class="container-classa">
        <h4 class="head page-header"><br>CHECK ORDER</h4>
    </div>
    <br><br><br><br><br><br>
    <!-- filter container -->

    <?php
        $query = "SELECT * FROM `user_account` INNER JOIN `cus_order` ON `user_account_id` = `account_id` WHERE `order_status` LIKE 'confirmed'";
        $result = mysqli_query($conn, $query) or die(mysqli_error());
        while($row = mysqli_fetch_array($result)) {
            echo "<div class='container py-3'>";
            echo "<div class='card'>";
            echo '<h5 class="card-header">Order ID ' . $row["order_id"] . '</h5>';
            echo "<div class='row'>";
            echo "<div class='col-md-8 px-3 py-3'>";
            echo "<div class='card-block px-3'>";
            echo "<p class='card-text'> <b>Order Date </b><br>&ensp;&ensp;" .$row["order_date"] . "</p>";//order_date
            echo "<p class='card-text'> <b>Customer Name </b><br>&ensp;&ensp;" .$row["first_name"] . " ". $row["last_name"] . "</p>";//name
            echo "<p class='card-text'> <b>Address </b><br>&ensp;&ensp;" .$row["shipping_address"] . "</p>";//adress
            echo "<hr>";

            echo "<div class='container'>";
            echo "<h4 style='color: #00a2e2;'>Total Price : $ " . $row["total_amount"] . "</h4>";//price ($)
            echo "<br>";
            echo '<form action="check_order_list.php" method="POST">
                <input type="hidden" name="_id" value="' . $row["order_id"] . '">
                <button type="input" class="btn btn-info ">More Detail</button>
                </form>';
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    ?>

    

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

</html>