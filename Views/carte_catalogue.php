<?php

function showCatalogCart($id, $name, $prodCount, $imageAddress)
{
?>
    <div class="col mb-5">
        <div class="card h-100">
            <!-- Product image-->
            <img class="card-img-top" src="<?php echo $imageAddress ?>" alt="Unable to find image" />
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder"><?php echo $name ?></h5>
                    <!-- Product price-->
                    <?php echo $prodCount . " produits" ?>
                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo "catalogue.php?id=" . $id . "&page=1" ?>">Parcourir</a></div>
            </div>
        </div>
    </div>

<?php
}
?>