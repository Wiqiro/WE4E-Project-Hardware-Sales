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
          <label for="fullname" class="margin">Full name</label>
          <label for="birthday" class="margin">Date de naissance</label>
          <label for="address" class="margin">Adresse</label>
          <label for="email" class="margin">Email</label>
          <label for="password" class="margin">Create password</label>
          <label for="confirmpassword" class="margin">Confirm password</label>
          <a href="commandes_precedentes.php"><button class="btn-animate-second">Commandes précédentes</button></a>
          <button class="btn-animate-second" class="margin">Fermer</button>
        </div>
        <form class="form-signup" action="" method="post" name="form">
          <label for="fullname">Full name</label>
          <input class="form-styling" type="text" name="email" value="A définir avec une var php" />
          <label for="birthday">Date de naissance</label>
          <input class="form-styling" type="text" name="birthday" value="" />
          <label for="address">Adresse</label>
          <input class="form-styling" type="text" name="address" value="" />
          <label for="email">Email</label>
          <input class="form-styling" type="text" name="dlno" value="" />
          <label for="password">Create password</label>
          <input class="form-styling" type="text" name="password" value="" />
          <label for="confirmpassword">Confirm password</label>
          <input class="form-styling" type="text" name="confirmpassword" value="" />
          <a ng-click="checked = !checked" class="btn-signup">MODIFIER</a>
          <button class="btn-animate-second">Fermer</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="js/popup.js"></script>
</body>

</html>