<?php
function command($userID, $products)
{
    global $conn, $error;
    $error = NULL;

    $price = 0;
    foreach ($products as $prod) {
        $price += $prod["prix"] * $prod["quantite"];
    }

    try {
        $query = "INSERT INTO commande(prix_total, id_utilisateur) VALUES ('" . $price . "'," . $userID . ");";
        $result = $conn->query($query);

        $query = "SELECT LAST_INSERT_ID() as ID";
        $result = $conn->query($query);
        $commandID = $result->fetch_assoc()["ID"];

        $query = "INSERT INTO contenu_commande(id_commande, id_produit, quantite) VALUES ";

        $values = [];
        foreach ($products as $prod) {
            $values[] = "(" . $commandID . ",'" . $prod["id"] . "','" . $prod["quantite"] . "')";
        }
        $query = $query . implode(",", $values);
        $result = $conn->query($query);
        return $commandID;
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
    }
}

function getCommandProducts($commandID)
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT P.id, P.nom, C.quantite FROM contenu_commande AS C INNER JOIN produit AS P ON C.id_produit = P.id WHERE C.id_commande = " . $commandID;

    try {
        $result = $conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
    }
}


function getUserCommands($userID)
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT id, date, prix_total FROM commande WHERE id_utilisateur = " . $userID . " ORDER BY date DESC, id DESC";

    try {
        $result = $conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
    }
}

function getUserLastCommand($userID)
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT id, date, prix_total FROM commande WHERE id_utilisateur = " . $userID . " ORDER BY date DESC, id DESC LIMIT 1";

    try {
        $result = $conn->query($query);
        return $result->fetch_assoc();
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
    }
}

function getCommand($id)
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT id, date, prix_total FROM commande WHERE id = " . $id . " ORDER BY date DESC, id DESC";

    try {
        $result = $conn->query($query);
        return $result->fetch_assoc();
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
    }
}

function getCommands($page)
{
    global $conn, $error;
    $error = NULL;

    $offset = ($page - 1) * 10;
    $query = "SELECT C.id, C.date, C.prix_total, U.nom, U.prenom FROM commande AS C INNER JOIN utilisateur AS U ON C.id_utilisateur = U.id ORDER BY date DESC, id DESC LIMIT 10 OFFSET " . $offset;

    try {
        $result = $conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
    }
}

function deleteCommand($id)
{
    global $conn, $error;
    $error = NULL;
    $query = "DELETE FROM commande WHERE id = " . $id;

    try {
        $result = $conn->query($query);
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
    }
}

function getCommandCount()
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT COUNT(*) as taille FROM commande";

    try {
        $result = $conn->query($query);
        return $result->fetch_assoc()["taille"];
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
    }
}

function monthRevenue()
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT SUM(prix_total) sum FROM commande WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())";

    try {
        $result = $conn->query($query);
        return $result->fetch_assoc()["sum"];
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
    }
}

function dayRevenue()
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT SUM(prix_total) sum FROM commande WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE()) AND DAY(date) = DAY(CURDATE())";

    try {
        $result = $conn->query($query);
        return $result->fetch_assoc()["sum"];
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
    }
}
