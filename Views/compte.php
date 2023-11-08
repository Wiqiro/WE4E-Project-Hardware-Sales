<?php

global $userInfo;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style></style>
  <title>Document</title>
  <link rel="stylesheet" href="../Style/popup_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"> -->
</head>

<body>
  <div class="container">
    <div class="frame">
      <div class="nav">
        <ul class="links">
          <li class="signin-active"><a class="btn" onclick="newUser()">Mes informations</a></li>
          <li class="signup-inactive"><a class="btn" onclick="newUser()">Modifier</a></li>
        </ul>
      </div>
      <div ng-app ng-init="checked = false">
        <div class="form-signin center">

          <label for="firstname" class="margin">Prénom: <?php echo $userInfo["prenom"] ?></label>
          <label for="lastname" class="margin">Nom: <?php echo $userInfo["nom"] ?></label>
          <label for="username" class="margin">Nom d'utilisateur: <?php echo $userInfo["pseudo"] ?></label>
          <label for="email" class="margin">Email: <?php echo $userInfo["email"] ?></label>
          <label for="birthdate" class="margin">Date de naissance: <?php echo $userInfo["date_naissance"] ?></label>
          <label for="address" class="margin">Adresse: <?php echo $userInfo["adresse"] ?></label>
          <?php if ($userInfo["admin"]) { ?>
            <a href="index_admin.php"><button class="btn-signup">Gestion du site</button></a>
          <?php } else { ?>
            <a href="commandes_precedentes.php"><button class="btn-signup">Commandes précédentes</button></a>
          <?php } ?>
          <button type="button" class="btn-animate-second" onclick="closeAccount()">Fermer</button>

          <form action="" method="POST">
            <input type="submit" class="btn-animate-second" value="Se déconnecter" name="disconnect" />
          </form>

        </div>
        <form class="form-signup" action="" method="post" name="form">
          <label for="firstname">Prénom</label>
          <input class="form-styling" type="text" name="firstname" value=<?php echo $userInfo["prenom"] ?> />
          <label for="lastname">Nom</label>
          <input class="form-styling" type="text" name="lastname" value=<?php echo $userInfo["nom"] ?> />
          <label for="username">Nom d'utilisateur</label>
          <input class="form-styling" type="text" name="username" value=<?php echo $userInfo["pseudo"] ?> />
          <label for="email">Email</label>
          <input class="form-styling" type="email" name="email" value=<?php echo $userInfo["email"] ?> />
          <label for="birthdate">Date de naissance</label>
          <input class="form-styling" type="date" name="birthdate" value=<?php echo $userInfo["date_naissance"] ?> />
          <label for="address">Adresse</label>
          <input class="form-styling" type="text" name="address" value=<?php echo $userInfo["adresse"] ?> />
          <label for="password">Entrez votre mot de passe pour valider</label>
          <input class="form-styling" type="password" name="password" value="" />
          <input type="submit" class="btn-animate-second" value="Mettre à jour" name="update-submit" />
          <button type="button" class="btn-animate-second" onclick="closeAccount()">Fermer</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="js/popup.js"></script>
  
</body>

</html>