<?php

function addProduct($name, $description, $price, $catalogID, $specs)
{
    global $conn, $error;
    $error = NULL;
    $query = "INSERT INTO produit(nom, description, prix, id_catalogue) VALUES ('" . $name . "','" . $description . "'," . $price . "," . $catalogID . ");";
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

    return $prodID;
}


function modifyProduct($id, $name, $description, $price, $catalogID, $specs)
{
    global $conn, $error;
    $error = NULL;
    $query = "UPDATE produit SET nom='" . $name . "', description='" . $description . "', prix=" . $price . ", id_catalogue=" . $catalogID . " WHERE id=" . $id;

    $result = $conn->query($query);

    $query = "DELETE FROM specification WHERE id_produit=" . $id;
    $result = $conn->query($query);

    if ($specs) {
        $query = "INSERT INTO specification(id_produit, nom, valeur) VALUES ";

        $values = [];
        foreach ($specs as $spec) {
            $values[] = "(" . $id . ",'" . $spec["name"] . "','" . $spec["value"] . "')";
        }
        $query = $query . implode(",", $values);
        $result = $conn->query($query);
    }
}

function changeProductImage($id, $imagePath) {
    global $conn, $error;
    $error = NULL;
    $query = "UPDATE produit SET image='" . $imagePath . "' WHERE id=" . $id;

    $result = $conn->query($query);
}

function getProducts($page)
{
    $offset = ($page - 1) * 10;
    global $conn, $error;
    $error = NULL;
    $query = "SELECT P.id, P.nom, P.description, P.prix, C.nom as catalogue FROM produit AS P INNER JOIN catalogue AS C ON P.id_catalogue = C.id ORDER BY nom ASC LIMIT 10 OFFSET " . $offset;
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getRandomProducts($count)
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT P.id, P.nom, P.description, P.prix, P.image, C.nom as catalogue FROM produit AS P INNER JOIN catalogue AS C ON P.id_catalogue = C.id LIMIT " . $count;
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}

function renameProduct($id, $newName)
{
    global $conn, $error;
    $error = NULL;
    $query = "UPDATE produit SET nom='" . $newName . "' WHERE id = '" . $id . "'";
    $result = $conn->query($query);
    if (!$result) {
        $error = "Erreur lors du renommage du produit " . $id . ", veuillez rééssayer";
    }
}

function getProductFromId($id)
{

    global $conn, $error;
    $error = NULL;
    $query = "SELECT P.id, P.nom, P.description, P.image, P.prix, C.nom as catalogue, C.id AS catalogueID FROM produit AS P INNER JOIN catalogue AS C ON P.id_catalogue = C.id WHERE P.id = " . $id;
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
    ) <= 4 ORDER BY C.nom, P.nom";
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getCatalogProducts($catalogID, $page, $orderParam)
{
    $offset = ($page - 1) * 10;
    global $conn, $error;
    $error = NULL;
    $query = "SELECT P.id, P.nom, P.image, P.description, P.prix, C.nom as catalogue FROM produit AS P INNER JOIN catalogue AS C ON P.id_catalogue = C.id WHERE C.id = " . $catalogID . " ORDER BY " . $orderParam . " LIMIT 10 OFFSET " . $offset;
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
    $query = "SELECT P.id, P.nom, P.description, P.image, P.prix, C.nom AS catalogue FROM produit AS P INNER JOIN catalogue AS C ON P.id_catalogue = C.id WHERE P.id IN (";

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

    if (!$result) {
        $error = "Erreur lors de la récupération des spécifications du produit, veuillez rééssayer";
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

function getProductsCount() {
    global $conn, $error;
    $error = NULL;
    $query = "SELECT COUNT(*) as taille FROM produit";
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_assoc()["taille"];
}