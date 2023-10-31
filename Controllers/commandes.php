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
