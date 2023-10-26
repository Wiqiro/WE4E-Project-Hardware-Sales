<?php

require("../Controllers/login_cookies.php");
require("../Controllers/database_functions.php");
connectDatabase();

global $conn, $error, $userInfo, $loginSuccessful;

$loginAttempted = false;
$error = NULL;

//Données d'inscription reçues via le formulaire ?
if (isset($_POST["register-submit"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $birthdate = $_POST["birthdate"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    registerUser($firstname, $lastname, $username, $email, $birthdate, $address, $password);
    if ($error == NULL) {
        $userInfo = getUserInfoFromLogin($username, $password);
        $loginAttempted = true;
    }
}
//Données de connexion reçues via formulaire?
elseif (isset($_POST["user"]) && isset($_POST["password"])) {
    $formUserInput = $_POST["user"];
    $password = /* md5 */ ($_POST["password"]);
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