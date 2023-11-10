<?php
function connectDatabase()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "IMBERT-CHANSON";
    global $conn;

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

function disconnectDatabase()
{
    global $conn;
    $conn->close();
}

function getUserInfoFromLogin($usernameOrEmail, $password)
{
    global $conn, $loginError;
    $loginError = NULL;


    $query = "SELECT DISTINCT * FROM utilisateur 
    WHERE (pseudo = '" . $usernameOrEmail . "' OR email = '" . $usernameOrEmail . "')
    AND mot_de_passe = '" . $password . "'";

    try {
        $result = $conn->query($query);
        if ($result->num_rows == 0) {
            $loginError = "Erreur lors de la connexion, veuillez rééssayer";
        } else {
            return $result->fetch_assoc();
        }
    } catch (mysqli_sql_exception $e) {
        $loginError = $e->getMessage();
    }
}

function getUserInfoFromCookie($userID, $password)
{
    global $conn, $loginError;
    $loginError = NULL;


    $query = "SELECT * FROM utilisateur 
    WHERE (id = '" . $userID . "') AND mot_de_passe = '" . $password . "'";

    try {
        $result = $conn->query($query);
        return $result->fetch_assoc();
    } catch (mysqli_sql_exception $e) {
        $loginError = $e->getMessage();
    }
}


function registerUser($firstname, $lastname, $username, $email, $birthdate, $address, $password)
{
    global $conn, $loginError;
    $loginError = NULL;

    $query = "INSERT INTO utilisateur(nom, prenom, pseudo, email, date_naissance, adresse, mot_de_passe) 
    VALUES ('" . $lastname . "','" . $firstname . "','" . $username . "','" . $email . "','" . $birthdate . "','" . $address . "','" . $password . "')";

    try {
        $conn->query($query);
    } catch (mysqli_sql_exception $e) {
        $loginError = $e->getMessage();
    }
}

function updateUserInfo($userID, $firstname, $lastname, $username, $email, $birthdate, $address)
{
    global $conn, $updateError;
    $updateError = NULL;

    $query = "UPDATE utilisateur
    SET nom = '" . $lastname . "',prenom = '" . $firstname . "',pseudo = '" . $username . "',email = '" . $email . "', date_naissance = '" . $birthdate . "',adresse = '" . $address . "' WHERE id = '" . $userID . "'";

    try {
        $conn->query($query);
    } catch (mysqli_sql_exception $e) {
        $updateError = $e->getMessage();
    }
}
