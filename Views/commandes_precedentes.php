<?php $nbCommand = 2; ?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Commandes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="../Style/panier_style.css" />
</head>

<body>

  <section style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">

          <div class="card">
            <div class="card-body p-4">

              <div class="row">
                <div class="col-lg-12">
                  <h5 class="mb-3">
                    <a href="index.php" class="text-body">
                      <i class="fas fa-long-arrow-alt-left me-2"></i>
                      Acceuil
                    </a>
                  </h5>
                  <hr>

                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                      <p class="mb-0">Vous avez effectué <?php echo $nbCommand; ?>
                        <?php if ($nbCommand > 1) { ?>
                          commandes</p>
                    <?php } else { ?>
                      commande </p>
                    <?php } ?>
                    </div>
                  </div>

                  <!--
Affichant pour chacune le nom du client, la date/heure, le prix total, ainsi que les
produits contenus dans cette commande (références avec images et/ou textes selon votre
préférence).
                    -->


                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                          <div>
                          <img src="../Style/assets/commandes.png" class="img-fluid rounded-3" alt="image commande" style="width: 65px;">
                            </div>
                          <div class="ms-3">
                            <a class="link-style" href="produit.php">
                              <h5>Numéro de commande</h5>
                            </a>
                            <p class="medium mb-3">Date de commande</p>
                            <div class="row">
                              <div class="col-lg-6">
                                <p class="small mb-0">Produit 1</p>
                                <p class="small mb-0">Produit 2</p>
                                <p class="small mb-0">Produit 3</p>
                                <p class="small mb-0">Produit 4</p>
                                <p class="small mb-0">Produit 5</p>
                              </div>
                              <div class="col-lg-6">
                                <p class="small mb-0">Produit 6</p>
                                <p class="small mb-0">Produit 7</p>
                                <p class="small mb-0">Produit 8</p>
                                <p class="small mb-0">Produit 9</p>
                                <p class="small mb-0">Produit 10</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                          <div style="width: 50px;">
                            <h5 class="fw-normal mb-0">3</h5>
                          </div>
                          <div style="width: 80px;">
                            <h5 class="mb-0">$Total</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                          <div>
                            <img src="../Style/assets/commandes.png" class="img-fluid rounded-3" alt="image commande" style="width: 65px;">
                          </div>
                          <div class="ms-3">
                            <a class="link-style" href="produit.php">
                              <h5>Numéro de commande</h5>
                            </a>
                            <p class="medium mb-3">Date de commande</p>
                            <div class="row">
                              <div class="col-lg-6">
                                <p class="small mb-0">Produit 1</p>
                                <p class="small mb-0">Produit 2</p>
                                <p class="small mb-0">Produit 3</p>
                                <p class="small mb-0">Produit 4</p>
                                <p class="small mb-0">Produit 5</p>
                              </div>
                              <div class="col-lg-6">
                                <p class="small mb-0">Produit 6</p>
                                <p class="small mb-0">Produit 7</p>
                                <p class="small mb-0">Produit 8</p>
                                <p class="small mb-0">Produit 9</p>
                                <p class="small mb-0">Produit 10</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                          <div style="width: 50px;">
                            <h5 class="fw-normal mb-0">1</h5>
                          </div>
                          <div style="width: 80px;">
                            <h5 class="mb-0">$Total</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

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