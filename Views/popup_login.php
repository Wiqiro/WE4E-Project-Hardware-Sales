<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style></style>
    <title>Document</title>
    <link rel="stylesheet" href="../Style/popup_style.css">
</head>

<body>
    <div class="container">
        <div class="frame">
            <div class="nav">
                <ul class="links">
                    <li class="signin-active"><a class="btn" onclick="newUser()">Connexion</a></li>
                    <li class="signup-inactive"><a class="btn" onclick="newUser()">Inscription</a></li>
                </ul>
            </div>
            <div ng-app ng-init="checked = false">
                <form class="form-signin" action="" method="post" name="form">
                    <label for="user">Nom d'utilisateur / email</label>
                    <input class="form-styling" type="text" name="user" placeholder="adresse@example.com" minlength="6" required />
                    <label for="password">Mot de passe</label>
                    <input class="form-styling" type="password" name="password" minlength="6" required/>
                    <p class="error mb-3"><?php if (isset($error)) echo $error ?></p>

                    <input type="submit" class="btn-animate-second" value="Se connecter" name="login-submit" />
                    <button type="button" class="btn-animate-second" onclick="closePopup()">Fermer</button>
                </form>
                <form class="form-signup" id="form-signup" action="#" method="post" name="form" onsubmit="return verificationPassword()">
                    <label for="firstname">Prénom</label>
                    <input class="form-styling" type="text" name="firstname" placeholder="Prenom" minlength="4" required />
                    <label for="lastname">Nom</label>
                    <input class="form-styling" type="text" name="lastname" placeholder="Nom" minlength="4" required />
                    <label for="username">Nom d'utilisateur</label>
                    <input class="form-styling" type="text" name="username" placeholder="Pseudo" minlength="6" required />
                    <label for="email">Email</label>
                    <input class="form-styling" type="email" name="email" placeholder="adresse@example.com" minlength="8" required />
                    <label for="birthdate">Date de naissance</label>
                    <input class="form-styling" type="date" name="birthdate" max="2020-01-01" min="1900-01-01" required />
                    <label for="address">Adresse</label>
                    <input class="form-styling" type="text" name="address" placeholder="1 rue de la Montagne, Belfort" minlength="10" required />
                    <label for="password">Mot de passe</label>
                    <input class="form-styling" type="password" name="password" id="password" minlength="6" required />
                    <label for="confirmpassword">Mot de passe (confirmer)</label>
                    <input class="form-styling" type="password" name="confirmpassword" id="confirmpassword" minlength="6" required />
                    <p class="error mb-3" id="errorMessage"></p>
                    <input type="submit" class="btn-animate-second" value="S'inscrire" name="register-submit" />
                    <button type="button" class="btn-animate-second" onclick="closePopup()">Fermer</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/popup.js"></script>
    <script src="js/verification_password.js"></script>
</body>

</html>