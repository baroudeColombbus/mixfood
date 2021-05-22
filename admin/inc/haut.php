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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <title>MIXFOOD</title>
</head><!-- / fin head -->
<!-- body -->

<body class="">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-expand-md static-top">
        <div class="container">
            <img src="../img/mixfoodNoir.png" alt="logo-mixfood" width="10%" height="10%" class="mt-3 img-responsive mb-3">
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-end" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link m-4" href="../index.php">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
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
                        <a class="nav-link m-4" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle m-4" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">ADMIN</a>
                        <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Gestion</a></li>
                            <li><a class="dropdown-item" href="#">Produits</a></li>
                            <li><a class="dropdown-item" href="#">Commandes</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container-fluid col-sm-12 col-lg-2">

            <a href="inscription_client2.php">
                <button class="btn btn-warning mr-1 mb-1 mx-auto boutonNav" id="btn-inscription">S'inscrire</button>
            </a>
            <a href="connexion_client.php" class="mx-auto">
                <button class="btn btn-warning mx-auto mb-1 mx-auto boutonNav" id="btn-connexion" style="width:150%;">Se connecter</button>
            </a>

        </div>
    </nav>