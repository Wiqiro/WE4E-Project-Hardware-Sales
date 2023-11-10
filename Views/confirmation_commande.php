<?php
global $loginSuccessful, $userInfo, $error;

require("../Controllers/initialize.php");
require("../Controllers/produits.php");
include("../Controllers/commandes.php");
require("carte_commande.php");

$successful = false;

$products = getProductsFromCart(getCart());
if (count($products) != 0) {
    $commandID = command($userInfo["id"], $products);
    $command = getCommand($commandID);
    $successful = true;
    emptyCart();
} else {
    header("Location: panier.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../Style/assets/favicon.ico" />
    <title>Confirmation</title>
    <link href="../Style/styles.css" rel="stylesheet" />
</head>

<body>
    <?php require('nav_bar.php');
    if (!$error) {
    ?>
        <h1 style="margin-top: 5em;">Félicitation, votre commande a bien été enregistrée ! Merci pour votre confiance !</h1>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <?php showCommandCard($command, false); ?>
                </div>
            </div>
        </div>
    <?php } else {
        echo "<section><p class='color-red h5 center mb-5'>" . $error . "</p></section>";
    }
    ?>
    <div class="centerBtn">
        <a href="commandes_precedentes.php"><button class="btn btn-primary btn-xl text-uppercase center">Mes commandes</button></a>
    </div>
</body>

</html>