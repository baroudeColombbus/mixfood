<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <!-- Les icônes-->
    <script src="https://kit.fontawesome.com/b41dcf0f5f.js" crossorigin="anonymous"></script>

    <!-- normalize -->
    <link rel="stylesheet" href="../scss/normalize.css">

    <!-- Les styles -->
    <link rel="stylesheet" href="../scss/style.css">

    <!-- Les typographies -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Give+You+Glory&family=Rock+Salt&display=swap" rel="stylesheet">

    <title>MIXFOOD</title>
</head><!-- / fin head -->
<!-- body -->

<body class="">

    <!-- navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-expand-md static-top">
        <div class="container">
            <img src="../img/mixfoodNoir.png" alt="logo-mixfodd" width="10%" height="10%" class="mt-3 img-responsive mb-3">
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-end" id="navbar">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item active">
                        <a class="nav-link m-4" href="../index.php">Accueil</a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle m-4" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</a>
                        <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="../pizza.html">Pizza</a></li>
                            <li><a class="dropdown-item" href="../sushi.html">Sushi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link m-4" href="#">Qui sommes-nous ?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link m-4" href="../contact.php">Contact</a>
                    </li>
                </ul>

            </div>
        </div>
        <div class="container-fluid col-sm-12 col-lg-5 mx-auto">
            <?php

            // visible pour les administrateurs
            if (estAdmin()) {
                echo '<button class="btn btn-success nav-item"><a class="nav-link" href="manage_utilisateur_client.php">ADMIN</a></button>';
                echo '<button class="btn btn-success nav-item"><a class="nav-link" href="gestion_produit.php">Produit</a></button>';
                echo '<button class="btn btn-success nav-item"><a class="nav-link" href="#">Commande</a></button>';
            }

            if (estConnecte()) { // si membre utilisateur connecté
                echo '<button class="btn btn-success nav-item"><a class="nav-link" href="profil_client.php">Profil</a></button>';
                echo '<button class="btn btn-success nav-item"><a class="nav-link" href="profil_client.php?action=deconnexion">Se déconnecter</a></button>';
            } else { //sinon
                echo '<button class=" btn btn-success nav-item"><a class="nav-link" href="inscription_client2.php">Inscription</a></button>';
                echo '<button class=" btn btn-success nav-item"><a class="nav-link" href="connexion_client2.php">Connexion</a></button>';
            }
            ?>

        </div>
    </nav>