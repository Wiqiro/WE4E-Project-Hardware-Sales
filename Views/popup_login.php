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
                    <li class="signin-active"><a class="btn" onclick="newUser()">Existing User</a></li>
                    <li class="signup-inactive"><a class="btn" onclick="newUser()">New User</a></li>
                </ul>
            </div>
            <div ng-app ng-init="checked = false">
                <form class="form-signin" action="#" method="post" name="form">
                    <label for="user">Nom d'utilisateur / email</label>
                    <input class="form-styling" type="text" name="user" placeholder="" />
                    <label for="password">Mot de passe</label>
                    <input class="form-styling" type="text" name="password" placeholder="" />
                    <input type="checkbox" id="checkbox" />
                    <label for="checkbox"><span class="ui"></span>Keep me signed in</label>

                    <div class="btn-animate">
                        <a class="btn-signin">Login to your account</a>
                    </div>
                    <button type="submit" class="btn-animate-second">Fermer</button>
                </form>
                <form class="form-signup" action="" method="post" name="form">
                    <label for="fullname">Full name</label>
                    <input class="form-styling" type="text" name="email" placeholder="" />
                    <label for="birthday">Date de naissance</label>
                    <input class="form-styling" type="text" name="birthday" placeholder="" />
                    <label for="address">Adresse</label>
                    <input class="form-styling" type="text" name="address" placeholder="" />
                    <label for="email">Email</label>
                    <input class="form-styling" type="text" name="dlno" placeholder="" />
                    <label for="password">Create password</label>
                    <input class="form-styling" type="text" name="password" placeholder="" />
                    <label for="confirmpassword">Confirm password</label>
                    <input class="form-styling" type="text" name="confirmpassword" placeholder="" />
                    <a ng-click="checked = !checked" class="btn-signup">REGISTER</a>
                    <button class="btn-animate-second">Fermer</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/popup.js"></script>
</body>

</html>