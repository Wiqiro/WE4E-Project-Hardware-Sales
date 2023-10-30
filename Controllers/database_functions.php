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


    $query = "SELECT DISTINCT * FROM utilisateur 
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

function getBrandList()
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT * FROM marque";
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}



function addProduct($name, $description, $price, $catalogID, $brandID, $specs)
{
    global $conn, $error;
    $error = NULL;
    $query = "INSERT INTO produit(nom, description, id_marque, id_catalogue) VALUES ('" . $name . "','" . $description . "'," . $catalogID . "," . $brandID . ");";
    $result = $conn->query($query);

    $query = "SELECT LAST_INSERT_ID() as ID";
    $result = $conn->query($query);
    $prodID = $result->fetch_assoc()["ID"];

    $query = "INSERT INTO historique_prix(prix, id_produit) VALUES (" . $price . "," . $prodID . ")";
    $result = $conn->query($query);


    if ($specs) {
        $query = "INSERT INTO specification(id_produit, nom, valeur) VALUES ";

        $values = [];
        foreach ($specs as $spec) {
            $values[] = "(" . $prodID . ",'" . $spec["name"] . "','" . $spec["value"] . "')";
        }
        $query = $query . implode(",", $values);
        $result = $conn->query($query);
    }
}

function getProducts() {
    global $conn, $error;
    $error = NULL;
    $query = "SELECT P.id, P.nom, P.description, H.prix as prix, M.nom as marque, C.nom as categorie FROM produit AS P INNER JOIN marque AS M ON P.id_marque = M.ID INNER JOIN catalogue AS C ON P.id_catalogue = C.id INNER JOIN historique_prix AS H ON H.id_produit = P.id";
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getProduct($id) {
    global $conn, $error;
    $error = NULL;
    $query = "SELECT P.id, P.nom, P.description, H.prix as prix, M.nom as marque, C.nom as categorie FROM produit AS P INNER JOIN marque AS M ON P.id_marque = M.ID INNER JOIN catalogue AS C ON P.id_catalogue = C.id INNER JOIN historique_prix AS H ON H.id_produit = P.id WHERE P.id = " . $id;
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_assoc();
}   

function removeProduct($id) {
    global $conn, $error;
    $error = NULL;
    $query = "DELETE FROM produit WHERE id = '" . $id . "'";
    $result = $conn->query($query);
    if (!$result) {
        $error = "Erreur lors de la suppression du catalogue " . $id . ", veuillez rééssayer";
    }
}