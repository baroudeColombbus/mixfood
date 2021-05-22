<?php
require_once 'inc/init.php';
//1- Vérification de la session : 
jeprint_r($_SESSION);
// require_once 'inc/header.php';

// Accès à la page quand on est autorisé, connexion membre obligatoire
if (!estConnecte()) {
    header('location:connexion-client2.php'); // renvoie à la page de connexion
}
?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>MIXFOOD - Votre profil </title>
    <!-- mes styles  -->
    <link rel="stylesheet" href="../scss/style.css">
</head>

<body>

    <main class="container bg-white m-4 mx-auto p-4">
        <div class="col-sm-12 col-md-8 col-lg-6 border border-success mx-auto m-4 p-4">
            <h1 class="mt-4 text-center">Bienvenue sur votre profil</h1>
            <h2 class="bg-primary text-white text-center">Bonjour <?php echo $_SESSION['utilisateur']['prenom']; ?> !</h2>
            <!--Pour afficher pseudo il faut aller dans le tableau $_SESSION puis à l'indice ['membre'] puis à l'intérieur à l'indice ['pseudo'] pour accéder à la valeur pseudo, voir le debug jeprint_r plus haut-->
            <?php
            if (estAdmin()) {
                echo '<p>Vous êtes un administrateur</p>';
                echo '<a class="btn btn-secondary" href=" #"> Admin</a>';
                echo '<a class="btn btn-secondary" href=" #"> Produit</a>';
                echo '<a class="btn btn-secondary" href=" #"> Commande</a>';
            } else {
                echo '<p>Vous êtes un client</p>';
            }

            ?>
            <hr>
            <h3>Informations de profil</h3>
            <p>Email : <?php echo $_SESSION['utilisateur']['email']; ?> </p>
            <p>Adresse : <?php echo $_SESSION['utilisateur']['adresse']; ?> </p>
            <p>Code postal : <?php echo $_SESSION['utilisateur']['code_postal']; ?> </p>
            <p>Ville : <?php echo $_SESSION['utilisateur']['ville']; ?> </p>
            <p>Numéro de téléphone : <?php echo $_SESSION['utilisateur']['telephone']; ?> </p>

        </div>

    </main>

    <!--  Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    -->
</body>

</html>