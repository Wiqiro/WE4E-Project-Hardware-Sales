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
    echo $query;
    $result = $conn->query($query);
}

function getUserCommands($userID) {
    global $conn, $error;
    $error = NULL;
    $query = "SELECT id, date, prix_total FROM commande WHERE id_utilisateur = " . $userID;
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getCommands() {
    global $conn, $error;
    $error = NULL;
    $query = "SELECT C.id, C.date, C.prix_total, U.nom, U.prenom FROM commande AS C INNER JOIN utilisateur AS U ON C.id_utilisateur = U.id";
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        $error = "Erreur lors de la récupération de la liste des catalogues, veuillez rééssayer";
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}