<?php
global $loginSuccessful, $loginAttempted, $userInfo;

if (!isset($_GET["page"])) {
    header("Location: gestion_produits.php?page=1");
}
$page = $_GET["page"];

require("../Controllers/initialize.php");
require("../Controllers/produits.php");
$pCount = getProductsCount();
$pageCount = $pCount % 10 == 0 ? floor($pCount / 10) : ceil($pCount / 10);



if ($loginAttempted) {
    if ($loginSuccessful && !$userInfo["admin"]) {
        header("Location: index.php");
    }
} else {
    header("Location: index_admin.php");
}

require("../Controllers/image_uploader.php");
require("carte_gestion_produit.php");


if (isset($_POST["add"]) && isset($_POST["name"]) && isset($_POST["catalog"]) && isset($_POST["description"]) && isset($_POST["price"])) {
    $specs = NULL;
    if (isset($_POST["specs-names"]) && isset($_POST["specs-vals"])) {
        for ($i = 0; $i < count($_POST["specs-names"]); $i++) {
            $specs[$i]["name"] = $_POST["specs-names"][$i];
            $specs[$i]["value"] = $_POST["specs-vals"][$i];
        }
    }

    $prodID = addProduct($_POST["name"], $_POST["description"], $_POST["price"], $_POST["catalog"], $specs);
} elseif (isset($_POST["modify"]) && isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["catalog"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_FILES["image"])) {
    $specs = NULL;
    $prodID = $_POST["id"];
    if (isset($_POST["specs-names"]) && isset($_POST["specs-vals"])) {
        for ($i = 0; $i < count($_POST["specs-names"]); $i++) {
            $specs[$i]["name"] = $_POST["specs-names"][$i];
            $specs[$i]["value"] = $_POST["specs-vals"][$i];
        }
    }
    modifyProduct($_POST["id"], $_POST["name"], $_POST["description"], $_POST["price"], $_POST["catalog"], $specs);
} elseif (isset($_POST["remove"]) && isset($_POST["id"])) {
    removeProduct($_POST["id"]);
} elseif (isset($_POST["rename"]) && isset($_POST["id"]) && isset($_POST["new-name"])) {
    renameProduct($_POST["id"], $_POST["new-name"]);
} else if (isset($_POST["modify-form"]) && isset($_POST["id"])) {
    $modifProduct = getProductFromId($_POST["id"]);
    $modifProductSpecs = getProductSpecifications($_POST["id"]);
}

if (isset($prodID) && isset($_FILES["image"])) {
    $imagePath = "./";
    if (isBufferFileAdequate()) {
        $imagePath = saveImage("product_images", $userInfo["id"]);
    }
    changeProductImage($prodID, $imagePath);
}

$catalogList = getCatalogList();
$productList = getProducts($page);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Page Gérant</title>
    <link rel="icon" type="image/x-icon" href="../Style/assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link href="../Style/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Style/style_index_admin.css" />
</head>

<body>
    <h1>Gestion des produits</h1>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-10">
                                <h5 class="mb-3">
                                    <a href="index_admin.php" class="text-body">
                                        <i class="fas fa-long-arrow-alt-left me-2"></i>
                                        Retour
                                    </a>
                                </h5>
                            </div>
                            <div class="col-2">
                                <button id="show-form-button" class="generalBtn" type="button" onclick="showForm()">Ajouter un produit</button>
                            </div>
                            <hr>
                            <div class="col-lg-12 center">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?php foreach ($productList as $product) {
                                            showProductManagementCard($product);
                                        } ?>

                                    </div>
                                    <div class="col-lg-6">
                                        <form id="product-form" enctype="multipart/form-data" action="" method="POST" style="display: none">
                                            <label class="label-design" for="name">Nom du produit</label>
                                            <input class="catalog-name product-style" name="name" type="text" placeholder="Nom du produit" value="<?php if (isset($modifProduct)) echo $modifProduct["nom"] ?>"><br><br>
                                            <label class="label-design" for="catalog">Catalogue du produit</label>
                                            <select name="catalog">
                                                <?php
                                                foreach ($catalogList as $catalog) {
                                                    if ($catalog["id"] == $modifProduct["catalogueID"]) {
                                                        echo '<option selected="selected"';
                                                    } else {
                                                        echo '<option';
                                                    }
                                                    echo " value=" . $catalog["id"] . ">" . $catalog["nom"] . "</option>";
                                                }
                                                ?>
                                            </select><br><br>
                                            <label class="label-design" for="description">Description</label>
                                            <textarea name="description" cols="30" rows="5" maxlength="500"><?php if (isset($modifProduct)) echo $modifProduct["description"] ?></textarea><br><br>
                                            <label class="label-design" for="price">Prix du produit</label>
                                            <input class="product-price product-style" name="price" type="number" placeholder="Prix" value="<?php if (isset($modifProduct)) echo (float)$modifProduct["prix"] ?>"><br><br>
                                            <label class="label-design" for="image">Image du produit</label>
                                            <input class="product-image product-style" name="image" type="file" placeholder="Lien image">
                                            <br><br>
                                            <div id="specs-inputs">

                                            </div>
                                            <?php if (isset($modifProduct)) {
                                                echo '<input type="hidden" name="id" value="' . $modifProduct["id"] . '">';
                                            } ?>

                                            <button class="generalBtn" type="button" onclick="addSpecInput('', '')">Ajouter une caractéristique</button>
                                            <br><br>
                                            <?php if (isset($modifProduct)) { ?>
                                                <input type="submit" value="Modifier le produit" name="modify" />
                                            <?php } else { ?>
                                                <input type="submit" value="Ajouter le produit" name="add" />
                                            <?php } ?>


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
    <div class="row align">
        <?php
        for ($i = $page - 3; $i <= $page + 3; $i++) {
            if ($i > 0 && $i <= $pageCount && $i != $page) {
                echo '<a class="pageBtn" href="gestion_produits.php?page=' . $i . '">' . $i . '</a>';
            }
        }
        ?>
        <?php
        if ($page < $pageCount) {
            echo '<div class="pageBtn">...</div>
                <a class="pageBtn" href="gestion_produits.php?page=' . $page + 1 . '">Next</a>
                <a class="pageBtn" href="gestion_produits.php?page=' . $pageCount . '">Last</a>';
        }
        ?>
    </div>

    <?php require("footer.php"); ?>
    <script src="js/specs_dynamic_form.js"></script>
    <script src="js/products_scripts.js"></script>
    <?php if (isset($modifProductSpecs)) { ?>
        <script>
            <?php foreach ($modifProductSpecs as $spec) { ?>
                addSpecInput("<?php echo $spec["nom"] ?>", "<?php echo $spec["valeur"] ?>");
            <?php } ?>
        </script>
    <?php
    }
    if (isset($modifProduct)) {
        echo '<script>showForm();</script>';
    } ?>

</body>

</html>