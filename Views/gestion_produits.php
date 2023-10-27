<?php
$isLogin = true;
$isAdmin = true;
$dayMoney = 1000;
$monthMoney = 2000;
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
    <h1>Gestion de catalogue</h1>
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
                                        <?php require("carte_gestion_produit.php"); ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <form action="">
                                            <label class="label-design" for="catalog-name"></label>
                                            <input class="catalog-name product-style" id="catalog" type="text" placeholder="Nom du catalogue">
                                            <label class="label-design" for="product-name"></label><br>
                                            <input class="product-name product-style" id="name" type="text" placeholder="Nom du produit">
                                            <label class="label-design" for="product-price"></label><br>
                                            <input class="product-price product-style" id="price" type="text" placeholder="Prix">
                                            <label class="label-design" for="image"></label><br>
                                            <input class="product-image product-style" id="image" type="text" placeholder="Lien image">
                                            <br>
                                            <br>
                                            <button>Ajouter le catalogue</button>
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
</body>

</html>