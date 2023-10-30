<?php
if (isset($_POST["remove-cart-item"])) {
  include("../Controllers/panier.php");
  removeCartItem($_POST["remove-cart-item"]);
  header("Refresh:0");
} else {
  require("../Controllers/initialize.php");
  include("item_panier.php");



  $products = getProductsFromCart(getCart());
?>


  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
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
                    <h5 class="mb-3"><a href="catalogue.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                    <hr>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <div>
                        <p class="mb-1">Shopping cart</p>
                        <p class="mb-0">You have <?php echo getCartItemCount(); ?> items in your cart</p>
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
                          <h5 class="mb-0">Card details</h5>
                          <img src="https://ik.imagekit.io/pimberly/595e406f0f15f30010780448/tr:w-1000,h-1000,cm-pad_resize/696d6cec/5d70c6b06cb2114d580001de.jpg?product_name=Coca-Cola-Soft-Drink-330ml-Can-(Pack-of-24)-402002.jpg" class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                        </div>

                        <p class="small mb-2">Card type</p>
                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-visa fa-2x me-2"></i></a>
                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-amex fa-2x me-2"></i></a>
                        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                        <form class="mt-4">
                          <div class="form-outline form-white mb-4">
                            <input type="text" id="typeName" class="form-control form-control-lg" siez="17" placeholder="Cardholder's Name" />
                            <label class="form-label" for="typeName">Cardholder's Name</label>
                          </div>

                          <div class="form-outline form-white mb-4">
                            <input type="text" id="typeText" class="form-control form-control-lg" siez="17" placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                            <label class="form-label" for="typeText">Card Number</label>
                          </div>

                          <div class="row mb-4">
                            <div class="col-md-6">
                              <div class="form-outline form-white">
                                <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YY" size="5" id="exp" minlength="5" maxlength="5" />
                                <label class="form-label" for="typeExp">Expiration</label>
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
                          <p class="mb-2">Subtotal</p>
                          <p class="mb-2">$4798.00</p>
                        </div>

                        <div class="d-flex justify-content-between">
                          <p class="mb-2">Shipping</p>
                          <p class="mb-2">$20.00</p>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                          <p class="mb-2">Total (Incl. taxes)</p>
                          <p class="mb-2">$4818.00</p>
                        </div>

                        
                        <button class="btn btn-block btn-lg red">
                          $4818.00 Checkout <i class="fas fa-long-arrow-alt-right"></i>
                        </button>

                      </div>
                    </div>
                    <button type="button" class="btn btn-block btn-lg black margin">
                      <div class="d-flex justify-content-between">
                        Vider le panier
                      </div>
                    </button>
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