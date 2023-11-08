<?php
function showCommandCard($command, $isAdmin)
{
    $products = getCommandProducts($command["id"]);
?>
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <div>
                        <img src="../Style/assets/commandes.png" class="img-fluid rounded-3" alt="image commande" style="width: 65px;">
                    </div>
                    <div class="ms-3">
                        <h5 class="color-red"><?php echo "Commande n°" . $command["id"] ?></h5>
                        <?php if ($isAdmin) { ?>
                            <h6><?php echo $command["prenom"] . " " . $command["nom"] ?></h6>
                        <?php } ?>

                        <p class="medium mb-3"><?php echo $command["date"] ?></p>
                        <div class="row">
                                <?php
                                foreach ($products as $prod) {
                                    echo '<p class="text-start small mb-0">' . $prod["nom"] . ' &nbsp&nbsp(' . $prod["quantite"] . 'x' . $prod["prix"] . '€)  </p>';
                                }
                                ?>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <div style="width: 80px;">
                        <h5 class="mb-0">1957€</h5>
                    </div>
                    <div>
                        <?php if ($isAdmin) { ?>
                            <button class="generalBtn">Supprimer</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>