<?php
global $loginSuccessful, $userInfo;

require("../Controllers/initialize.php");
include("../Controllers/commandes.php");

$successful = false;

$products = getProductsFromCart(getCart());
if (count($products) != 0) {
    command($userInfo["id"], $products);
    $successful = true;
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
    <?php require('nav_bar.php'); ?>
    <h1 style="margin-top: 5em;">Félicitation ! Merci de votre commande !</h1>
    <?php //showCommandCard(null, true); 
    ?>
    <div class="centerBtn">
        <a href="commandes_precedentes.php"><button class="btn btn-primary btn-xl text-uppercase center">Mes commandes</button></a>
    </div>
</body>

</html>