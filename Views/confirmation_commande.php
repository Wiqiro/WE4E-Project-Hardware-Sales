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