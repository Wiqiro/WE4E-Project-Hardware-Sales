<?php
function showProductManagementCard($product)
{
?>

    <link rel="stylesheet" href="../Style/panier_style.css" />


    <body>
        <div class="card mb-3">
            <div class="card-body">
                <form class="product-form" action="" , method="POST">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div>
                                <img src="../Style/assets/catalog.jpg" class="img-fluid rounded-3" alt="image commande" style="width: 65px;">
                            </div>
                            <div class="ms-3">
                                <a class="link-style product-name" href="produit.php?id=<?php echo $product["id"] ?>">
                                    <h5><?php echo $product["nom"] ?></h5>
                                </a>
                                <input class="rename-input hidden" name="new-name" type="text" value="<?php echo $product["nom"] ?>">
                                <p class="medium mb-3">Identifiant: <?php echo $product["id"] ?></p>
                                <p class="medium mb-3">Catalogue: <?php echo $product["catalogue"] ?></p>

                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <div>
                                <p class="medium mb-3"><?php echo $product["prix"] ?>€</p>
                                <input type="hidden" name="id" , value="<?php echo $product["id"] ?>">
                                <input type="button" class="rename-button" value="Renommer" name="rename" onclick="showRenameInput(this)" />
                                <input type="submit" value="Modifier" name="modify-form" />
                                <input type="submit" value="Supprimer" name="remove" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>

<?php
}
?>