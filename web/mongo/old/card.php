<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/color.css">
    <title>test file</title>
    <style>
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
            right: 100;
        }
        .delete-btn {
            position: absolute;
            right: 25;
        }
    </style>
</head>
<body>
    <?php
        $conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        //$filter = ["brand"=>"New Balance"];
        //$filter += ["detail.color"=>"Black"];
        $filter = [];
        $query = new MongoDB\Driver\Query($filter);
        $rows = $conn->executeQuery("PND_Project.shoes", $query);

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
            echo "<p class='id-no' style='text-align: right; color: rgb(200, 200, 200);'>ID: " . $row->id . "<br></p>";//debug
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
                echo '<button type="button" class="btn btn-success update-btn">Update</button> <button type="button" class="btn btn-danger delete-btn">Delete</button>';
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
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    ?>
</body>
</html>