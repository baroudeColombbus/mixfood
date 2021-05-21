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
    <link rel="stylesheet" href="scss/normalize.css">

    <!-- Les styles -->
    <link rel="stylesheet" href="scss/style.css">

    <!-- Les typographies -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <title>MIXFOOD - accueil</title>
</head>

<body class="">
    <?php
    require_once 'inc/navbar.php';
    include 'inc/diaporama.php';
    ?>

    <!-- /container principal -->
    <div class="container m-auto">
        <h2 class="text-center mt-4 text-light">Votre choix</h2>

        <div class="row  text-center mb-5">
            <div class="col-lg-6 mt-3">
                <a href="pizza.html"> <img src="img/pizza-napolitaine.jpg" alt="Pizza" class="img-curvy img-thumbnail img-responsive" width="65%" height="65%"></a>
            </div>
            <div class="col-lg-6 mt-3">
                <a href="sushi.html"> <img src="img/sushi9.jpg" alt="Sushi" class="img-curvy img-thumbnail img-responsive" width="65%" height="65%"></a>
            </div>

        </div>

    </div><!-- /fin container principal -->

    <?php
    include 'inc/bas.php';
    ?>