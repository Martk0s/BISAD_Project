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
<body>
<?php
    error_reporting(~E_NOTICE );
    session_start();
    if(!isset($_SESSION["username"])) {
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Shoes Shoes 🚂</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="./login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login &ensp;&ensp;<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
        </li>
        </ul>
    </div>
</nav>

<?php }else{ ?>

    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Shoes Shoes 🚂</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <span class="navbar-text ml-auto">
                <?php echo "Hello " . $_SESSION["first_name"] . "!"; ?>
            </span>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <?php 
                    if ($_SESSION['account_type'] == 'staff'){
                        echo '<a class="nav-link" href="check_cus_order_(for_staff).php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></i> Check Order &ensp;&ensp;<span class="sr-only">(current)</span></a>';
                    }else{
                        if ($_SESSION['total_quantity'] == 0) {
                            echo '<a class="nav-link" href="order_list.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></i> Cart &ensp;&ensp;<span class="sr-only">(current)</span></a>';
                        }else{
                            echo '<a class="nav-link" href="order_list.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></i> Cart ('. $_SESSION["total_quantity"] .') &ensp;&ensp;<span class="sr-only">(current)</span></a>';
                        }
                    }
                ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="php/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>
            </li>
            </ul>
        </div>
    </nav>

<?php } ?>
</body>
</html>