<?php
global $loginSuccessful, $loginAttempted, $userInfo;
include("../Controllers/initialize.php");
if ($loginAttempted) {
    if ($loginSuccessful && !$userInfo["admin"]) {
        header("Location: index.php");
    }
} else {
    header("Location: index_admin.php");
}

include("carte_gestion_catalogue.php");

$error = null;
if (isset($_POST["add"]) && isset($_POST["name"])) {
    createCatalog($_POST["name"]);
} elseif (isset($_POST["remove"]) && isset($_POST["id"])) {
    removeCatalog($_POST["id"]);
} elseif (isset($_POST["rename"]) && isset($_POST["id"]) && isset($_POST["new-name"])) {
    renameCatalog($_POST["id"], $_POST["new-name"]);
}

if ($error) {
    $dbError = $error;
}

$catalogList = getCatalogList();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="../Style/assets/favicon.ico" />
    <title>Page Gérant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="../Style/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Style/style_index_admin.css" />

</head>

<body>

    <h1>Gestion de catalogue</h1>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                        <div class="col-2">
                                <h5 class="mb-3">
                                    <a href="index_admin.php" class="text-body">
                                        <i class="fas fa-long-arrow-alt-left me-2"></i>
                                        Retour
                                    </a>
                                </h5>
                            </div>
                            <div class="col-8">
                                <?php if (isset($dbError)) {
                                    echo "<p class='color-red h5 center mb-5'>" . $dbError . "</p>";
                                }
                                ?>
                            </div>
                            <div class="col-2">
                                <button id="show-form-button" class="generalBtn" type="button" onclick="showForm()">Ajouter un catalogue</button>
                            </div>
                            <hr>
                            <div class="col-lg-12 center">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?php
                                        for ($i = 0; $i < count($catalogList); $i++) {
                                            showCatalogManagementCard($catalogList[$i]);
                                        }
                                        ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <form id="catalog-form" action="" , method="POST" style="display: none">
                                            <label class="label-design" for="name" required>Nom du catalogue</label>
                                            <input class="catalog-name" name="name" type="text" placeholder="Nom du catalogue">
                                            <br><br>
                                            <input type="submit" value="Ajouter le catalogue" name="add" />
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
    <script src="js/catalog_scripts.js"></script>
    <script src="js/confirmations.js"></script>
</body>

</html>