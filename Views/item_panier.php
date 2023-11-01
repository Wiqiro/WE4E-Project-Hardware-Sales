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
                        <img src="https://ik.imagekit.io/pimberly/595e406f0f15f30010780448/tr:w-1000,h-1000,cm-pad_resize/696d6cec/5d70c6b06cb2114d580001de.jpg?product_name=Coca-Cola-Soft-Drink-330ml-Can-(Pack-of-24)-402002.jpg" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                    </div>
                    <div class="ms-3">
                        <a class="link-style" href="produit.php">
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