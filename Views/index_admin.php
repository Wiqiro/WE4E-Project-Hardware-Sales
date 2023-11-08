<?php
global $loginSuccessful, $loginAttempted, $userInfo, $error;
include("../Controllers/initialize.php");
if ($loginAttempted && $loginSuccessful && !$userInfo["admin"]) {
  header("Location: index.php");
}

$loginError = $error;

include("../Controllers/commandes.php");
require("carte_commande.php");
$commands = getCommands();

$commandCount = count($commands);

$dayMoney = 1000;
$monthMoney = 2000;
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Page Gérant</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="../Style/style_index_admin.css" />
  <link href="../Style/styles.css" rel="stylesheet" />
</head>

<body>
  <?php require("nav_bar.php"); ?>
  <section>
    <h1 class="h1">Bienvenue sur la page administrateur</h1>
  </section>
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
                      <a class="btn-index-site" href="index.php"><button>Acceuil du site</button></a>
                      <br><br>
                      <h5>Stats de la journée</h5>
                      <p><?php echo $dayMoney; ?>$</p>
                      <h5>Stats du mois</h5>
                      <p><?php echo $monthMoney; ?>$</p>
                      <a href="gestion_catalogue.php"><button class="manage-btn">Gestion du catalogue</button></a>
                      <br>
                      <br>
                      <a href="gestion_produits.php"><button class="manage-btn">Gestion des produits</button></a>
                    </div>
                    <div class="col-lg-6">
                      <?php
                      foreach ($commands as $command) {
                        showCommandCard($command, true);
                      }
                      ?>
                      <a href="inventaire_commandes.php"><button class="manage-btn center">Voir toutes les commandes</button></a>
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
    <div class="container">
      <div class="frame frame-mid-short">
        <div class="signin-active center mg-top"><a class="btn" onclick="newUser()">Connexion</a></div>
        <div ng-app ng-init="checked = false">
          <form class="form-signin" action="" method="post" name="form">
            <label for="user">Nom d'utilisateur / email</label>
            <input class="form-styling" type="text" name="user" placeholder="adresse@example.com" />
            <label for="password">Mot de passe</label>
            <input class="form-styling" type="password" name="password" />
            <input type="checkbox" id="checkbox" />
            <label for="checkbox"><span class="ui"></span>J'accepte les conditions d'utilisation</label>
            <input type="submit" class="btn-animate-second" value="Se connecter" name="login-submit" />
            <button class="btn-animate-second">Fermer</button>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php require("footer.php"); ?>
</body>

</html>