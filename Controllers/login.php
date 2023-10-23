<?php
$formUserInput;
global $conn, $userID, $username, $loginSuccessful;

$loginAttempted = false;
$error = NULL;

//Données d'inscription reçues via le formulaire ?
if (isset($_POST["register-submit"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    register($firstname, $lastname, $username, $email, $password);
    if ($error == NULL) {
        createLoginCookie($username, $password);
        header("Refresh:0");
    }
}
//Données de connexion reçues via formulaire?
if (isset($_POST["user"]) && isset($_POST["password"])) {
    $formUserInput = $_POST["user"];
    $password = /* md5 */ ($_POST["password"]);
    $loginAttempted = true;
}
//Données via le cookie?
elseif (isset($_COOKIE["name"]) && isset($_COOKIE["password"])) {
    $formUserInput = $_COOKIE["name"];
    $password = $_COOKIE["password"];
    $loginAttempted = true;
} else {
    $loginAttempted = false;
}
//Si un login a été tenté, on interroge la BDD
if ($loginAttempted) {
    $query = "SELECT * FROM utilisateur 
    WHERE (pseudo = '" . $formUserInput . "' OR email = '" . $formUserInput . "')
    AND mot_de_passe = '" . $password . "'";

    $result = $conn->query($query);

    if ($result->num_rows != 0) {
        $row = $result->fetch_assoc();
        $userID = $row["id"];
        $username = $row["pseudo"];
        createLoginCookie($username, $password);
        $loginSuccessful = true;
    } else {
        $error = "Ce couple login/mot de passe n'existe pas. Créez un Compte";
    }
}
/* 
$resultArray = [
    'successful' => $loginSuccessful,
    'attempted' => $loginAttempted,
    'errorMessage' => $error,
    'userID' => $userID,
    'username' => $username
];
 */