<?php
function createLoginCookie($userID, $password) {
    setcookie("id", $userID, time() + 48 * 3600);
    setcookie("password", $password, time() + 48 * 3600);
}

function destroyLoginCookie() {
    unset($_COOKIE['id']);
    unset($_COOKIE['password']);

    setcookie("id", NULL, -1);
    setcookie("password", NULL, -1);
}
