<?php
require_once 'inc/init.php';
$message = '';
$contenu = '';


// Vérification si membre est déjà connecté : 
if (estConnecte()) { // si membre déjà connecté on le renvoie vers son profil 
    header('location:../index.php'); //redirection vers la page profil.php script que l'on quitte tout de suite
    exit(); // pour quitter le script header() est une fonction prédéfinie
}
//Traitement du formulaire de connexion
// jeprint_r($_POST);
if (!empty($_POST)) { // si le formulaire est envoyé
    // validation du formulaire 
    if (empty($_POST['email']) || empty($_POST['mot_de_passe'])) { // si le chmap pseudo est vide ou la chmap mdp est vide.
        $contenu .= '<div class="alert alert-danger">Veuillez fournir vos informations de connexion</div>';
    } /*fin du if !isset pseudo et mdp */

    // sur le formulaire on vérifie le pseudo et le mdp en deux temps
    if (empty($contenu)) { // si la variable $contenu est vide c'est qu'il n'y a pas d'erreurs 
        // requête en BDD les informations du membre pour l'email fourni par l'internaute
        $resultat = executeRequete(" SELECT * FROM utilisateur WHERE email = :email", array(':email' => $_POST['email']));
        if ($resultat->rowCount() == 1) {

            // traitement du mot de passe 
            $membre = $resultat->fetch(PDO::FETCH_ASSOC); // on fetch l'objet $resultat en un tableau associatif qui contient toutes les informations du membre. 
            jeprint_r($membre);

            if (password_verify($_POST['mot_de_passe'], $membre['mot_de_passe'])) { // si le hash du mdp de la bdd correspond au mdp du formulaire, alors password_verify retourne true
                $_SESSION['membre'] = $membre; // nous créons une session avec (une session est un fichier sur le serveur) avec les informations du membre provenant de la BDD )
                // redirection du membre vers l'accueil
                header('location:../index.php');
                exit();
            } else {
                $contenu .= '<div class="alert alert-danger">Erreur sur les identifiants 1.</div>';
            } /*fin  if (password_verify($_POST['mdp'], $membre['mdp']))*/
        } else {
            $contenu .= '<div class="alert alert-danger">Erreur sur les identifiants 2.</div>';
        } /*fin if ($resultat)*/
    } /*if (empty($contenu))*/
} /*if !empty($_POST)*/
// require_once 'inc/header.php';
echo $message; //pour afficher le message lors de la connexion
echo $contenu; //pour affciher les autres messages
// jeprint_r($_SESSION);
jevardump($_SESSION);

// Déconnexion de l'internaute
jeprint_r($_POST);
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') { // si existe action dans l'url et que sa valeur est "deconnexion" on peut sortir c'est que le membre veut se déconnecter 
    unset($_SESSION['membre']); // on supprime le membre de la session (tout le contenu du tableau membre)
    $message = '<div class="alert alert-primary">Vous êtes déconnecté.</div>';
}
// jeprint_r($_GET);
?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>La Boutique - Connexion</title>
    <!-- mes styles  -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    // require_once 'inc/navbarNEW.php';
    ?>
    <main class="container bg-white m-4 mx-auto p-4">
        <div class="col-sm-12 col-md-8 col-lg-6 border border-success mx-auto m-4 p-4">
            <form class="form-signin p-4" method="POST" action="">
                <h1 class="h3 mb-3 font-weight-normal">Connectez-vous</h1>
                <div class="form-group mt-2">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="votre email" autofocus name="email">
                </div>
                <div class="form-group mt-2">
                    <label for="mot_de_passe" class="sr-only">Mot de passe</label>
                    <input type="password" id="mot_de_passe" class="form-control" placeholder="vous seul le connaissez !" name="mot_de_passe">
                </div>
                <button class="btn btn-sm btn-primary btn-block mt-2" type="submit">Connexion</button>
                <p class="mt-5 mb-3 text-muted">Connectez-vous pour administrer "La Boutique"</p>
            </form>
            <p class="small">Vous n'êtes pas inscrit ? <a href="inscription_client2.php">Inscrivez-vous ici.</a> - <a href="">Retour sur le site</a></p>
        </div>
    </main>
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