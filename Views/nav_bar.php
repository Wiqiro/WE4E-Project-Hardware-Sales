<?php
global $loginSuccessful, $loginAttempted, $userInfo;

if ($loginAttempted == true && $loginSuccessful == false) {
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        openPopup();
    });
</script>";
}
?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="index.php"><span>LD</span><span class="color-red">LD</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="catalogue.php">Catalogues</a></li>
                <?php if ($loginSuccessful == false) {

                ?>
                    <li class="nav-item"><a class="nav-link cursor" onclick="openPopup()">Login</a></li>
                <?php
                } else { ?>
                    <li class="nav-item hover-properties">
                        <a class="nav-link cursor" onclick="openAccount()">Compte</a>

                        <div class="logout-popup">
                            <?php echo $userInfo['prenom'], ' ', $userInfo['nom']; ?>
                            <br>
                            <form action="" method="POST">
                                <input type="submit" class="btn-logout" value="Se déconnecter" name="disconnect" />
                            </form>
                        </div>
                    </li>
                <?php } ?>
                <div class="d-flex">
                    <a href="panier.php">
                        <button class="btn btn-outline-light" type="button">
                            <!-- <i class="bi-cart-fill me-1"></i> -->
                            Panier
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo getCartItemCount() ?></span>
                        </button>
                    </a>
                </div>
            </ul>
        </div>
    </div>
</nav>
<section id="popup" class="popup"><?php require("popup_login.php"); ?></section>
<section id="account" class="account"><?php require("compte.php"); ?></section>