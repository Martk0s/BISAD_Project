<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/color.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/ScrollToTop.css">
    <script src="https://kit.fontawesome.com/9cdefafb29.js" crossorigin="anonymous"></script>
    <title>PND_PROJECT</title>
</head>
<style>
    /* Head container */
    .container-classa {
    background-image: url('../img/head.jpg');
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
<body>

    <!-- Scroll To Top Button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>
    <a href="insert.php" title="Add New Record" class="float"><i class="fas fa-plus my-float"></i></a>
    <!-- END Scroll To Top Button -->
    <div class = "container-classa">
        <h4 class="head page-header"><br>SHOES</h4>
    </div>
    <br><br><br><br><br><br>
    <div class="container container-border">
    <form action="" method="POST" class="form-group">
            <div class="row" style="margin-left: 100; margin-right: 100;">
            <div class="col-md-auto" style="margin: auto;">
            <br><br>
            <label for="brand">Brand&ensp;:&ensp; </label>
            <select name='brand' id='brand' class="form-control" style="width: 180px; display: inline;">
                <option value="" >-- Show All --</option>
                <?php
                    $conn = new MongoDB\Driver\Manager("mongodb+srv://Martkos:JPkM1FvFmfppg2pf@project-hwxde.mongodb.net/test?retryWrites=true&w=majority");
                    $query = new MongoDB\Driver\Query([]);
                    $rows = $conn->executeQuery("Shoes.Shoes", $query);

                    $check_dup = [];
                    foreach($rows as $row){
                        if(in_array($row->brand, $check_dup)){
                            continue;
                        }else{
                            array_push($check_dup, $row->brand);
                        }
                    }
                    sort($check_dup);
                    for($i = 0; $i != count($check_dup); $i++){
                        echo '<option value="' . $check_dup[$i] . '">' . $check_dup[$i] . '</option>';
                    }
                ?>
                <!--option value="Converse">Converse</option>
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
                <option value="Fila">Fila</option-->
            </select>
            </div>

            <div class="col-md-auto" style="margin: auto;">
            <br><br>
            <label for="type">Type&ensp;:&ensp; </label>
            <select name='type' id='type' class="form-control" style="width: 180px; display: inline;">
                <option value="">-- Show All --</option>
                <?php
                    $conn = new MongoDB\Driver\Manager("mongodb+srv://Martkos:JPkM1FvFmfppg2pf@project-hwxde.mongodb.net/test?retryWrites=true&w=majority");
                    $query = new MongoDB\Driver\Query([]);
                    $rows = $conn->executeQuery("Shoes.Shoes", $query);

                    $check_dup = [];
                    foreach($rows as $row){
                        if(in_array($row->type, $check_dup)){
                            continue;
                        }else{
                            array_push($check_dup, $row->type);
                        }
                    }
                    sort($check_dup);
                    for($i = 0; $i != count($check_dup); $i++){
                        echo '<option value="' . $check_dup[$i] . '">' . $check_dup[$i] . '</option>';
                    }
                ?>
                <!--option value="Plimsoll">Plimsoll</option>
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
                <option value="Heeled">Heeled</option-->
            </select>
            </div>
            <!-- SIZE -->
            <div class="col-md-auto" style="margin: auto;">
                <br><br>
                <label for="color">Color&ensp;:&ensp; </label>
                <select name='color' id='color' class="form-control" style="width: 180px; display: inline;">
                    <option value="">-- Show All --</option>
                    <?php
                        $conn = new MongoDB\Driver\Manager("mongodb+srv://Martkos:JPkM1FvFmfppg2pf@project-hwxde.mongodb.net/test?retryWrites=true&w=majority");
                        $query = new MongoDB\Driver\Query([]);
                        $rows = $conn->executeQuery("Shoes.Shoes", $query);

                        $check_dup = [];
                        foreach($rows as $row){
                            foreach($row->detail as $detail){
                                if(in_array($detail->color, $check_dup)){
                                    continue;
                                }else{
                                    array_push($check_dup, $detail->color);
                                }
                            }
                        }
                        sort($check_dup);
                        for($i = 0; $i != count($check_dup); $i++){
                            echo '<option value="' . $check_dup[$i] . '">' . $check_dup[$i] . '</option>';
                        }
                    ?>
                    <!--option value="Monoblack">Monoblack</option>
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
                    <option value="Sliver">Sliver</option-->
                </select>
            </div>
            
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
            </div>
            <!-- END BUTTON -->
            </div>
            <!-- row -->
    </form>
    </div><!-- Container -->
    <hr style="width: 1200px;size: 4px;">

    <?php
        $filter = [];
        if(isset($_POST['filter'])) {
            if($_POST['brand'] != ""){
                $filter += ["brand"=>$_POST['brand']];
            }
            
            if($_POST['type'] != ""){
                $filter += ["type"=>$_POST['type']];
            }
            
            if($_POST['color'] != ""){
                $filter += ["detail.color"=>$_POST['color']];
            }
            
            error_reporting(~E_NOTICE );
            if($_POST['Male'] != ""){
                $filter += ["detail.gender"=>$_POST['Male']];
            }
            
            if($_POST['Female'] != ""){
                $filter += ["detail.gender"=>$_POST['Female']];
            }

            $conn = new MongoDB\Driver\Manager("mongodb+srv://Martkos:JPkM1FvFmfppg2pf@project-hwxde.mongodb.net/test?retryWrites=true&w=majority");
            $query = new MongoDB\Driver\Query($filter);
            $rows = $conn->executeQuery("Shoes.Shoes", $query);
    
            foreach ($rows as $row) {
                echo "<div class='container py-3'>";
                echo "<div class='card'>";
                echo "<div class='row'>";
                echo "<div class='col-md-4'>";
                $i = 0;
                foreach ($row->detail as $detail) {
                    echo "<img src='". $detail->picture . "' class='shoes-image'>"; 
                }
                echo "</div>";
                echo "<div class='col-md-8 px-3 py-3'>";
                echo "<div class='card-block px-3'>";
                echo "<p class='id-no' style='text-align: right; color: rgb(200, 200, 200);'>ID: " . $row->_id . "<br></p>";//debug
                echo "<h2 class='card-title'>" . $row->brand . "</h2>";
                echo "<p class='card-text'> <b>Model</b><br>&ensp;&ensp;" . $row->model . "</p>" ;
                echo "<p class='card-text'> <b>Type</b><br>&ensp;&ensp;" . $row->type . "</p>" ;
                echo "<hr>";
                foreach ($row->detail as $detail) {
                    echo "<p class='card-text'> <b>Gender</b><br>&ensp;&ensp;" . $detail->gender . "</p>" ;
                    echo "<p class='card-text'>";
                    if (property_exists($detail->size,"US")){
                        echo "<b>US &ensp;</b>";
                        foreach ($detail->size->US as $US) {
                            echo $US . "&ensp;&ensp;";
                        }
                        echo "<br>";
                    }
                    if (property_exists($detail->size,"UK")){
                        echo "<b>UK &ensp;</b>";
                        foreach ($detail->size->UK as $UK) {
                            echo $UK . "&ensp;&ensp;";
                        }
                        echo "<br>";
                    }
                    if (property_exists($detail->size,"EU")){
                        echo "<b>EU &ensp;</b>";
                        foreach ($detail->size->EU as $EU) {
                            echo $EU . "&ensp;&ensp;";
                        }
                    }
                    echo "</p>";
                    echo "<div class='container'>";
                    echo "<div class='row'>";
                    echo "<p class='card-text'><b>Color&ensp;</b></p>";
                    echo "<div class='color-box " . $detail->color . "'></div>";
                    echo "<p class='card-text'>" . $detail->color . "</p>";
                    echo "</div>";
                    echo "</div>";
                    foreach ($detail->price as $price) {
                        echo "<h4 style='color: #00a2e2;'>$ " . $price . "</h4>";
                    break;
                    }
                    if (count($row->detail) > 1) {
                        if (0 != $i) {
                            echo "<br>";
                            echo "<br>";
                            echo "<br>";
                            echo "<br>";
                            echo "<br>";
                            echo "<br>";
                            echo "<br>";
                            echo "<br>";
                            echo "<br>";
                        }
                    }
                    $i++;
                    if (count($row->detail) > 1) {
                        if (count($row->detail) != $i) {
                            echo "<br>";
                            echo "<br>";
                            echo "<br>";
                            echo "<hr>";
                        }
                    }
    
                }
                echo "<div>";
                echo '<form action="update.php" method="POST">
                <input type="hidden" name="_id" value="' . $row->_id . '">
                <input type="hidden" name="brand" value="' . $row->brand . '">
                <input type="hidden" name="model" value="' . $row->model . '">
                <input type="hidden" name="type" value="' . $row->type . '">
                <input type="hidden" name="gender" value="' . $detail->gender . '">
                <input type="hidden" name="color" value="' . $detail->color . '">
                <button type="input" class="btn btn-success update-btn"><i class="fas fa-pencil-alt"></i> Update</button>
                </form>';
                echo '<form action="delete.php" method="POST">
                <input type="hidden" name="_id" value="' . $row->_id . '">
                <input type="hidden" name="brand" value="' . $row->brand . '">
                <input type="hidden" name="model" value="' . $row->model . '">
                <input type="hidden" name="type" value="' . $row->type . '">
                <input type="hidden" name="gender" value="' . $detail->gender . '">
                <input type="hidden" name="color" value="' . $detail->color . '">
                <button type="input" class="btn btn-danger delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>';
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
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