<?php
require_once 'inc/init.php';

// $contenu est dans la page init.php

$contenu = '';

if (!empty($_POST)) { // Si des données sont en POST
    jeprint_r($_POST);
    // GESTION DES DONNEES POST ENVOYEES
    // strlen pour mesurer la longueur, le nombre de caractères // isset veut dire il est etablit

    if (!isset($_POST['mot_de_passe']) || strlen($_POST['mot_de_passe']) < 4 || strlen($_POST['mot_de_passe']) > 20) {
        $contenu .= '<div class="alert alert-danger">Le mot de passe doit contenir entre 4 et 20 caractères.</div>';
    } // fin du if isset mdp

    if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) {
        $contenu .= '<div class="alert alert-danger">Le nom doit contenir entre 2 et 20 caractères.</div>';
    } // fin du if isset nom

    if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) {
        $contenu .= '<div class="alert alert-danger">Le prénom doit contenir entre 2 et 20 caractères.</div>';
    } // fin du if isset prenom

    if (!isset($_POST['email']) || strlen($_POST['email']) > 50 || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        // filter_var -> filtre de variable // dans ce filtre on passe la fonction préféfinie FILTER_VALIDATE_EMAIL (c'est une constante elle est écrite en majuscule. Cette fonction vérifie que le format est bien un format email)
        $contenu .= '<div class="alert alert-danger">Votre email n\'est pas conforme.</div>'; // 
    } // fin if !isset email

    if (!isset($_POST['telephone']) || !preg_match('#^[0-9]{10}$#', $_POST['telephone'])) {
        $message .= '<div class="alert alert-danger">le numéro saisi n\'est pas valide.</div>'; // est ce que le code postal correspond à l'expression régulière : la "regex" regular 
    } //  if (!isset($_POST['telephone'])

    if (!isset($_POST['adresse']) || strlen($_POST['adresse']) < 6 || strlen($_POST['adresse']) > 50) {
        $contenu .= '<div class="alert alert-danger">L\'adresse est elle complète?</div>';
    } // fin du if isset adresse

    // vérifier que la saisie soit bien des chiffres avec des expressions régulières
    if (!isset($_POST['code_postal']) || !preg_match('#^[0-9]{5}$#', $_POST['code_postal']) > 5) { // est ce que le code postal correspond à l'expression régulière précisée
        $contenu .= '<div class="alert alert-danger">Le code postal n\'est pas conforme.</div>';
    } // fin du if isset code_postal

    if (!isset($_POST['ville']) || strlen($_POST['ville']) < 1 || strlen($_POST['ville']) > 20) {
        $contenu .= '<div class="alert alert-danger">La ville doit contenir entre 1 et 20 caractères.</div>';
    } // fin du if isset ville

    if (empty($contenu)) { // si la variable est vide c'est qu'il n'y a pas d'erreur sur le form
        $membre = executeRequete(
            " SELECT * FROM utilisateur WHERE email = :email",
            array(':email' => $_POST['email'])
        );

        if ($membre->rowCount() > 0) { // si la requête retourne des lignes c'est que le pseudo existe déjà
            $contenu .= '<div class="alert alert-danger">Cet email n\'est pas disponible</div>';
        } else { // si on inscrit le membre en BDD
            $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); // cette fonction prédéfinie permet de hasher/crypter le mot de passe selon l'algorithme actuel "bcrypt" dans la BDD.  Il faudra lors de la connexion comparer le hash de la BDD avec celui du mdp de l'intérieur

            $succes = executeRequete(
                " INSERT INTO utilisateur (nom,prenom, email, telephone, mot_de_passe,adresse, ville, code_postal,date_enregistrement,statut_utilisateur) VALUES (:nom, :prenom, :email, :telephone, :mot_de_passe, :adresse, :ville, :code_postal, now(), 'client')",
                array(
                    ':nom'              => $_POST['nom'],
                    ':prenom'           => $_POST['prenom'],
                    ':email'            => $_POST['email'],
                    ':telephone'        => $_POST['telephone'],
                    ':mot_de_passe'     => $_POST['mot_de_passe'], //on prend le mot de passe hashé
                    ':adresse'          => $_POST['adresse'],
                    ':ville'            => $_POST['ville'],
                    ':code_postal'      => $_POST['code_postal'],

                )
            );

            if ($succes) {
                $contenu .= '<div class="alert alert-success">Vous êtes inscrit <a href="02_connexion.php">Cliquez ici pour vous connecter</a></div>';
            } else {
                $contenu .= '<div class="alert alert-danger">Erreur lors de l`\enregistrement !</div>';
            } //fin du if $success
        } // fin du if ... else
    } // fin empty $contenu
} // fin du if !empty $_POST
?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>La boutique - Inscription</title>

    <!-- Mes styles -->
    <link href="css/style2.css" rel="stylesheet">
