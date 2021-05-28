<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Les icônes-->
    <script src="https://kit.fontawesome.com/b41dcf0f5f.js" crossorigin="anonymous"></script>

    <!-- normalize -->
    <link rel="stylesheet" href="scss/normalize.css">

    <!-- Les styles -->
    <link rel="stylesheet" href="scss/style.css">

    <!-- Les typographies -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Give+You+Glory&family=Rock+Salt&display=swap" rel="stylesheet">

    <title>MIXFOOD</title>
</head><!-- / fin head -->
<!-- body -->

<body class="">

    <!-- navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-expand-md static-top">
        <div class="container col-md-6 col-lg-9">
            <picture>
                <!-- affichage logo mode mobile -->
                <source media="(max-width: 1024px)" srcset="img/logoMobile.png 1x" class="logoMobile">
                <!-- affichage logo mode destok -->
                <source media="(min-width: 1024px)" srcset="img/logoBlanc.png 2x" class="logoDestok">
                <img src="img/logoBlanc.png" alt="logo-mixfood" class="mt-3 img-responsive mb-3">
            </picture>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-end" id="navbar">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item active">
                        <a class="nav-link m-4 espace" href="index.php">MIXFOOD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link m-4 espace " href="pizza.php">Nos pizza</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link m-4 espace " href="sushi.php">Nos sushi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link m-4 espace" href="contact.php">Contact</a>
                    </li>

                </ul>

            </div>
        </div>
        <div class="container col-sm-11 col-md-6 col-lg-3 mx-auto justify-content-center navbar-collapse collapse ">
            <?php

            // visible pour les administrateurs
            if (estAdmin()) {
                echo '<ul class="navbar-nav align-items-center d-none d-lg-block">';
                echo '<li class="nav-item"><a class="nav-link lienBlanc espace" href="admin/manage_utilisateur_client.php">ADMIN</a></li>';
                echo '<li class=" nav-item"><a class="nav-link lienBlanc espace" href="admin/gestion_produit.php">Produit</a></li>';
                echo '<li class=" nav-item"><a class="nav-link lienBlanc espace" href="#">Commande</a></li></ul>';
            }

            if (estConnecte()) { // si membre utilisateur connecté
                echo '<button class="btn btn-success nav-item m-2"><a class="nav-link lienBlanc espace" href="admin/profil_client.php">Profil</a></button>';
                echo '<button class="btn btn-success nav-item"><a class="nav-link lienBlanc espace" href="admin/profil_client.php?action=deconnexion">Déconnexion</a></button>';
            } else { //sinon
                echo '<button class=" btn btn-success nav-item m-2"><a class="nav-link lienBlanc espace" href="admin/inscription_client2.php">Inscription</a></button>';
                echo '<button class=" btn btn-success nav-item lienBlanc"><a class="nav-link lienBlanc espace" href="admin/connexion_client2.php">Connexion</a></button>';
            }
            ?>

        </div>
    </nav>