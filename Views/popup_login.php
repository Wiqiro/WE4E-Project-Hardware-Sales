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
                    <li class="signin-active"><a class="btn" onclick="newUser()">Connexion</a></li>
                    <li class="signup-inactive"><a class="btn" onclick="newUser()">Inscription</a></li>
                </ul>
            </div>
            <div ng-app ng-init="checked = false">
                <form class="form-signin" action="" method="post" name="form">
                    <label for="user">Nom d'utilisateur / email</label>
                    <input class="form-styling" type="text" name="user" placeholder="adresse@example.com" />
                    <label for="password">Mot de passe</label>
                    <input class="form-styling" type="password" name="password"/>
                    <input type="checkbox" id="checkbox" />
                    <label for="checkbox"><span class="ui"></span>J'accepte les conditions d'utilisation</label>
                    <input type="submit" class="btn-animate-second" value="Se connecter" name="login-submit"/>
                    <button class="btn-animate-second">Fermer</button>
                </form>
                <form class="form-signup" action="#" method="post" name="form">
                    <label for="firstname">Prénom</label>
                    <input class="form-styling" type="text" name="firstname" placeholder="Prenom" />
                    <label for="lastname">Nom</label>
                    <input class="form-styling" type="text" name="lastname" placeholder="Nom" />
                    <label for="username">Nom d'utilisateur</label>
                    <input class="form-styling" type="text" name="username" placeholder="Pseudo" />
                    <label for="email">Email</label>
                    <input class="form-styling" type="email" name="email" placeholder="adresse@example.com" />
                    <label for="birthdate">Date de naissance</label>
                    <input class="form-styling" type="date" name="birthdate" placeholder="10/11/1953" />
                    <label for="address">Adresse</label>
                    <input class="form-styling" type="text" name="address" placeholder="1 rue de la Montagne, Belfort" />
                    <label for="password">Mot de passe</label>
                    <input class="form-styling" type="password" name="password" />
                    <label for="confirmpassword">Mot de passe (confirmer)</label>
                    <input class="form-styling" type="password" name="confirmpassword" />
                    <input type="submit" class="btn-animate-second" value="S'inscrire" name="register-submit"/>
                    <button class="btn-animate-second">Fermer</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/popup.js"></script>
</body>

</html>