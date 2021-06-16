<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Vibe</title>
    <link rel="icon" href="../images/NewVibe_logo.png">

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
      <li class="nav-item active">
        <a class="nav-link" href="#">CONSOMMATION <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">PRODUCTION</a>
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

<div id="services" class="container-fluid text-center">
  <br>
  <h1>DASHBOARD</h2>
  <br>
  <h2>Résumé des activités :</h4>
  <br><br>
  <div class="row ">
    <div class="col-sm-6 slide_left">
      <img src="../images/thunderbolt.png" width="120" height="120" alt="ENERGIE CONSOME"> <none class="perc">n/a</none>
      <br>
      <h4>ENERGIE CONSOMMEE</h4>
      <p></p>
      <br><br><br><br>
    </div>

    <div class="col-sm-6 slide_right">
      <img src="../images/solar-panel.png" width="120" height="120" alt="ENERGIE PRODUITE"> <none class="perc">n/a</none>
      <br>
      <h4>ENERGIE PRODUITE</h4>
      <p></p>
      <br><br><br><br>
    </div>

    <div class="col-sm-6 slide_left">
      <img src="../images/bolt.png" width="120" height="120" alt="ENERGIE RECUE"> <none class="perc">n/a</none>
      <br>
      <h4>ENERGIE RECUE</h4>
      <p></p>
      <br><br><br><br>
  </div>

    <div class="col-sm-6 slide_right">
      <img src="../images/bolt.png"  width="120" height="120" alt="ENERGIE DONNEE"> <none class="perc">n/a</none>
      <br>
      <h4>ENERGIE DONNEE</h4>
      <p></p>
      <br><br><br><br>
    </div>


  </div>

</div>

  </body>
</html>
