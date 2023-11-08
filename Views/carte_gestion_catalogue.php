<?php

function showCatalogManagementCard($catalog)
{
?>
    <link rel="stylesheet" href="../Style/panier_style.css" />

    <body>
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div>
                            <img src="../Style/assets/catalog.jpg" class="img-fluid rounded-3" alt="image commande" style="width: 65px;">
                        </div>
                        <form class="catalog-form" action="" , method="POST">
                            <div class="ms-3">
                                <a class="link-style catalog-name" href="catalogue.php">
                                    <h5><?php echo $catalog["nom"] ?></h5>
                                </a>
                                <input class="rename-input hidden" name="new-name" type="text" value="<?php echo $catalog["nom"] ?>">
                                <p class="medium mb-3">
                                    <?php
                                    if ($catalog["nb_produits"] == 0) {
                                        echo "Le catalogue ne contient pas de produit";
                                    } elseif ($catalog["nb_produits"] == 1) {
                                        echo "Le catalogue contient 1 produit";
                                    } else {
                                        echo "Le catalogue contient " . $catalog["nb_produits"] . " produit";
                                    }
                                    ?>
                                </p>

                            </div>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <input type="hidden" name="id" , value="<?php echo $catalog["id"] ?>">
                        <input type="button" class="rename-button" value="Renommer" name="rename" onclick="showRenameInput(this)" />
                        <input type="submit" value="Supprimer" name="remove" />
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

<?php
}
?>