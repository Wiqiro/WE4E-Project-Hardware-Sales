<?php
global $loginSuccessful, $loginAttempted, $userInfo;
include("../Controllers/initialize.php");

if ($loginAttempted && isset($_GET["page"])) {
    if (!$loginSuccessful || !$userInfo["admin"]) {
        header("Location: index.php");
    }
} else {
    header("Location: index_admin.php");
}
include("../Controllers/commandes.php");
if (isset($_POST["delete-command"]) && isset($_POST["command-id"])) {
    deleteCommand($_POST["command-id"]);
}

require("carte_commande.php");

$page = $_GET["page"];
$pCount = getCommandCount();
$pageCount = $pCount % 10 === 0 ? floor($pCount / 10) : ceil($pCount / 10);

$commands = getCommands($page);
$commandCount = count($commands);
$revenue = monthRevenue();
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="../Style/assets/favicon.ico" />
    <title>Commandes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="../Style/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Style/style_index_admin.css" />

</head>

<body>
    <h1>Gestion de catalogue</h1>

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
                                        <p class="mb-0">Il y a <?php echo $commandCount; ?>
                                            <?php if ($commandCount > 1) { ?>
                                                commandes</p>
                                    <?php } else { ?>
                                        commande </p>
                                    <?php } ?>
                                    </div>
                                    <p>Le chiffre d'affaire total du mois est de <?php echo $revenue ?>€</p>
                                </div>

                                <?php
                                foreach ($commands as $command) {
                                    showCommandCard($command, true);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row align">
        <?php
        for ($i = $page - 3; $i <= $page + 3; $i++) {
            if ($i > 0 && $i <= $pageCount && $i != $page) {
                echo '<a class="pageBtn" href="inventaire_commandes.php?page=' . $i . '">' . $i . '</a>';
            }
        }
        ?>
        <?php
        if ($page < $pageCount) {
            echo '<div class="pageBtn">...</div>
                    <a class="pageBtn" href="inventaire_commandes.php?page=' . $page + 1 . '">Next</a>
                    <a class="pageBtn" href="inventaire_commandes.php?page=' . $pageCount . '">Last</a>';
        }
        ?>
    </div>

    <!-- Footer-->
    <?php require("footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>