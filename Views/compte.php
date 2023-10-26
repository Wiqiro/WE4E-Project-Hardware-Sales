<?php
global $firstname, $lastname, $username, $email, $birthdate, $address;


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

          <label for="firstname" class="margin"><?php echo $firstname ?></label>
          <label for="lastname" class="margin"><?php echo $lastname ?></label>
          <label for="username" class="margin"><?php echo $username ?></label>
          <label for="birthdate" class="margin"><?php echo $birthdate ?></label>
          <label for="address" class="margin"><?php echo $address ?></label>
          <label for="email" class="margin"><?php echo $email ?></label>
          <a href="commandes_precedentes.php"><button class="btn-signup">Commandes précédentes</button></a>
          <button class="btn-animate-second" id="closeaccount" onclick="closeAccount()">Fermer</button>

        </div>
        <form class="form-signup" action="" method="post" name="form">
          <label for="firstname">Full name</label>
          <input class="form-styling" type="text" name="firstname" value=<?php echo $firstname ?> />
          <label for="lastname">Full name</label>
          <input class="form-styling" type="text" name="lastname" value=<?php echo $lastname ?> />
          <label for="username">Nom d'utilisateur</label>
          <input class="form-styling" type="text" name="username" value=<?php echo $username ?> />
          <label for="birthdate">Date de naissance</label>
          <input class="form-styling" type="date" name="birthdate" value=<?php echo $birthdate ?> />
          <label for="email">Email</label>
          <input class="form-styling" type="email" name="email" value=<?php echo $email ?> />
          <label for="address">Adresse</label>
          <input class="form-styling" type="text" name="address" value=<?php echo $address ?> />
          <label for="password">Nouveau mot de passe (optionnel)</label>
          <input class="form-styling" type="password" name="password" value="" />
          <label for="confirmpassword">Nouveau mot de passe (confirmer)</label>
          <input class="form-styling" type="password" name="confirmpassword" value="" />
          <input type="submit" class="btn-animate-second" value="Mettre à jour" name="update-submit"/>
          <button class="btn-animate-second">FERMER</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="js/popup.js"></script>
</body>

</html>