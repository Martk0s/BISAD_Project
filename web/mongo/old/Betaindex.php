<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/color.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>PND_PROJECT</title>
</head>
<style>
    /* Head container */
    .container-classa {
    background-image: url('/img/head.jpg');
    background-repeat: no-repeat;
    background-position: top;
    width: 50%;
    height: 300px;
    border: 2px dashed #333;
    border-radius: 25px;
    position: relative;
    top: 80px;
    margin: 0 auto;
    }
    h4 {
        font-size: 80px;
        color:white;
    }
    .container{
        position: relative;
        margin: 0 auto;
        border: 2px dashed #333;
        border-radius: 25px;
    }
</style>
<body>
    <div class = "container-classa">
        <h4 class="head"><br><center>SHOE</center></h4>
    </div>
    <br><br><br><br><br><br>
    <div class="container">
    <form action="" method="POST" class="form-group">
    <center><div class="row">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
        <div class="col-xl-3 col-lg-4 col-md-6">
        <br><br>
        <label for="brand">Brand&ensp;:&ensp; </label>
        <select name='brand' id='brand' class="form-control" style="width: 180px; display: inline;">
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
        </select><br><br>

        <label for="brand">Type&ensp;:&ensp; </label>
        <select name='type' id='type' class="form-control" style="width: 180px; display: inline;">
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
        <br><br>
        
        </div>
        &ensp;&ensp;
        <div class="col-xl-3 col-lg-4 col-md-6">
        <br><br>
        <!-- GENDER -->
        <label for="Gender">Gender&ensp;:&ensp; </label>
        <!-- MALE -->
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="Male">
            <label class="custom-control-label" for="Male">M</label>
        </div>

        <!-- FEMALE -->
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="Female">
            <label class="custom-control-label" for="Female">F</label>
        </div>
        <!-- END GENDER --><br><br>
        <!-- SIZE -->
        <label for="Size">Size&ensp;:&ensp; </label>
        <!-- US -->
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="US">
            <label class="custom-control-label" for="US">US</label>
        </div>
        <!-- UK -->
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="UK">
            <label class="custom-control-label" for="UK">UK</label>
        </div>
        <!-- EU -->
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="EU">
            <label class="custom-control-label" for="EU">EU</label>
        </div>
        <!-- END SIZE -->
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6">
            <br><br>
            <!-- SIZE -->
            <select name='brand' id='brand' class="form-control" style="width: 180px; display: inline;">
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
    </div></center><!-- row -->
    </form>
    </div><!-- Container -->
    <hr style="width: 1200px;size: 4px;">
</body>
</html>