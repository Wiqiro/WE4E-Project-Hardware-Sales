<?php
function showProductManagementCard($product) {
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
                        <a class="link-style" href="produit.php?id=<?php echo $product["id"]?>">
                            <h5><?php echo $product["nom"]?></h5>
                        </a>
                        <p class="medium mb-3">Identifiant: <?php echo $product["id"]?></p>
                        <p class="medium mb-3">Catalogue: <?php echo $product["catalogue"]?></p>
                        <p class="medium mb-3">Marque: <?php echo $product["marque"]?></p>

                    </div>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <div>
                        <p class="medium mb-3"><?php echo $product["prix"]?>€</p>
                        <form action="", method="POST">
                            <input type="hidden" name="id", value="<?php echo $product["id"] ?>">
                            <input type="submit" value="Renommer" name="rename" />
                            <input type="submit" value="Supprimer" name="remove" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
}
?>