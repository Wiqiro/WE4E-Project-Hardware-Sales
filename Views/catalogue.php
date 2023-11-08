<?php
include "../Controllers/initialize.php";
include "carte_produit.php";


$listMode = true;
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
  $id = (int)$_GET["id"];
  $page = $_GET["page"];

  $order = isset($_POST["change-order"]) ? $_POST["change-order"] : "nom ASC";


  $products = getCatalogProducts($id, $page, $order);
  $pageCount = (int)(getCatalogSize($id) / 10) + 1;
  $catalogName = $products[0]["catalogue"];
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
            <div class="btn-back-catalog mb-5"><img class="back-arrow" src="../Style/assets/img/back.png" alt="back arrow"> <a href="catalogue.php" class="back-catalog">Catalogues</a></div>
            <div class="row inline-display">
              <p class="h1 mb-5"><?php echo $catalogName ?></p>
                  <form action="" method="post">
                    <label for="change-order"></label>
                    <select name="change-order">
                      <option value="nom ASC">A à Z</option>
                      <option value="prix DESC">Du plus cher au moins cher</option>
                      <option value="prix ASC">Du moins cher au plus cher</option>
                    </select>
                    <input type="submit" value="Filtrer" />
                  </form>
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
              <?php
              foreach ($products as $product) {
                showProductCard($product["id"], $product["nom"], $product["prix"], $product["image"]);
              } ?>
            </div>
            <div class="row align">
              <?php
              for ($i = $page - 3; $i <= $page + 3; $i++) {
                if ($i > 0 && $i <= $pageCount && $i != $page) {
                  echo '<a class="pageBtn" href="catalogue.php?id=' . $id . '&page=' . $i . '">' . $i . '</a>';
                }
              }
              ?>
              <?php
              if ($page < $pageCount) {
                echo '<div class="pageBtn">...</div>
                <a class="pageBtn" href="catalogue.php?id=' . $id . '&page=' . $page + 1 . '">Next</a>
                <a class="pageBtn" href="catalogue.php?id=' . $id . '&page=' . $pageCount . '">Last</a>';
              }
              ?>
            </div>
          <?php
        }
          ?>
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