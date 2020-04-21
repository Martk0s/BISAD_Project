<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- มี. -->
    <link rel="stylesheet" href="../css/color.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/ScrollToTop.css">
    <script src="https://kit.fontawesome.com/9cdefafb29.js" crossorigin="anonymous"></script>
    <title>PND_PROJECT UPDATE</title>
</head>
<style>
    /* Head container มี..*/
    .container-classa {
    background-image: url('./img/Head.jpg');
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
    <div class="container">
        <br><br>
        <h1>Update record</h1>
        <?php
            echo "<form action='' method='POST'>";
            $_id = $_POST['_id'];
            echo "<input type='hidden' name='_id' value='$_id'>";
            /*$brand = $_POST['brand'];
            echo "<input type='hidden' name='brand' value='$brand'>";
            $model = $_POST['model'];
            echo "<input type='hidden' name='model' value='$model'>";
            $type = $_POST['type'];
            echo "<input type='hidden' name='type' value='$type'>";
            $gender = $_POST['gender'];
            echo "<input type='hidden' name='gender' value='$gender'>";
            $color = $_POST['color'];
            echo "<input type='hidden' name='color' value='$color'>";*/

            /* รับค่าจากเพจ ['brand'=> $brand/* เป้าหมายที่ดึงมา */

            $conn = new MongoDB\Driver\Manager("mongodb+srv://Martkos:JPkM1FvFmfppg2pf@project-hwxde.mongodb.net/test?retryWrites=true&w=majority");
            //$filter = array('$and'=>array(array('brand'=>$brand),array('model'=>$model),array('type'=>$type),array('detail.gender'=>$gender),array('detail.color'=>$color)));
            $filter = ['_id'=>new MongoDB\BSON\ObjectID($_id)];
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
                echo "<p class='card-text'> <b>Brand</b>&ensp;|&ensp;" . $row->brand . "&ensp; <input type='text' class='form-control' value='$row->brand' name='new_brand' style='width: 280px; height: 30px; display: inline;'>" ;
                echo "<p class='card-text'> <b>Model</b>&ensp;|&ensp;" . $row->model. "&ensp; <input type='text' class='form-control' value='$row->model' name='new_model' style='width: 200px; height: 30px; display: inline;'>" ;
                echo "<p class='card-text'> <b>Type</b>&ensp;|&ensp;" . $row->type . "&ensp; <input type='text' class='form-control' value='$row->type' name='new_type' style='width: 200px; height: 30px; display: inline;'>" ;
                echo "<hr>";
                foreach ($row->detail as $detail) {
                    echo '<label for="color" class="card-text"><b>Gender</b>&ensp;:&ensp; </label>
                    <select name="new_gender" class="form-control card-text" style="width: 200px; display: inline;">
                        <option value=' . $detail->gender . '>' . $detail->gender . ' (not change)</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>';
                    echo "<p class='card-text'>";
                    if (property_exists($detail->size,"US")){
                        echo "<b>US&ensp;|&ensp;</b>";
                        $usstack= '';
                        foreach ($detail->size->US as $US) {
                            echo $US . "&ensp;&ensp;";
                            $usstack .= strval($US) . " ";
                        }
                        echo "&ensp;<input type='text' class='form-control' value='". $usstack . "'  name='new_ussize' style='width: 200px; height: 30px; display: inline;'><br>";
                    }else {
                        $usstack = '';
                        echo "<b>US&ensp;|&ensp;</b>";
                        echo "&ensp;<input type='text' class='form-control' value='". $usstack . "'  name='new_ussize' style='width: 200px; height: 30px; display: inline;'><br>";
                    }
                    if (property_exists($detail->size,"UK")){
                        echo "<b>UK&ensp;|&ensp;</b>";
                        $ukstack= '';
                        foreach ($detail->size->UK as $UK) {
                            echo $UK . "&ensp;&ensp;";
                            $ukstack .= strval($UK) . " ";
                        }
                        echo "&ensp;<input type='text' class='form-control' value='". $ukstack . "' name='new_uksize' style='width: 200px; height: 30px; display: inline;'><br>";
                    }else {
                        $ukstack = '';
                        echo "<b>UK&ensp;|&ensp;</b>";
                        echo "&ensp;<input type='text' class='form-control' value='". $ukstack . "' name='new_uksize' style='width: 200px; height: 30px; display: inline;'><br>";
                    }
                    if (property_exists($detail->size,"EU")){
                        $eustack = '';
                        echo "<b>EU&ensp;|&ensp;</b>";
                        foreach ($detail->size->EU as $EU) {
                            echo $EU . "&ensp;&ensp;";
                            $eustack .= strval($EU) . " ";
                        }
                        echo "&ensp;<input type='text' class='form-control' value='". $eustack . "' name='new_eusize' style='width: 200px; height: 30px; display: inline;'>";
                    }else {
                        $eustack = '';
                        echo "<b>EU&ensp;|&ensp;</b>";
                        echo "&ensp;<input type='text' class='form-control' value='". $eustack . "' name='new_eusize' style='width: 200px; height: 30px; display: inline;'>";
                    }
                    echo "</p>";
                    echo "<div class='container'>";
                    echo "<div class='row'>";
                    echo "<div class='color-box " . $detail->color . "'></div>";
                    //echo "<p class='card-text'> <b>Color</b>&ensp;|&ensp;" . $detail->color . "&ensp;<input type='text' class='form-control' value='". $detail->color ."' name='new_color' style='width: 200px; height: 30px; display: inline;'>" ;
                    echo '<label for="color" class="card-text"><b>Color</b>&ensp;:&ensp; </label>
                    <select name="new_color" class="form-control card-text" style="width: 250px; display: inline;">
                        <option value=' . $detail->color . '>' . $detail->color . ' (not change)</option>';
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
                        /*<option value="Monoblack">Monoblack</option>
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
                        <option value="Sliver">Sliver</option>*/
                    echo '</select>';
                    echo "</div>";
                    echo "</div>";
                    $conn = new MongoDB\Driver\Manager("mongodb+srv://Martkos:JPkM1FvFmfppg2pf@project-hwxde.mongodb.net/test?retryWrites=true&w=majority");
                    //$filter = array('$and'=>array(array('brand'=>$brand),array('model'=>$model),array('type'=>$type),array('detail.gender'=>$gender),array('detail.color'=>$color)));
                    $filter = ['_id'=>new MongoDB\BSON\ObjectID($_id)];
                    $query = new MongoDB\Driver\Query($filter);
                    $rows = $conn->executeQuery("Shoes.Shoes", $query);
                    foreach ($detail->price as $price) {
                        echo "<p class='card-text'> <b>Price</b>&ensp;|&ensp;" . $price . "&ensp;<input type='text' class='form-control' value='". $price ."' name='new_amount' style='width: 150px; height: 30px; display: inline;'>" ;
                    break;
                    }
                    foreach ($row->detail as $detail) {
                    echo "<p class='card-text'> <b>Picture URL</b>&ensp;|&ensp; <input type='text' class='form-control' value='". $detail->picture ."' name='new_picurl' style='width: 550px; height: 30px; display: inline;'>" ;
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
                echo "<div>
                        <button type='input' name='Update' class='btn btn-success update-btn'><i class='fa fa-pencil-alt'></i> Update</button>
                        <button type='input' name='cancel' class='btn btn-warning delete-btn'><i class='fas fa-window-close'></i> Cancel</button>
                    </div>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        
            //เชื่อมต่อ MongoDB
            $conn = new MongoDB\Driver\Manager("mongodb+srv://Martkos:JPkM1FvFmfppg2pf@project-hwxde.mongodb.net/test?retryWrites=true&w=majority");

            if(isset($_POST['Update'])){
                $new_gender = $_POST['new_gender'];
                $new_color = $_POST['new_color'];
                $new_picurl = $_POST['new_picurl'];

                $new_ussize = $_POST['new_ussize'];
                $new_uksize = $_POST['new_uksize'];
                $new_eusize = $_POST['new_eusize'];
                

                //สร้างBlock สำหรับรองรับการเพิ่มข้อมูลต่างๆแบบ Bulk
                $bulkWrite = new MongoDB\Driver\BulkWrite;
                
                //ตำแหน่งที่ต้องการจะเปลี่ยน
                //$filter = array('$and'=>array(array('brand'=>$brand),array('model'=>$model),array('type'=>$type),array('detail.gender'=>$gender),array('detail.color'=>$color)));
                $filter = ['_id'=>new MongoDB\BSON\ObjectID($_id)];

                $i = 0;
                $USArray = explode(' ', $new_ussize);
                $USArray = array_map('trim', $USArray);
                while(in_array("", $USArray)){
                    if ($USArray[$i] == ""){
                        unset($USArray[$i]);
                    }
                    $i++;
                }
                
                $i = 0;
                $UKArray = explode(' ', $new_uksize);
                $UKArray = array_map('trim', $UKArray);
                while(in_array("", $UKArray)){
                    if ($UKArray[$i] == ""){
                        unset($UKArray[$i]);
                    }
                    $i++;
                }
                
                $i = 0;
                $EUArray = explode(' ', $new_eusize);
                $EUArray = array_map('trim', $EUArray);
                while(in_array("", $EUArray)){
                    if ($EUArray[$i] == ""){
                        unset($EUArray[$i]);
                    }
                    $i++;
                }

                $priceObj = ['amount'=>$_POST['new_amount'],'currency'=>'USD'];
                $sizeObj = [];
                if(count($USArray) != 0){
                    $sizeObj += ['US'=>$USArray];
                }
                if(count($UKArray) != 0){
                    $sizeObj += ['UK'=>$UKArray];
                }
                if(count($EUArray) != 0){
                    $sizeObj += ['EU'=>$EUArray];
                }
                $detailArray = array(
                    [  
                        'gender' => $new_gender,
                        'price'=> $priceObj,
                        'color' => $new_color,
                        'size' => $sizeObj,
                        'picture' => $new_picurl
                    ]
                );
                $update = ['$set' => ['brand' => $_POST['new_brand'],   
                                    'model' => $_POST['new_model'], 
                                    'type' => $_POST['new_type'],
                                    'detail' => $detailArray
                                    ]];
                $options = ['multi' => false];
                $bulkWrite->update($filter, $update, $options);
                $out = $conn->executeBulkWrite('Shoes.Shoes', $bulkWrite);
                if ($out) {
                    echo '<script type="text/javascript">alert("Record has been saved."); window.location = "index.php";</script>';
                }else{
                    echo '<script type="text/javascript">alert("Failed to update record.")</script>';
                }
            }

            
        ?>
        <?php
            if(isset($_POST['cancel'])){
                echo '<script type="text/javascript">alert("Canceled, notthing has change."); window.location = "index.php";</script>';
            }
        ?>
    </div>
</body>
</html>