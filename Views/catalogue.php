<?php
include "../Controllers/initialize.php";
include "carte_produit.php";


$listMode = true;
$products = array();
if (!isset($_GET["id"]) || !isset($_GET["page"])) {
  $products = getProductsOverviewByCatalog();
  $catalogs = array();
  foreach ($products as $product) {
    if (!in_array($product['catalogue'], $catalogs)) {
      $catalogs[$product["catalogue"]][] = $product;
    }
  }
} else {
  $listMode = false;
  $id = $_GET["id"];
  $page = $_GET["page"];
  echo $id . " " . $page;

  $products = getCatalogProducts($id, $page);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Catalogue</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="../Style/assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="../Style/styles.css" rel="stylesheet" />
</head>

<body>
  <!-- Navigation-->
  <?php require "nav_bar.php"; ?>
  <!-- Section-->


  <div class="container-fluid">
    <section class="py-5">
      <div class="container px-4 px-lg-5 mt-5">
        <!-- <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"> -->
        <?php
        if ($listMode) {
          foreach ($catalogs as $catalogName => $catalog) {
        ?>
            <a class="h1 text-black" href=<?php echo "catalogue.php?id=" . $catalog[0]["catalogueID"] . "&page=1" ?>><?php echo $catalogName ?></a>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            foreach ($catalog as $product) {
              showProductCard($product["id"], $product["nom"], $product["prix"], $product["image"]);
            }
            echo "</div>";
          }
        } else {
            ?>
            <p class="h1"><?php echo $products[0]["catalogue"] ?></p>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
              <?php
              foreach ($products as $product) {
                showProductCard($product["id"], $product["nom"], $product["prix"], $product["image"]);
              } ?>
            </div>
            <div class="row align">
                <a class="pageBtn" href="">1</a>
                <a class="pageBtn" href="">2</a>
                <a class="pageBtn" href="">3</a>
                <div class="pageBtn">...</div>
                <a class="pageBtn" href="">Next</a>
                <a class="pageBtn" href="">Last</a>
            </div>
          <?php
        }
          ?>
          <!-- </div> -->
            </div>
    </section>
  </div>

  <?php require 'footer.php'; ?>

  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>

</html>