<?php
$isLogin = true;
$isAdmin = true;
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
</head>

<body>
  <h1>Bienvenue sur la page administrateur</h1>
  <?php if ($isLogin) { ?>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">

          <div class="card">
            <div class="card-body p-4">

              <div class="row">
                <div class="col-lg-12 center">
                  <div class="row">
                    <div class="col-lg-6">
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
                      <?php require("carte_commande.php"); ?>
                      <?php require("carte_commande.php"); ?>
                      <?php require("carte_commande.php"); ?>
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
  <?php } else { ?>
    <div class="container">
      <div class="frame">
        <h2 class="signin">Se connecter</h2>
        <form class="form-signin" action="" method="post" name="form">
          <label for="fullname">Email</label>
          <input class="form-styling" type="text" name="username" placeholder="" />
          <label for="password">Mot de passe</label>
          <input class="form-styling" type="text" name="password" placeholder="" />
          <input type="checkbox" id="checkbox" />
          <label for="checkbox"><span class="ui"></span>Keep me signed in</label>

          <div class="btn-animate">
            <a class="btn-signin">Login to your account</a>
          </div>
      </div>
    </div>
  <?php } ?>

  <?php require("footer.php"); ?>
</body>

</html>