<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/color.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/ScrollToTop.css">
    <script src="https://kit.fontawesome.com/9cdefafb29.js" crossorigin="anonymous"></script>
    <title>Delete Confirmation</title>
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
        right: 150;
    }
    .delete-btn {
        position: absolute;
        right: 25;
    }
</style>
<body>
    <div class="container">
        <br><br>
        <h1>Are you sure to delete this record?</h1>
        <?php
            $_id = $_POST['_id'];
            error_reporting(~E_NOTICE );
            /*$brand = $_POST['brand'];
            $model = $_POST['model'];
            $type = $_POST['type'];
            $gender = $_POST['gender'];
            $color = $_POST['color'];*/
            //$filter = array('$and'=>array(array('brand'=>$brand),array('model'=>$model),array('type'=>$type),array('detail.gender'=>$gender),array('detail.color'=>$color)));
            $filter = ['_id'=>new MongoDB\BSON\ObjectID($_id)];
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
                echo "<p class='card-text'> <b>Model</b><br>&ensp;&ensp;" . $row->model . "<p>" ;
                echo "<p class='card-text'> <b>Type</b><br>&ensp;&ensp;" . $row->type . "<p>" ;
                echo "<hr>";
                foreach ($row->detail as $detail) {
                    echo "<p class='card-text'> <b>Gender</b><br>&ensp;&ensp;" . $detail->gender . "<p>" ;
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
                echo '<form action="" method="POST">
                <button type="input" name="cancel" class="btn btn-warning update-btn"><i class="fas fa-window-close"></i> Cancel</button>
                </form>';
                echo '<form action="" method="POST">
                <input type="hidden" name="_id" value="' . $row->_id . '">
                <input type="hidden" name="brand" value="' . $row->brand . '">
                <input type="hidden" name="model" value="' . $row->model . '">
                <input type="hidden" name="type" value="' . $row->type . '">
                <input type="hidden" name="gender" value="' . $detail->gender . '">
                <input type="hidden" name="color" value="' . $detail->color . '">
                <button type="input" name="delete" class="btn btn-danger delete-btn"><i class="fas fa-trash-alt"></i> CONFIRM</button>
                </form>';
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        ?>
        <?php
            if(isset($_POST['delete'])){
                $conn = new MongoDB\Driver\Manager("mongodb+srv://Martkos:JPkM1FvFmfppg2pf@project-hwxde.mongodb.net/test?retryWrites=true&w=majority");
                $bulkWrite = new MongoDB\Driver\BulkWrite;
                $brand = $_POST['brand'];
                $model = $_POST['model'];
                $type = $_POST['type'];
                $gender = $_POST['gender'];
                $color = $_POST['color'];
                //$filter = array('$and'=>array(array('brand'=>$brand),array('model'=>$model),array('type'=>$type),array('detail.gender'=>$gender),array('detail.color'=>$color)));
                $filter = ['_id'=>new MongoDB\BSON\ObjectID($_id)];
                $options = ['limit'=>1];
                $bulkWrite->delete($filter, $options);
                $out = $conn->executeBulkWrite('Shoes.Shoes', $bulkWrite);
                if ($out) {
                    echo '<script type="text/javascript">alert("Record has been deleted."); window.location = "index.php";</script>';
                }else{
                    echo '<script type="text/javascript">alert("Failed to delete record.")</script>';
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