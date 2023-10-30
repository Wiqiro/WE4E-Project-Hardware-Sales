<?php
global $loginSuccessful, $userInfo;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Navigation</title>
    <!-- JSQuery -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> -->
    <!-- BootStrap -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php">LD<span class="color-red">LD</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="catalogues.php">Catalogue</a></li>
                    <?php if ($loginSuccessful == false) { ?>
                        <li class="nav-item"><a class="nav-link cursor" onclick="openPopup()">Login</a></li>
                    <?php } else { ?>
                        <li class="nav-item hover-properties">
                            <a class="nav-link cursor" onclick="openAccount()">Compte</a>
                            <div class="logout-popup">
                                <?php echo $userInfo['prenom'], ' ', $userInfo['nom']; ?>
                                <br>
                                <form action="" method="POST">
                                    <input type="submit" class="btn-logout" value="Se déconnecter" name="disconnect" />
                                </form>
                            </div>
                        </li>
                    <?php } ?>
                    <div class="d-flex">
                        <a href="panier.php">
                            <button class="btn btn-outline-light" type="button">
                                <!-- <i class="bi-cart-fill me-1"></i> -->
                                Panier
                                <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo getCartItemCount() ?></span>
                            </button>
                        </a>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <section id="popup" class="popup"><?php require("popup_login.php"); ?></section>
    <section id="account" class="account"><?php require("compte.php"); ?></section>
    <!-- <script src="js/popup.js"></script> -->
</body>

</html>