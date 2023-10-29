<?php
function addProductToCart($id, $quantity) {
    $cart = getCart();
    $cart[] = ["id" => $id, "quantity" => $quantity];
    setcookie("cart", json_encode($cart, true), time() + 48 * 3600);

}

function getCart() {
    if (isset($_COOKIE["cart"])) {
        return json_decode($_COOKIE["cart"], true);
    } else {
        return array();
    }
}

function getCartItemCount() {
    $cart = getCart();
    $count = 0;
    foreach ($cart as $item) {
        $count += $item["quantity"];
    }
    return $count;
}

function emptyCart() {
    unset($_COOKIE['cart']);    
    setcookie("cart", NULL, -1);
}
