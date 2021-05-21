<?php

$message = '';

// jeprint_r($_GET);
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
    unset($_SESSION['membre']);
    $message = '<div class="alert alert-primary">Vous êtes déconnecté.</div>';
}
// 3- Vérification si membre est déjà connecté : 
if (estConnecte()) {
    header('location:../index.php'); //redirection vers l'accueil
    exit();
}
// 1- Traitement du formulaire de connexion
// jeprint_r($_POST);
if (!empty($_POST)) {
    if (empty($_POST['pseudo']) || empty($_POST['mdp'])) {
        $contenu .= '<div class="alert alert-danger">Le pseudo doit contenir entre 4 et 20 caractères.</div>';
    }
    if (empty($contenu)) {
        $resultat = executeRequete(" SELECT * FROM utilisateur WHERE pseudo = :pseudo", array(':pseudo' => $_POST['pseudo']));
        if ($resultat->rowCount() == 1) { //Si il y une ligne dans la requête c'est que le pseudo est en BDD sinon 
            // traitement du mot de passe 
            $membre = $resultat->fetch(PDO::FETCH_ASSOC); // on fetch l'objet $resultat en un tableau associatif qui contient toutes les informations du membre. 
            // jeprint_r($membre);
            if (password_verify($_POST['mdp'], $membre['mdp'])) { // si le hash du mdp de la bdd correspond au mdp du formulaire, alors password_verify retourne true
                $_SESSION['membre'] = $membre; // nous créons une session avec (une session est un fichier sur le serveur) avec les informations du membre provenant de la BDD )
                // redirection du membre vers son profil 
                header('location:05_profil.php');
                exit();
            } else {
                $contenu .= '<div class="alert alert-danger">Erreur sur les identifiants.</div>';
            } /*fin  if (password_verify($_POST['mdp'], $membre['mdp']))*/
        } else {
            $contenu .= '<div class="alert alert-danger">Erreur sur les identifiants.</div>';
        } /*fin if ($resultat)*/
    } /*if (empty($contenu))*/
} /*if !empty($_POST)*/
// require_once 'inc/header.php';
echo $message; //pour afficher le message lors de la connexion
echo $contenu; //pour affciher les autres messages





require_once 'inc/haut.php';
?>

<!-- container principal  -->
<div class="container py-3 mb-5 mt-3">
    <!-- row -->
    <div class="row">
        <!-- FORMULAIRE DE CONNEXION -->
        <div class="col-sm-12 col-md-4 g-3 mx-auto my-auto">

            <h2 class="mb-5 mt-3 text-center alert alert-light">Déja inscrit <br> Connectez-vous</h2>

            <form method="POST" action="" class="row g-3 p-4 rounded-3 curve bg-light" id="formulaireInscription">

                <div class="col-12">
                    <label for="email" class="form-label">Email
                    </label>
                    <input type="email" name="email" class="form-control" id="formulaireInscription">
                </div>

                <div class="col-6 col-md-6">
                    <label for="mot_de_passe" class="form-label">Mot de passe</label>
                    <input type="password" name="mot_de_passe" class="form-control" id="mot_de_passe">
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Se souvenir de moi
                        </label>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-dark" type="submit" name="register_btn">Valider</button>
                </div>

            </form> <!-- fin form  -->

        </div><!-- / fin col -->

    </div><!-- row -->



</div><!-- / fin container -->

<?php
require_once 'inc/bas.php';


?>