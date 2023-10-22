<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/panier_style.css" />
    <title>Card</title>
</head>

<body>
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <div>
                        <img src="../Style/assets/commandes.png" class="img-fluid rounded-3" alt="image commande" style="width: 65px;">
                    </div>
                    <div class="ms-3">
                        <a class="link-style" href="produit.php">
                            <h5>Numéro de commande</h5>
                        </a>
                        <?php if ($isAdmin) { ?>
                            <h6>Nom client</h6>
                        <?php } ?>

                        <p class="medium mb-3">Date/Heure de commande</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="small mb-0">Produit 1</p>
                                <p class="small mb-0">Produit 2</p>
                                <p class="small mb-0">Produit 3</p>
                                <p class="small mb-0">Produit 4</p>
                                <p class="small mb-0">Produit 5</p>
                            </div>
                            <div class="col-lg-6">
                                <p class="small mb-0">Produit 6</p>
                                <p class="small mb-0">Produit 7</p>
                                <p class="small mb-0">Produit 8</p>
                                <p class="small mb-0">Produit 9</p>
                                <p class="small mb-0">Produit 10</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <div style="width: 50px;">
                        <h5 class="fw-normal mb-0">3</h5>
                    </div>
                    <div style="width: 80px;">
                        <h5 class="mb-0">$Total</h5>
                    </div>
                    <div>
                        <?php if ($isAdmin) { ?>
                            <button>Supprimer</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>