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
    global $conn, $error;
    $error = NULL;


    $query = "SELECT DISTINCT * FROM utilisateur 
    WHERE (pseudo = '" . $usernameOrEmail . "' OR email = '" . $usernameOrEmail . "')
    AND mot_de_passe = '" . $password . "'";

    $result = $conn->query($query);
    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la connexion, veuillez rééssayer";
    }
    return $result->fetch_assoc();
}

function getUserInfoFromCookie($userID, $password)
{
    global $conn, $error;
    $error = NULL;


    $query = "SELECT * FROM utilisateur 
    WHERE (id = '" . $userID . "') AND mot_de_passe = '" . $password . "'";

    $result = $conn->query($query);
    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la connexion, veuillez rééssayer";
    }
    return $result->fetch_assoc();
}


function registerUser($firstname, $lastname, $username, $email, $birthdate, $address, $password)
{
    global $conn, $error;
    $error = NULL;

    $query = "INSERT INTO utilisateur(nom, prenom, pseudo, email, date_naissance, adresse, mot_de_passe) 
    VALUES ('" . $lastname . "','" . $firstname . "','" . $username . "','" . $email . "','" . $birthdate . "','" . $address . "','" . $password . "')";

    $result = $conn->query($query);
    if (!$result) {
        $error = "Erreur lors de l'inscription, veuillez rééssayer";
    }
}

function updateUserInfo($userID, $firstname, $lastname, $username, $email, $birthdate, $address)
{
    global $conn, $error;
    $error = NULL;

    $query = "UPDATE utilisateur
    SET nom = '" . $lastname . "',prenom = '" . $firstname . "',pseudo = '" . $username . "',email = '" . $email . "', date_naissance = '" . $birthdate . "',adresse = '" . $address . "' WHERE id = '" . $userID . "'";

    $result = $conn->query($query);
    if (!$result) {
        $error = "Erreur lors de la mise à jour du profil, veuillez rééssayer";
    }
}

function createCatalog($catalogName)
{
    global $conn, $error;
    $error = NULL;
    $query = "INSERT INTO catalogue(nom) VALUES ('" . $catalogName . "')";
    $result = $conn->query($query);
    if (!$result) {
        $error = "Erreur lors de la création du catalogue, veuillez rééssayer";
    }
}

function removeCatalog($id)
{
    global $conn, $error;
    $error = NULL;
    $query = "DELETE FROM catalogue WHERE id = '" . $id . "'";
    $result = $conn->query($query);
    if (!$result) {
        $error = "Erreur lors de la suppression du catalogue " . $id . ", veuillez rééssayer";
    }
}

function renameCatalog($id, $newName)
{
    global $conn, $error;
    $error = NULL;
    $query = "UPDATE catalogue SET nom='" . $newName . "' WHERE id = '" . $id . "'";
    $result = $conn->query($query);
    if (!$result) {
        $error = "Erreur lors de la suppression du catalogue " . $id . ", veuillez rééssayer";
    }
}

function getCatalogList()
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT C.id AS id, C.nom AS nom, COUNT(P.id) AS nb_produits FROM catalogue AS C LEFT JOIN produit AS P ON C.id = P.id_catalogue GROUP BY C.id";
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getCatalogSize($catalogID)
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT COUNT(*) as taille FROM produit  WHERE id_catalogue = " . $catalogID;
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_assoc()["taille"];
}


function getCommandProducts($commandID)
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT P.id, P.nom, C.quantite FROM contenu_commande AS C INNER JOIN produit AS P ON C.id_produit = P.id WHERE C.id_commande = " . $commandID;
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}
