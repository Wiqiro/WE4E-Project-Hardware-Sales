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



function addProduct($name, $description, $price, $catalogID, $brandID, $imagePath, $specs)
{
    global $conn, $error;
    $error = NULL;
    $query = "INSERT INTO produit(nom, description, prix, id_marque, id_catalogue, image) VALUES ('" . $name . "','" . $description . "'," . $price . "," . $catalogID . "," . $brandID . ",'" . $imagePath . "');";
    $result = $conn->query($query);

    $query = "SELECT LAST_INSERT_ID() as ID";
    $result = $conn->query($query);
    $prodID = $result->fetch_assoc()["ID"];

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

function getProducts()
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT P.id, P.nom, P.description, P.prix, M.nom as marque, C.nom as catalogue FROM produit AS P INNER JOIN marque AS M ON P.id_marque = M.ID INNER JOIN catalogue AS C ON P.id_catalogue = C.id";
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getProductFromId($id)
{

    global $conn, $error;
    $error = NULL;
    $query = "SELECT P.id, P.nom, P.description, P.image, P.prix, M.nom as marque, C.nom as catalogue, C.id AS catalogueID FROM produit AS P INNER JOIN marque AS M ON P.id_marque = M.ID INNER JOIN catalogue AS C ON P.id_catalogue = C.id WHERE P.id = " . $id;
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_assoc();
}

function getProductsOverviewByCatalog()
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT P.id, P.nom, P.description, P.prix, P.image, C.id AS catalogueID, C.nom as catalogue
    FROM produit AS P
    INNER JOIN catalogue AS C ON P.id_catalogue = C.id
    WHERE (
        SELECT COUNT(*)
        FROM produit AS P2
        WHERE P2.id_catalogue = P.id_catalogue AND P2.id <= P.id
    ) <= 4";
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getCatalogProducts($catalogID, $page)
{
    $offset = ($page - 1) * 10;
    global $conn, $error;
    $error = NULL;
    $query = "SELECT P.id, P.nom, P.image, P.description, P.prix, M.nom as marque, C.nom as catalogue FROM produit AS P INNER JOIN marque AS M ON P.id_marque = M.ID INNER JOIN catalogue AS C ON P.id_catalogue = C.id WHERE C.id = " . $catalogID . " LIMIT 10 OFFSET " . $offset;
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}



function getProductsFromCart($cart)
{
    if (!$cart) return array();
    global $conn, $error;
    $error = NULL;
    $query = "SELECT P.id, P.nom, P.description, P.image, P.prix, M.nom as marque, C.nom as catalogue FROM produit AS P INNER JOIN marque AS M ON P.id_marque = M.ID INNER JOIN catalogue AS C ON P.id_catalogue = C.id WHERE P.id IN (";

    $values = [];
    foreach ($cart as $item) {
        $values[] = $item["id"];
    }
    $query .= implode(",", $values) . ")";
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }

    $products = $result->fetch_all(MYSQLI_ASSOC);

    $productsWithQuantity = array();

    foreach ($products as $product) {
        foreach ($cart as $cartItem) {
            if ($product['id'] == $cartItem['id']) {
                $product['quantite'] = $cartItem['quantity'];
                $productsWithQuantity[] = $product;
                break;
            }
        }
    }

    return $productsWithQuantity;
}

function getProductSpecifications($id)
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT S.nom, S.valeur FROM produit AS P INNER JOIN specification AS S ON S.id_produit = P.id WHERE P.id = " . $id;
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}

function removeProduct($id)
{
    global $conn, $error;
    $error = NULL;
    $query = "DELETE FROM produit WHERE id = '" . $id . "'";
    $result = $conn->query($query);
    if (!$result) {
        $error = "Erreur lors de la suppression du catalogue " . $id . ", veuillez rééssayer";
    }
}

function getCommandProducts($commandID)
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT P.id, P.nom, P.prix, C.quantite FROM contenu_commande AS C INNER JOIN produit AS P ON C.id_produit = P.id WHERE C.id_commande = " . $commandID;
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}
