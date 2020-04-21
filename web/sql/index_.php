<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/color.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/ScrollToTop.css">
    <script src="https://kit.fontawesome.com/9cdefafb29.js" crossorigin="anonymous"></script>
    <title>BISAD_PROJECT</title>
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
        width: 110%;
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
        right: 125;
    }
    .delete-btn {
        position: absolute;
        right: 25;
    }
</style>
<?php 
    require("php/connect.php");
    if(isset($_POST['filter']))
    {
        //call variable
        $brand = $_POST['brand'];
        $type = $_POST['type'];
        $color = $_POST['color'];
        $gender = $_POST['gender'];

        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM `product` WHERE (`brand` LIKE '%".$brand."%', `type` LIKE '%".$type."%', `color` LIKE '%".$color."%', `gender` LIKE '%".$gender."%')";
        $search_result = filterTable($query);        
    }
    else {
        $query = "SELECT * FROM `product`";
        $search_result = filterTable($query);
    }

    // function to connect and execute the query
    function filterTable($query)
    {   
        $connect = mysqli_connect("localhost:3307", "root", "", "bisad") or die ("could not connect to mysql");
        $filter_Result = mysqli_query($query, $connect) or die( mysqli_error($connect);
        return $filter_Result;
    }
?>
<body>
    <!-- Scroll To Top Button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>

    <div class = "container-classa">
        <h4 class="head page-header"><br>SHOES</h4>
    </div>
    <br><br><br><br><br><br>
    <div class="container container-border">
    
    <!-- FORM -->
    <form action="" method="POST" class="form-group">
            <div class="row" style="margin-left: 100; margin-right: 100;">
            <div class="col-md-auto" style="margin: auto;">
            <br><br>
            <label for="brand">Brand&ensp;:&ensp; </label>
            <select name='brand' id='brand' class="form-control" style="width: 180px; display: inline;">
                <option value="" >-- Show All --</option>
                <option value="Converse">Converse</option>
                <option value="Jack & Jones">Jack & Jones</option>
                <option value="Vans">Vans</option>
                <option value="Adidas">Adidas</option>
                <option value="Superga">Superga</option>
                <option value="Polo Ralph Lauren">Polo Ralph Lauren</option>
                <option value="New Look">New Look</option>
                <option value="TOMS">TOMS</option>
                <option value="Superdry">Superdry</option>
                <option value="Dr. Martens">Dr. Martens</option>
                <option value="Tommy Hilfiger">Tommy Hilfiger</option>
                <option value="Fred Perry">Fred Perry</option>
                <option value="Topshop">Topshop</option>
                <option value="RAID">RAID</option>
                <option value="Kickers">Kickers</option>
                <option value="Monki">Monki</option>
                <option value="Skechers">Skechers</option>
                <option value="ASOS DESIGN">ASOS DESIGN</option>
                <option value="Lamoda">Lamoda</option>
                <option value="Simmi">Simmi</option>
                <option value="Glamorous">Glamorous</option>
                <option value="Nike">Nike</option>
                <option value="New Balance">New Balance</option>
                <option value="Birkenstock">Birkenstock</option>
                <option value="Fila">Fila</option>
            </select>
            </div>

            <div class="col-md-auto" style="margin: auto;">
            <br><br>
            <label for="type">Type&ensp;:&ensp; </label>
            <select name='type' id='type' class="form-control" style="width: 180px; display: inline;">
                <option value="">-- Show All --</option>
                <option value="Plimsoll">Plimsoll</option>
                <option value="Fila">Fila</option>
                <option value="Trainers">Trainers</option>
                <option value="Boat Shoes">Boat Shoes</option>
                <option value="Ankle Boots">Ankle Boots</option>
                <option value="Brogue">Brogue</option>
                <option value="Chelsea Boots">Chelsea Boots</option>
                <option value="Chukka Boots">Chukka Boots</option>
                <option value="Chunky">Chunky</option>
                <option value="Derby">Derby</option>
                <option value="Espadrille">Espadrille</option>
                <option value="Sandals">Sandals</option>
                <option value="Loafers">Loafers</option>
                <option value="Military Boots">Military Boots</option>
                <option value="Oxford">Oxford</option>
                <option value="Heeled">Heeled</option>
            </select>
            </div>
            <!-- SIZE -->
            <div class="col-md-auto" style="margin: auto;">
                <br><br>
                <label for="color">Color&ensp;:&ensp; </label>
                <select name='color' id='color' class="form-control" style="width: 180px; display: inline;">
                    <option value="">-- Show All --</option>
                    <option value="Monoblack">Monoblack</option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Red">Red</option>
                    <option value="Pink">Pink</option>
                    <option value="Navy">Navy</option>
                    <option value="Beige">Beige</option>
                    <option value="Tan">Tan</option>
                    <option value="Grey">Grey</option>
                    <option value="Brown">Brown</option>
                    <option value="Green">Green</option>
                    <option value="Orange">Orange</option>
                    <option value="Yellow">Yellow</option>
                    <option value="Blue">Blue</option>
                    <option value="Clear">Clear</option>
                    <option value="Sliver">Sliver</option>
                </select>
            </div>

            <div class="col-md-auto" style="margin: auto;">
                <br><br>
                <label for="color">Gender&ensp;:&ensp; </label>
                <select name='gender' id='gender' class="form-control" style="width: 180px; display: inline;">
                    <option value="">-- Show All --</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            
            </div>
            
            <!-- BUTTON -->
            <br>
            <div class="row" style="margin-left: 100; margin-right: 100;">
                <button type="input" class="btn btn-secondary btn-block" name="filter"><i class="fas fa-filter"></i> Filter</i></button>
            </div>
            <!-- END BUTTON -->
            </div>
            <!-- row -->
    </form>
    <!-- END FORM -->
    </div><!-- Container -->
<?php
    $query = "SELECT * FROM `product`";
    $result = mysqli_query($conn, $query) or die(mysqli_error());
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
<script>
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
</script>
</html>