</head>

<body>
    <!-- ********************************-->
    <!-- CONTENU PRINCIPAL -->
    <!-- ********************************-->
    <main class="container bg-white m-4 mx-auto p-4">
        <div class="row">
            <div class="col-sm-12 col-md-6 border border-success m-auto mb-4 alert alert-success">
                <h1 class="text-center">La boutique</h1>
            </div><!-- Fin de col -->
        </div><!-- Fin row -->

        <div class="row">
            <div class="col-sm-12 col-md-6 mx-auto pb-4">
                <h3 class="p-5 alert alert-warning text-center">INSCRIVEZ-VOUS</h3>
                <?php
                echo $contenu;
                ?>
                <!-- DEBUT DU FORMULAIRE -->
                <form method="POST" action="" class="p-5 m-2 border border-success alert alert-success">


                    <div class="form-group p-2">
                        <!-- nom -->
                        <label for="nom" class="p-2">Nom de famille*</label>
                        <input type="text" class="form-control text-right" name="nom" id="nom" value="<?php echo $_POST['nom'] ?? ''; ?>">
                    </div>
                    <div class="form-group p-2">
                        <!-- prenom -->
                        <label for="prenom" class="p-2">Prénom*</label>
                        <input type="text " class="form-control text-right" name="prenom" id="prenom" value="<?php echo $_POST['prenom'] ?? ''; ?>">
                    </div>
                    <div class="form-group p-2">
                        <!-- mot_de_passe -->
                        <label for="mot_de_passe" class="p-2">Mot de passe*</label>
                        <input type="password" class="form-control text-right" name="mot_de_passe" id="mot_de_passe">
                        <small class='bg-success text-white'>votre mot de passe doit contenir 4 à 20 caractères</small>
                    </div>
                    <div class="form-group p-2">
                        <!-- mail -->
                        <label for="email" class="p-2">Adresse éléctronique*</label>
                        <input type="email" class="form-control text-right" name="email" id="email" value="<?php echo $_POST['email'] ?? ''; ?>">
                    </div>
                    <div class=" form-group mt-2">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="text" name="telephone" class="form-control" id="telephone">
                    </div>
                    <div class="form-group mt-2">
                        <!-- adresse -->
                        <label for="adresse">Adresse postale*</label>
                        <textarea name="adresse" id="adresse" class="form-control"><?php echo $_POST['adresse'] ?? ''; ?></textarea>
                    </div>
                    <div class="form-group p-2">
                        <!-- code_postal -->
                        <label for="code_postal" class="p-2">Code Postal*</label>
                        <input type="text" class="form-control text-right" name="code_postal" id="code_postal" value="<?php echo $_POST['code_postal'] ?? ''; ?>">
                    </div>
                    <div class="form-group p-2">
                        <!-- ville -->
                        <label for="ville" class="p-2">Ville*</label>
                        <input type="text" class="form-control" name="ville" id="ville" value="<?php echo $_POST['ville'] ?? ''; ?>">
                    </div>

                    <div class="form-group text-center">
                        <!-- bouton envoyer -->
                        <button type="button" class="btn btn-small btn-success mt-3"><a href="connexion_client2.php"> Se connecter</a></button>
                        <button type="submit" class="btn btn-small btn-warning mt-3">S'inscrire</button>
                    </div>
                    <div class="form-group text-center">
                        <!-- bouton reseat formulaire -->
                        <input class="btn btn-danger mt-4" type="reset" value="Reset">
                    </div>
                </form> <!-- fin de formulaire -->
            </div><!-- Fin de col -->
        </div><!-- Fin de row -->


    </main><!-- Fin container -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>