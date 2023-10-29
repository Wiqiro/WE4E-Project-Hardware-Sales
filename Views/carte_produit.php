
<?php

function showProductCard($id, $name, $price, $imageAddress) {
?>
<div class="col mb-5">
    <div class="card h-100">
        <!-- Product image-->
        <img class="card-img-top" src="<?php echo $imageAddress?>" alt="Unable to find image" />
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder"><?php echo $name ?></h5>
                <!-- Product reviews-->
                <div class="d-flex justify-content-center small text-warning mb-2">
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                </div>
                <!-- Product price-->
                <?php echo "$".$price ?>
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
        </div>
    </div>
</div>

<?php
}
?>