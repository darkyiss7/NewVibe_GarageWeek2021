<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Vibe</title>
    <link rel="icon" href="../images/NewVibe_logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/css_formumaire.css">
    <script src="../scripts/script_formulaire.js" charset="utf-8"></script>
  </head>
  <body style="background-image: url('../images/login_body_bg.png');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
    <div class="container text-center slide" id='formulaire'>
      <h2 id="bienvenue" >Bienvenue !</h2>

      <form action="validation.php" method="POST">
        <div class="form-group">
          <label for="id" >ID :</label>
          <input type="text" class="form-control" id="id" placeholder="Entrez votre ID" name="id" required>
        </div>
        <div class="form-group">
          <label for="password">Mot de passe :</label>
          <input type="password" class="form-control" id="pwd" placeholder="Entrez votre mot de passe" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary" onclick="form_submit()">Valider</button>
      </form>

          <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>

    </div>


  </body>
</html>
