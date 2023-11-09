<?php
global $loginSuccessful, $loginAttempted, $userInfo;

require("../Controllers/initialize.php");
if ($loginAttempted) {
    if ($loginSuccessful && !$userInfo["admin"]) {
        header("Location: index.php");
    }
} else {
    header("Location: index_admin.php");
}

require("../Controllers/image_uploader.php");
require("carte_gestion_produit.php");

$dayMoney = 1000;
$monthMoney = 2000;


if (isset($_POST["add"]) && isset($_POST["name"]) && isset($_POST["catalog"]) && isset($_POST["description"]) && isset($_POST["brand"]) && isset($_POST["price"]) && isset($_FILES["image"])) {
    $specs = NULL;
    if (isset($_POST["specs-names"]) && isset($_POST["specs-vals"])) {
        for ($i = 0; $i < count($_POST["specs-names"]); $i++) {
            $specs[$i]["name"] = $_POST["specs-names"][$i];
            $specs[$i]["value"] = $_POST["specs-vals"][$i];
        }
    }
    $imagePath = null;
    if (isBufferFileAdequate()) {
        $imagePath = saveImage("product_images", $userInfo["id"]);
    }
    addProduct($_POST["name"], $_POST["description"], $_POST["price"], $_POST["brand"], $_POST["catalog"], $imagePath, $specs);
} elseif (isset($_POST["remove"]) && isset($_POST["id"])) {
    removeProduct($_POST["id"]);
} elseif (isset($_POST["rename"]) && isset($_POST["id"]) && isset($_POST["new-name"])) {
    renameProduct($_POST["id"], $_POST["new-name"]);
}

$catalogList = getCatalogList();
$productList = getProducts();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Page Gérant</title>
    <link rel="icon" type="image/x-icon" href="../Style/assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Style/style_index_admin.css" />
</head>

<body>
    <h1>Gestion des produits</h1>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <a href="index_admin.php"><button class="generalBtn">Retour</button></a>
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-lg-12 center">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?php foreach ($productList as $product) {
                                            showProductManagementCard($product);
                                        } ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <form enctype="multipart/form-data" action="" method="POST">
                                            <label class="label-design" for="name">Nom du produit</label>
                                            <input class="catalog-name product-style" name="name" type="text" placeholder="Nom du produit"><br><br>
                                            <label class="label-design" for="catalog">Catalogue du produit</label>
                                            <select name="catalog">
                                                <?php
                                                foreach ($catalogList as $catalog) {
                                                    echo "<option value=" . $catalog["id"] . ">" . $catalog["nom"] . "</option>";
                                                }
                                                ?>
                                            </select><br><br>
                                            <label class="label-design" for="description">Description</label>
                                            <textarea name="description" cols="30" rows="5" maxlength="500"></textarea><br><br>
                                            <label class="label-design" for="price">Prix du produit</label>
                                            <input class="product-price product-style" name="price" type="number" placeholder="Prix"><br><br>
                                            <label class="label-design" for="image">Image du produit</label>
                                            <input class="product-image product-style" name="image" type="file" placeholder="Lien image">
                                            <br><br>
                                            <div id="specs-inputs">

                                            </div>
                                            <button class="generalBtn" type="button" onclick="addSpecInput()">Ajouter une caractéristique</button>
                                            <br><br>
                                            <input type="submit" value="Ajouter le produit" name="add" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require("footer.php"); ?>
    <script src="js/specs_dynamic_form.js"></script>
    <script src="js/products_scripts.js"></script>

</body>

</html>