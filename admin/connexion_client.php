<?php
include 'inc/init.php';

$message = '';

// jeprint_r($_GET);
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
    unset($_SESSION['utlisateur']);
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
    if (empty($_POST['email']) || empty($_POST['mdp'])) {
        $contenu .= '<div class="alert alert-danger">Veuillez entrer vos informations</div>';
    }
    if (empty($contenu)) {
        $resultat = executeRequete(" SELECT * FROM utilisateur WHERE email = :email", array(':email' => $_POST['email']));
        if ($resultat->rowCount() == 1) {
            $utilisateur = $resultat->fetch(PDO::FETCH_ASSOC);
            if (password_verify($_POST['mdp'], $utilisateur['mdp'])) {
                $_SESSION['membre'] = $utilisateur;
                // header('location:profil_client.php');
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
                    <input type="email" name="email" class="form-control" id="email">
                </div>

                <div class="col-6 col-md-6">
                    <label for="mdp" class="form-label">Mot de passe</label>
                    <input type="password" name="mdp" class="form-control" id="mdp">
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