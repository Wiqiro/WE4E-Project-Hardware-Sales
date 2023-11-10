<?php

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
