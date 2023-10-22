<?php
$formUserInput;
global $conn, $userID, $username, $loginSuccessful;

$loginSuccessful = false;
$error = NULL;


//Données reçues via formulaire?
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