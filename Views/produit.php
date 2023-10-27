<?php
$catalog_name = 'Nom du catalogue';
global $loginSuccessful, $userInfo;

include("../Controllers/initialize.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Produit</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="../Style/assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="../Style/styles.css" rel="stylesheet" />
</head>

<body>
  <!-- Navigation-->
  <?php require("nav_bar.php"); ?>
  <!-- Product section-->

  <section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="btn-back-catalog"><img class="back-arrow" src="../Style/assets/img/back.png" alt="back arrow"> <a href="catalogue.php" class="back-catalog"><?php echo ($catalog_name); ?></a></div>
      <br>
      <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div>
        <div class="col-md-6">
          <div class="small mb-1">SKU: BST-498</div>
          <h1 class="display-5 fw-bolder">Shop item template</h1>
          <div class="fs-5 mb-5">
            <span class="text-decoration-line-through">$45.00</span>
            <span>$40.00</span>
          </div>
          <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
          <?php if ($loginSuccessful == true) { ?>
            <div class="d-flex">
              <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
              <button class="btn btn-outline-dark flex-shrink-0" type="button">
                <i class="bi-cart-fill me-1"></i>
                Ajouter au panier
              </button>
              <div class="space"></div>
              <button class="btn btn-outline-dark flex-shrink-0" type="button">
                Commander maintenant
              </button>
            </div>
          <?php } else { ?>
            <div class="d-flex">
              <span class="shadow-text">Pour commander, vous
                devez être un utilisateur inscrit. Cliquez ce lien pour créer un compte et commencer vos
                achats !</span>
              <a href="compte.php">
                <button class="btn btn-outline-dark flex-shrink-0" type="button">
                  Login
                </button>
              </a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <!-- Related items section-->
  <section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
      <h2 class="fw-bolder mb-4">Related products</h2>
      <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php
        include("carte_produit.php");
        include("carte_produit.php");
        include("carte_produit.php");
        include("carte_produit.php");
        ?>
      </div>
    </div>
  </section>

  <?php require('footer.php'); ?>


  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>

</html>