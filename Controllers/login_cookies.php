<?php
function createLoginCookie($username, $password) {
    setcookie("name", $username, time() + 48 * 3600);
    setcookie("password", $password, time() + 48 * 3600);
}

function destroyLoginCookie() {
    unset($_COOKIE['name']);
    unset($_COOKIE['password']);

    setcookie("name", NULL, -1);
    setcookie("password", NULL, -1);
}
