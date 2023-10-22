<?php $nbCommand = 2;
$isAdmin = true;
$salesRevenue = 15000;
?>


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
                                        <a href="index_admin.php" class="text-body">
                                            <i class="fas fa-long-arrow-alt-left me-2"></i>
                                            Retour
                                        </a>
                                    </h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-0">Il y a <?php echo $nbCommand; ?>
                                                <?php if ($nbCommand > 1) { ?>
                                                    commandes</p>
                                        <?php } else { ?>
                                            commande </p>
                                        <?php } ?>
                                        </div>
                                        <p>Le chiffre d'affaire total du mois est de <?php echo $salesRevenue; ?>$</p>
                                    </div>

                                    <?php require("carte_commande.php"); ?>
                                    <?php require("carte_commande.php"); ?>

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