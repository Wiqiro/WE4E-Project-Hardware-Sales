<?php
global $loginSuccessful, $userInfo, $loginAttempted;


require("../Controllers/initialize.php");
if ($loginSuccessful && $userInfo["admin"]) {
    header("Location: index_admin.php");
}
require("../Controllers/produits.php");
require("../Controllers/commandes.php");
include("carte_produit.php");
require("carte_commande.php");


$randomProds = getRandomProducts(8);
if ($loginSuccessful && $userInfo["id"]) {
    $lastCommand = getUserLastCommand($userInfo["id"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LDLD</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../Style/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../Style/styles.css" rel="stylesheet" />

</head>

<body id="page-top">
    <!-- Navigation-->
    <?php require("nav_bar.php"); ?>

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <?php if ($loginSuccessful) { ?>
                <div class="masthead-subheading">Bienvenue dans notre studio <?php echo $userInfo["pseudo"]; ?> !</div>
            <?php } else { ?>
                <div class="masthead-subheading">Bienvenue dans notre studio !</div>
            <?php } ?>
            <div class="masthead-heading text-uppercase">Prêt pour une nouvelle config ?</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="catalogue.php">C'est parti !</a>
        </div>
    </header>
    <?php if ($loginSuccessful && $lastCommand != null) { ?>
        <h3 class="mt-5 mb-4 text-center">Votre dernière commande</h3>
        <div class="container h-100">
            <div class="col">
                <?php showCommandCard($lastCommand, false); ?>
            </div>
        </div>
        <div class="center">
            <a href="commandes_precedentes.php"><button class="btn btn-primary btn-xl text-uppercase">Commandes</button></a>
        </div>
    <?php } ?>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                foreach ($randomProds as $product) {
                    showProductCard($product["id"], $product["nom"], $product["prix"], $product["image"]);
                }
                ?>
            </div>
            <div class="center">
                <a href="catalogue.php"><button class="btn btn-primary btn-xl text-uppercase">Voir plus</button></a>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <?php require("footer.php"); ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>