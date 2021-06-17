<?php
session_start();
?>
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
  <link rel="stylesheet" href="../css/style_client.css">
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
      <li class="nav-item" >
        <a class="nav-link" href="Dashboard_id=admin_consommation.php" >CONSOMMATION <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Dashboard_id=admin_production.php">PRODUCTION</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Dashboard_id=admin_batterie.php">CHARGE BATTERIE</a>
      </li>
      </div>
      <div class="justify-content-end navbar-collapse">
      <li class="nav-item  text-light">
      <img src="../images/home.png" style="margin:auto;margin-right:10px;" width="20" height="20" alt="">
      <a>
        <?php
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


<script type="text/javascript">
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
$req3 = "SELECT * FROM batterie_log;";

$row_etat_log=$row_production_log=$row_batterie_log=[];

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
        array_push($row_batterie_log ,$row);
    }
    $result3->free();
}

$conn->close();
?>

var etats = <?php echo json_encode($row_etat_log); ?>;
var prods = <?php echo json_encode($row_production_log); ?>;
var batt =<?php echo json_encode($row_batterie_log); ?>;
console.log(etats);
console.log(prods);
console.log(batt);

var prod_maison1 = [];
var prod_maison2 = [];

prods.forEach((k, i) => {
  if (prods[i].id_maison==1) {
    prod_maison1.push(prods[i].prod);
  }else {
    prod_maison2.push(prods[i].prod);
  }
});


console.log("production maison 1 :")
console.log(prod_maison1);
console.log("production maison 2 :")
console.log(prod_maison2);

</script>
  </body>
</html>
