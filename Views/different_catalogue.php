<?php
if (isset($_POST["remove-cart-item"])) {
    include("../Controllers/panier.php");
    removeCartItem($_POST["remove-cart-item"]);
    header("Refresh:0");
} else {
    require("../Controllers/initialize.php");
    include("item_panier.php");



    $products = getProductsFromCart(getCart());
?>


    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Panier</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link rel="stylesheet" href="../Style/panier_style.css" />
    </head>

    <body>
        <div class="sizing">

            <div class="card bg-secondary text-white rounded-3 position">
                <div class="card-body">
                    <ul class="list-style">
                        <li class="list-component"><a class="a-style" href="catalogue.php">Catalogue 1</a></li>
                        <li class="list-component"><a class="a-style" href="catalogue.php">Catalogue 2</a></li>
                        <li class="list-component"><a class="a-style" href="catalogue.php">Catalogue 3</a></li>
                        <li class="list-component"><a class="a-style" href="catalogue.php">Catalogue 4</a></li>
                        <li class="list-component"><a class="a-style" href="catalogue.php">Catalogue 5</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Footer-->
        <?php require("footer.php"); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>

    </html>

<?php
}
?>