<?php
if (isset($_POST["remove-cart-item"])) {
  include("../Controllers/panier.php");
  removeCartItem($_POST["remove-cart-item"]);
  header("Refresh:0");
} else if (isset($_POST["empty"])) {
  include("../Controllers/panier.php");
  emptyCart();
  header("Refresh:0");
} else {
  global $loginSuccessful, $userInfo;
  require("../Controllers/initialize.php");
  if ($loginSuccessful && $userInfo["admin"]) {
    header("Location: index_admin.php");
  }

  require("../Controllers/produits.php");
  include("carte_panier.php");

  $products = getProductsFromCart(getCart());

  $total = 0;
  foreach ($products as $prod) {
    $total += $prod["prix"] * $prod["quantite"];
  }
?>


  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/x-icon" href="../Style/assets/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="../Style/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Style/panier_style.css" />
  </head>

  <body>
    <?php require("nav_bar.php"); ?>

    <section style="background-color: #eee;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col">

            <div class="card">
              <div class="card-body p-4">

                <div class="row">
                  <div class="col-lg-7">
                    <h5 class="mb-3"><a href="catalogue.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Revenir</a></h5>
                    <hr>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <div>
                        <p class="mb-3 h1">Panier</p>
                        <p class="mb-0">Vous <?php echo getCartItemCount(); ?> item dans votre panier</p>
                      </div>
                    </div>
                    <?php
                    foreach ($products as $item) {
                      showCartItem($item);
                    }
                    ?>
                  </div>
                  <div class="col-lg-5">

                    <div class="card bg-secondary text-white rounded-3">
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                          <h5 class="mb-0">Informations bancaires</h5>
                        </div>

                        <p class="small mb-2">Type de carte</p>
                        <a type="submit" class="text-white"><i class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                        <a type="submit" class="text-white"><i class="fab fa-cc-visa fa-2x me-2"></i></a>
                        <a type="submit" class="text-white"><i class="fab fa-cc-amex fa-2x me-2"></i></a>
                        <a type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                        <form class="mt-4">
                          <div class="form-outline form-white mb-4">
                            <input type="text" id="typeName" class="form-control form-control-lg" siez="17" placeholder="Détenteur de la carte" />
                            <label class="form-label" for="typeName">Nom du détenteur de la carte</label>
                          </div>

                          <div class="form-outline form-white mb-4">
                            <input type="text" id="typeText" class="form-control form-control-lg" siez="17" placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                            <label class="form-label" for="typeText">Numéro de carte</label>
                          </div>

                          <div class="row mb-4">
                            <div class="col-md-6">
                              <div class="form-outline form-white">
                                <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YY" size="5" id="exp" minlength="5" maxlength="5" />
                                <label class="form-label" for="typeExp">Date d'expiration</label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-outline form-white">
                                <input type="password" id="typeText" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                <label class="form-label" for="typeText">Cvv</label>
                              </div>
                            </div>
                          </div>

                        </form>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between">
                          <p class="mb-2">Sous-total</p>
                          <p class="mb-2"><?php echo $total ?>€</p>
                        </div>

                        <div class="d-flex justify-content-between">
                          <p class="mb-2">Frais de port</p>
                          <p class="mb-2">0€</p>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                          <p class="mb-2">Total</p>
                          <p class="mb-2"><?php echo $total ?>€</p>
                        </div>

                        <form action="confirmation_commande.php" method="post">
                          <button class="btn btn-block btn-lg red" <?php if (getCartItemCount() == 0) echo "disabled" ?>>
                            <?php echo $total ?>€ Valider <i class="fas fa-long-arrow-alt-right"></i>
                          </button>
                        </form>

                      </div>
                    </div>
                    <form action="" method="post">
                      <button type="submit" name="empty" class="btn btn-block btn-lg black margin">
                        <div class="d-flex justify-content-between">
                          Vider le panier
                        </div>
                      </button>
                    </form>
                  </div>

                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- Footer-->
    <?php require("footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>

  </html>

<?php
}
?>