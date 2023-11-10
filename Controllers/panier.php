<?php
function addProductToCart($id, $quantity) {
    $cart = getCart();

    foreach ($cart as &$item) {
        if ($item["id"] == $id) {
            $item["quantity"] += $quantity;
            setCart($cart);
            return;
        }
    }

    $cart[] = ["id" => $id, "quantity" => $quantity];
    setCart($cart);
}

function getCart() {
    if (isset($_COOKIE["cart"])) {
        return json_decode($_COOKIE["cart"], true);
    } else {
        return array();
    }
}

function setCart($cart) {
    setcookie("cart", json_encode($cart, true), time() + 48 * 3600);
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

function removeCartItem($id) {
    $cart = getCart();
    $cart = array_filter($cart, function ($item) use ($id) {
        return $item["id"] != $id;
    });
    setCart(array_values($cart));
}
