<?php
function connectDatabase()
{
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

function createCatalog($catalogName)
{
    global $conn, $error;
    $error = NULL;
    $query = "INSERT INTO catalogue(nom) VALUES ('" . $catalogName . "')";

    try {
        $conn->query($query);
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
    }
}

function removeCatalog($id)
{
    global $conn, $error;
    $error = NULL;
    $query = "DELETE FROM catalogue WHERE id = '" . $id . "'";

    try {
        $conn->query($query);
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
    }
}

function renameCatalog($id, $newName)
{
    global $conn, $error;
    $error = NULL;
    $query = "UPDATE catalogue SET nom='" . $newName . "' WHERE id = '" . $id . "'";

    try {
        $conn->query($query);
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
    }
}

function getCatalogList()
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT C.id AS id, C.nom AS nom, COUNT(P.id) AS nb_produits FROM catalogue AS C LEFT JOIN produit AS P ON C.id = P.id_catalogue GROUP BY C.id";

    try {
        $result = $conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
    }
}

function getCatalogSize($catalogID)
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT COUNT(*) as taille FROM produit WHERE id_catalogue = " . $catalogID;

    try {
        $result = $conn->query($query);
        return $result->fetch_assoc()["taille"];
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
    }
}
