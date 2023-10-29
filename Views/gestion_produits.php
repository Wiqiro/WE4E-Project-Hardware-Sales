<?php
require("../Controllers/initialize.php");
require("carte_gestion_produit.php");


$isLogin = true;
$isAdmin = true;
$dayMoney = 1000;
$monthMoney = 2000;


if (isset($_POST["name"]) && isset($_POST["catalog"]) && isset($_POST["description"]) && isset($_POST["price"])) {
    
    
    $specs = NULL;
    if (isset($_POST["specs-names"]) && isset($_POST["specs-vals"])) {
        for ($i = 0; $i < count($_POST["specs-names"]); $i++) {
            $specs[$i]["name"] = $_POST["specs-names"][$i];
            $specs[$i]["value"] = $_POST["specs-vals"][$i];
        }
    }
    addProduct($_POST["name"], $_POST["description"], $_POST["price"], 0, $_POST["catalog"], $specs);
}

$catalogList = getCatalogList();
$brandList = getBrandList();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Page Gérant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Style/style_index_admin.css" />
</head>

<body>
    <h1>Gestion des produits</h1>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <a href="index_admin.php"><button>Retour</button></a>
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-lg-12 center">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?php /* showProductCardCard(); */ ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <form action="" method="POST">
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
                                            <label class="label-design" for="brand">Marque du produit</label>
                                            <select name="brand">
                                                <?php
                                                foreach ($brandList as $brand) {
                                                    echo "<option value=" . $brand["id"] . ">" . $brand["nom"] . "</option>";
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
                                            <button type="button" onclick="addSpecInput()">Ajouter une caractéristique</button>
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
</body>

</html>