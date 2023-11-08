<?php

function showCartItem($product)
{
    $prix = $product["prix"] * $product["quantite"];
    ?>
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <div>
                        <img src="<?php echo $product["image"] ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                    </div>
                    <div class="ms-3">
                        <a class="link-style" href="produit.php?id=<?php echo $product["id"] ?>">
                            <h5><?php echo $product["nom"] ?></h5>
                        </a>
                        <p class="small mb-0"><?php echo $product["description"] ?></p>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <div style="width: 50px;">
                        <h5 class="fw-normal mb-0"><?php echo $product["quantite"] ?></h5>
                    </div>
                    <div style="width: 80px;">
                        <h5 class="mb-0"><?php echo $prix ?>€</h5>
                    </div>
                    <form action="" method="POST">
                        <input type="hidden" name="remove-cart-item" value="<?php echo $product["id"] ?>">
                        <button type="submit" class="btn btn-link p-0 border-0" style="color: #cecece;"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>