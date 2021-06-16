<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Vibe</title>
    <link rel="icon" href="../images/NewVibe_logo.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.min.css">*
  <style media="screen">
  body{
    background-color: #DDD;
  }

  nav div ul li {
    color: #EEE;
  }

  nav div div li{
    padding-left: 50px;
    font-size: 20px;
  }

  .navbar-brand{
    font-size: 30px;
  }

  #perc_don,#perc_conso,#perc_prod,#perc_rec{
    font-size: 50px;
  }

  .slide_right {
      animation-name: slide_right;
      -webkit-animation-name: slide_right;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
    }

  .slide_left{
        animation-name: slide_left;
        -webkit-animation-name: slide_left;
        animation-duration: 1s;
        -webkit-animation-duration: 1s;
        visibility: visible;
  }

    @keyframes slide_right {
      0% {
        opacity: 0;
        transform: translateX(30%);
      }
      100% {
        opacity: 1;
        transform: translateX(0%);
      }
    }
    @-webkit-keyframes slide_right {
      0% {
        opacity: 0;
        -webkit-transform: translateX(30%);
      }
      100% {
        opacity: 1;
        -webkit-transform: translateX(0%);
      }
    }

    @keyframes slide_left {
      0% {
        opacity: 0;
        transform: translateX(-30%);
      }
      100% {
        opacity: 1;
        transform: translateX(0%);
      }
    }

    @-webkit-keyframes slide_left {
      0% {
        opacity: 0;
        -webkit-transform: translateX(-30%);
      }
      100% {
        opacity: 1;
        -webkit-transform: translateX(0%);
      }
    }

  </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success" style="border-radius:0%;">
  <img src="../images/logo.png" width="50" height="50" alt="">
  <a class="navbar-brand" href="#">LISENVALLEY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse flex-row d-flex" id="navbarNavDropdown">
  <div>
    <ul class="navbar-nav">
      <li class="nav-item active" >
        <a class="nav-link" href="#">DASHBOARD</a>
      </li>
      <li class="nav-item" >
        <a class="nav-link" href="Dashboard_id=maison1_consommation.php" >CONSOMMATION <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Dashboard_id=maison1_production.php">PRODUCTION</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">DONNATION</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">RECEPTION</a>
      </li>
      </div>
      <div class="justify-content-end navbar-collapse">
      <li class="nav-item  text-light">
      <img src="../images/home.png" style="margin:auto;margin-right:10px;" width="20" height="20" alt="">
      <a>
        <?php
                session_start();
                if($_SESSION['id'] !== ""){
                    $user = $_SESSION['id'];
                    // afficher un message
                    echo "  $user ";
                }
            ?></a>
      </li>
    </ul>
    </div>
  </div>
</nav>

<div id="services" class="container-fluid text-center" >
  <br>
  <h1>DASHBOARD</h2>
  <br>
  <h2>Résumé des activités :</h4>
  <br><br>
  <div class="row ">
    <div class="col-sm-6 slide_left">
      <img src="../images/thunderbolt.png" width="120" height="120" alt="ENERGIE CONSOME"> <none id="perc_conso">n/a</none>
      <br>
      <h4>ENERGIE CONSOMMEE</h4>
      <p></p>
      <br><br><br><br>
    </div>

    <div class="col-sm-6 slide_right">
      <img src="../images/solar-panel.png" width="120" height="120" alt="ENERGIE PRODUITE"> <none id="perc_prod">n/a</none>
      <br>
      <h4>ENERGIE PRODUITE</h4>
      <p></p>
      <br><br><br><br>
    </div>

    <div class="col-sm-6 slide_left">
      <img src="../images/bolt.png" width="120" height="120" alt="ENERGIE RECUE"> <none id="perc_rec">0 J</none>
      <br>
      <h4>ENERGIE RECUE</h4>
      <p></p>
      <br><br><br><br>
  </div>

    <div class="col-sm-6 slide_right">
      <img src="../images/bolt.png"  width="120" height="120" alt="ENERGIE DONNEE"> <none id="perc_don">0 J</none>
      <br>
      <h4>ENERGIE DONNEE</h4>
      <p></p>
      <br><br><br><br>
    </div>
  </div>

</div>

<canvas hidden id="line-chart_1" width="800" height="450"></canvas>

<canvas hidden id="line-chart_2" width="800" height="450"></canvas>

<script type="text/javascript">

function data_update() {


<?php

$servername = "localhost";

// REPLACE with your Database name
$dbname = "new_vibe_db";
// REPLACE with Database user
$username = "root";
// REPLACE with Database user password
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$req1 = "SELECT * FROM production_log;";
$req2 = "SELECT * FROM etat_log;";
$req3 = "SELECT * FROM consommations_log WHERE id_maison = 1;";

$row_etat_log=$row_production_log=$row_conso_log=[];

if ($result1 = $conn->query($req1)) {
    while ($row = $result1->fetch_assoc()) {
        array_push($row_production_log,$row);

    }
    $result1->free();
}
if ($result2 = $conn->query($req2)) {
    while ($row = $result2->fetch_assoc()) {
        array_push($row_etat_log,$row);
    }
    $result2->free();
}
if ($result3 = $conn->query($req3)) {
    while ($row = $result3->fetch_assoc()) {
        array_push($row_conso_log ,$row);
    }
    $result3->free();
}

$conn->close();
?>

var etats = <?php echo json_encode($row_etat_log); ?>;
var prods = <?php echo json_encode($row_production_log); ?>;
var conso = <?php echo json_encode($row_conso_log); ?>;

console.log(etats);
console.log(prods);
console.log(conso);


var prod_maison1 = [];
var prod_maison2 = [];

prods.forEach((k, i) => {
  if (prods[i].id_maison==1) {
    prod_maison1.push(prods[i].prod);
  }else {
    prod_maison2.push(prods[i].prod);
  }
});

console.log(prod_maison1[prod_maison1.length-1]);
document.getElementById('perc_prod').innerHTML = prod_maison1[prod_maison1.length-1] +" J";
document.getElementById('perc_conso').innerHTML = conso[conso.length-1].conso +" J";


console.log("production maison 1 :")
console.log(prod_maison1);
console.log("production maison 2 :")
console.log(prod_maison2);

}

data_update();
setInterval(function () {
  data_update()
},5000);

</script>
  </body>
</html>
