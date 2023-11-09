<?php
global $loginSuccessful, $loginAttempted, $userInfo, $error;
include("../Controllers/initialize.php");

if ($loginAttempted && $loginSuccessful && !$userInfo["admin"]) {
  header("Location: index.php");
}

$loginError = $error;

include("../Controllers/commandes.php");
require("carte_commande.php");

if (isset($_POST["delete-command"]) && isset($_POST["command-id"])) {
  deleteCommand($_POST["command-id"]);
}

$commands = array_slice(getCommands(1), 0, 5);
$commandCount = count($commands);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" type="image/x-icon" href="../Style/assets/favicon.ico" />
  <title>Page Gérant</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="../Style/style_index_admin.css" />
  <link rel="stylesheet" href="../Style/popup_style.css">

  <link href="../Style/styles.css" rel="stylesheet" />
</head>

<body>
  <?php require("nav_bar.php"); ?>
  <div class="mgTop">
    <h1 class="h1">Bienvenue sur la page administrateur</h1>
  </div>
  <?php if ($loginSuccessful) { ?>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">

              <div class="row">
                <div class="col-lg-12 center">
                  <div class="row">
                    <div class="col-lg-6">
                      <h5 class="mb-3">
                        <a href="index.php" class="text-body">
                          <i class="fas fa-long-arrow-alt-left me-2"></i>
                          Accueil du site
                        </a>
                      </h5>
                      <hr>
                      <br><br>
                      <h5>Chiffre de la journée</h5>
                      <p><?php echo dayRevenue() ?>$</p>
                      <h5>Chiffre du mois</h5>
                      <p><?php echo monthRevenue() ?>$</p>
                      <a href="gestion_catalogue.php"><button class="generalBtn">Gestion du catalogue</button></a>
                      <br>
                      <br>
                      <a href="gestion_produits.php"><button class="generalBtn">Gestion des produits</button></a>
                    </div>
                    <div class="col-lg-6">
                      <p class="h5 ">Dernières commandes</p>
                      <hr>
                      <?php
                      foreach ($commands as $command) {
                        showCommandCard($command, true);
                      }
                      ?>
                      <a href="inventaire_commandes.php?page=1"><button class="generalBtn center">Voir toutes les commandes</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } else {
    if ($loginAttempted) {
      echo "<p class='color-red h5 center mb-5'>" . $loginError . "</p>";
    }
  ?>
    <div class="centerBtn">
      <p>Vous êtes ici sur la page administrateur de ce site web. Celle-ci n'est accessible qu'au membre administrateur. Veuillez retourner sur la page d'accueil en cliquant sur le lien ci-dessous :</p>
      <a href="index.php"><button class="generalBtn">Accueil du site</button></a>
    </div>

    <div class="container">
      <div class="frame frame-mid-short">
        <div class="signin-active center mg-top"><a class="btn" onclick="newUser()">Connexion</a></div>
        <div ng-app ng-init="checked = false">
          <form class="form-signin" action="" method="post" name="form">
            <label for="user">Nom administrateur / email</label>
            <input class="form-styling" type="text" name="user" placeholder="adresse@example.com" />
            <label for="password">Mot de passe</label>
            <input class="form-styling" type="password" name="password" />
            <input type="checkbox" id="checkbox" />
            <input type="submit" class="btn-animate-second" value="Se connecter" name="login-submit" />
          </form>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php require("footer.php"); ?>
</body>

</html>