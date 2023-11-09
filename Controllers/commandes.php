<?php
function command($userID, $products)
{
    global $conn, $error;
    $error = NULL;

    $price = 0;
    foreach ($products as $prod) {
        $price += $prod["prix"] * $prod["quantite"];
    }


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
}

function getUserCommands($userID)
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT id, date, prix_total FROM commande WHERE id_utilisateur = " . $userID . " ORDER BY date DESC, id DESC";
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des commandes, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getCommand($id)
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT id, date, prix_total FROM commande WHERE id = " . $id . " ORDER BY date DESC, id DESC";
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des commandes, veuillez rééssayer";
    }
    return $result->fetch_assoc();
}

function getCommands($page)
{
    global $conn, $error;
    $error = NULL;

    $offset = ($page - 1) * 10;
    $query = "SELECT C.id, C.date, C.prix_total, U.nom, U.prenom FROM commande AS C INNER JOIN utilisateur AS U ON C.id_utilisateur = U.id ORDER BY date DESC, id DESC LIMIT 10 OFFSET " . $offset;
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des commandes, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}

function deleteCommand($id)
{
    global $conn, $error;
    $error = NULL;
    $query = "DELETE FROM commande WHERE id = " . $id;
    $result = $conn->query($query);

    if (!$result) {
        $error = "Erreur lors de suppression de la commande, veuillez rééssayer";
    }
}

function monthRevenue()
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT SUM(prix_total) sum FROM commande WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())";
    $result = $conn->query($query);

    if (!$result) {
        $error = "Erreur lors de suppression de la commande, veuillez rééssayer";
    }
    return $result->fetch_assoc()["sum"];
}

function dayRevenue()
{
    global $conn, $error;
    $error = NULL;
    $query = "SELECT SUM(prix_total) sum FROM commande WHERE YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE()) AND DAY(date) = DAY(CURDATE())";
    $result = $conn->query($query);

    if (!$result) {
        $error = "Erreur lors de suppression de la commande, veuillez rééssayer";
    }
    return $result->fetch_assoc()["sum"];
}
