<?php
function connectDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "LDLD";
    global $conn;

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

function disconnectDatabase() {
    global $conn;
    $conn->close();
}

function getUserInfoFromLogin($usernameOrEmail, $password) {
    global $conn, $error;

    $query = "SELECT * FROM utilisateur 
    WHERE (pseudo = '" . $usernameOrEmail . "' OR email = '" . $usernameOrEmail . "')
    AND mot_de_passe = '" . $password . "'";

    $result = $conn->query($query);
    if (!$result) {
        $error = "Erreur lors de l'inscription, veuillez rééssayer";
    }
    return $result->fetch_assoc();
}

function getUserInfoFromCookie($userID, $password) {
    global $conn, $error;

    $query = "SELECT * FROM utilisateur 
    WHERE (id = '" . $userID . "') AND mot_de_passe = '" . $password . "'";

    $result = $conn->query($query);
    if (!$result) {
        $error = "Erreur lors de l'inscription, veuillez rééssayer";
    }
    return $result->fetch_assoc();
}


function registerUser($firstname, $lastname, $username, $email, $birthdate, $address, $password) {
    global $conn, $error;
    $error = NULL;

    $query = "INSERT INTO utilisateur(nom, prenom, pseudo, email, date_naissance, adresse, mot_de_passe) 
    VALUES ('" . $lastname . "','" . $firstname . "','" . $username . "','" . $email . "','" . $birthdate . "','" . $address . "','" . $password . "')";

    $result = $conn->query($query);
    if (!$result) {
        $error = "Erreur lors de l'inscription, veuillez rééssayer";
    }
}

function updateUserInfo($firstname, $lastname, $username, $email, $birthdate, $address) {
    global $conn, $error;
    $error = NULL;

    $query = "UPDATE utilisateur(nom, prenom, pseudo, email, date_naissance, adresse, mot_de_passe) 
    VALUES ('" . $lastname . "','" . $firstname . "','" . $username . "','" . $email . "','" . $birthdate . "','" . $address . "')";

    $result = $conn->query($query);
    if (!$result) {
        $error = "Erreur lors de l'inscription, veuillez rééssayer";
    }
}
