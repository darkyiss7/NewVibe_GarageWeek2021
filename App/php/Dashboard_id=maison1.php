<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="../images/NewVibe_logo.png">

    <title>Lisen Valley</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../css/style_client.css">

  </head>
  <body>

    <nav class="navbar navbar-default" style="background-color: #CCC; box-shadow: 0px 0px 10px 0px black;">
  <div class="container-fluid ">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand">Lisen Valley</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">


      <li><a class="aa" href="#">Consomation d'énergie</a></li>
      <li><a href="#">Production d'énergie</a></li>
      <li><a href="#">Donnation d'énergie</a></li>
      <li><a href="#">Energie reçue</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">

      <li><a class="well"><?php
                session_start();
                if($_SESSION['id'] !== ""){
                    $user = $_SESSION['id'];
                    // afficher un message
                    echo "Compte : $user ";
                }
            ?></a></li>

    </ul>
  </div>
  </div>
</nav>




<div id="services" class="container-fluid text-center">
  <h2>DASHBOARD</h2>
  <h4>Résumé des activités :</h4>
  <br><br>
  <div class="row ">
    <div class="col-sm-6 slide_left">
      <img src="../images/elec.png" alt="ENERGIE CONSOME"> <none class="perc">n/a</none>
      <h4>ENERGIE CONSOMMEE</h4>
      <p></p>
      <br><br><br><br>
    </div>

    <div class="col-sm-6 slide_right">
      <img src="../images/solar_panel.png" alt="ENERGIE PRODUITE"> <none class="perc">n/a</none>
      <h4>ENERGIE PRODUITE</h4>
      <p></p>
      <br><br><br><br>
    </div>

    <div class="col-sm-6 slide_left">
      <img src="../images/elec_rec.png" alt="ENERGIE RECUE"> <none class="perc">n/a</none>
      <h4>ENERGIE RECUE</h4>
      <p></p>
      <br><br><br><br>
  </div>

    <div class="col-sm-6 slide_right">
      <img src="../images/elec_send.png" alt="ENERGIE DONNEE"> <none class="perc">n/a</none>
      <h4>ENERGIE DONNEE</h4>
      <p></p>
      <br><br><br><br>
    </div>


  </div>

</div>

  </body>
</html>
