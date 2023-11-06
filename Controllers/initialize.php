<?php

require("../Controllers/login_cookies.php");
require("../Controllers/database_functions.php");
require("../Controllers/panier.php");

connectDatabase();

global $conn, $error, $userInfo, $loginSuccessful;

$loginAttempted = false;
$error = NULL;

if (isset($_POST["disconnect"])) {
    destroyLoginCookie();
}
//Données d'inscription reçues via le formulaire ?
elseif (isset($_POST["register-submit"])) {
    if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["birthdate"]) && isset($_POST["address"]) && isset($_POST["password"])) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $birthdate = $_POST["birthdate"];
        $address = $_POST["address"];
        $password = md5($_POST["password"]);
        registerUser($firstname, $lastname, $username, $email, $birthdate, $address, $password);
        if ($error == NULL) {
            $userInfo = getUserInfoFromLogin($username, $password);
            $loginAttempted = true;
        }
    } else {
        $error = "Erreur lors de l'inscrition, veuillez rééssayer";
    }
} elseif (isset($_POST["update-submit"])) {
    if (isset($_COOKIE["id"]) && isset($_COOKIE["password"])) {
        $userID = $_COOKIE["id"];
        $password = $_COOKIE["password"];
        if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["birthdate"]) && isset($_POST["address"]) && isset($_POST["password"]) && $password == $_POST["password"]) {
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            $birthdate = $_POST["birthdate"];
            $address = $_POST["address"];
            updateUserInfo($userID, $firstname, $lastname, $username, $email, $birthdate, $address);
        } else {
            $error = "Erreur lors de la mise à jour du profil, veuillez rééssayer";
        }
        $userInfo = getUserInfoFromCookie($userID, $password);
        $loginAttempted = true;
    } else {
        $error = "Erreur lors de la mise à jour du profil, veuillez rééssayer";
    }
}
//Données de connexion reçues via formulaire?
elseif (isset($_POST["user"]) && isset($_POST["password"])) {
    $formUserInput = $_POST["user"];
    $password = md5($_POST["password"]);
    $userInfo = getUserInfoFromLogin($formUserInput, $password);
    $loginAttempted = true;
}
//Données via le cookie?
elseif (isset($_COOKIE["id"]) && isset($_COOKIE["password"])) {
    $userID = $_COOKIE["id"];
    $password = $_COOKIE["password"];
    $userInfo = getUserInfoFromCookie($userID, $password);
    $loginAttempted = true;
} else {
    $loginAttempted = false;
}

if ($loginAttempted && $error == NULL) {
    createLoginCookie($userInfo["id"], $userInfo["mot_de_passe"]);
    $loginSuccessful = true;
}
