<?php
if (!isset($_GET["id"])) {
  header("Location: index.php");
} else {
  include "../Controllers/initialize.php";
  include "carte_produit.php";

  $id = $_GET["id"];

  $products = getCatalogProducts($id);
  print_r($products);
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
          <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php

            foreach($products as $product) {
             showProductCard($product["id"], $product["nom"], $product["prix"], "https://dummyimage.com/450x300/dee2e6/6c757d.jpg");
            }
            ?>
          </div>
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

<?php
}
?>