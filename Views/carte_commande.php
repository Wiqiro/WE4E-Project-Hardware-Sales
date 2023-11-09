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
                                    echo '<p class="text-start small mb-0">' . $prod["nom"] . ' &nbspx' . $prod["quantite"] . '</p>';
                                }
                                ?>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <div style="width: 80px;">
                        <h5 class="mb-0"><?php echo $command["prix_total"] ?>€</h5>
                    </div>
                    <div>
                        <?php if ($isAdmin) { ?>
                            <form action="" method="post" onsubmit="return confirmDeleteCommand()">
                                <input type="hidden" name="command-id" value="<?php echo $command["id"] ?>">
                                <button type="submit" name="delete-command" class="generalBtn">Supprimer</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>