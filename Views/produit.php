<?php

if (!isset($_GET["id"])) {
	header("Location: index.php");
} elseif ((isset($_POST["add-to-cart"]) || isset($_POST["order"])) && isset($_POST["quantity"])) {
	require("../Controllers/panier.php");
	addProductToCart($_GET["id"], $_POST["quantity"]);
	if (isset($_POST["order"])) {
		header("Location: panier.php");
	} else {
		header("Refresh:0");
	}
} else {

	global $loginSuccessful, $userInfo;
	$catalog_name = 'Nom du catalogue';
	$id = $_GET["id"];

	include("../Controllers/initialize.php");
	include("carte_produit.php");
	$product = getProductFromId($id);
	$specs = getProductSpecifications($id);


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
				<div class="btn-back-catalog"><img class="back-arrow" src="../Style/assets/img/back.png" alt="back arrow"> <a href="<?php echo "catalogue.php?id=" . $product["catalogueID"] . "&page=1" ?>" class="back-catalog"><?php echo ($product["catalogue"]); ?></a></div>
				<br>
				<div class="row gx-4 gx-lg-5 align-items-center">
					<div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div>
					<div class="col-md-6">
						<h1 class="display-5 fw-bolder mb-4"><?php echo $product["nom"] ?></h1>
						<h1 class="mb-5"><?php echo $product["prix"] ?>€</h1>

						<h4 class="center mb-3">Description</h4>
						<p class="lead mb-5"><?php echo $product["description"] ?></p>
						<h4 class="center mb-3">Specifications</h4>
						<div class="lead mb-5">
							<?php
							foreach ($specs as $spec) {
								echo "<strong>" . $spec["nom"] . "</strong>: " . $spec["valeur"] . "<br>";
							}
							?>
						</div>

						<?php if ($loginSuccessful == true) { ?>
							<form action="" method="POST">
								<div class="d-flex">
									<input class="form-control text-center me-3" name="quantity" type="num" value="1" maxlength="2" style="max-width: 3rem" />
									<button class="btn btn-outline-dark flex-shrink-0" name="add-to-cart" type="submit">
										<i class="bi-cart-fill me-1"></i>
										Ajouter au panier
									</button>
									<div class="space"></div>
									<button class="btn btn-outline-dark flex-shrink-0" name="order" type="submit">
										Commander maintenant
									</button>
								</div>
							</form>
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
					showProductCard(1, "Product", 12.45, "https://dummyimage.com/450x300/dee2e6/6c757d.jpg");
					showProductCard(1, "Product", 12.45, "https://dummyimage.com/450x300/dee2e6/6c757d.jpg");
					showProductCard(1, "Product", 12.45, "https://dummyimage.com/450x300/dee2e6/6c757d.jpg");
					showProductCard(1, "Product", 12.45, "https://dummyimage.com/450x300/dee2e6/6c757d.jpg");
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

<?php
}
?>