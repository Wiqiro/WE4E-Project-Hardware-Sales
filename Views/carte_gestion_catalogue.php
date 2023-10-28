<?php

function showCatalogManagementCard($catalog) {
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
                        <div class="ms-3">
                            <a class="link-style" href="produit.php">
                                <h5><?php echo $catalog["nom"] ?></h5>
                            </a>
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
                        <form action="", method="POST">
                            <input type="hidden" name="id" , value="<?php echo $catalog["id"] ?>">
                            <input type="submit" value="Renommer" name="rename" />
                            <input type="submit" value="Supprimer" name="remove" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

<?php
}
?>