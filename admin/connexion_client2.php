<?php
require_once 'inc/init.php';
$message = '';
$contenu = '';

// jeprint_r($_POST);
// Vérification si membre est déjà connecté : 
if (estConnecte()) { // si membre déjà connecté on le renvoie vers son profil 
    header('location:profil_client.php'); //redirection vers la page profil.php script que l'on quitte tout de suite
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
    if (empty($contenu)) {
        // requête en BDD les informations du membre pour l'email fourni par l'internaute
        $resultat = executeRequete(" SELECT * FROM utilisateur WHERE email = :email", array(':email' => $_POST['email']));

        if ($resultat->rowCount() == 1) {

            // traitement du mot de passe 
            $utilisateur = $resultat->fetch(PDO::FETCH_ASSOC); // on fetch l'objet $resultat en un tableau associatif qui contient toutes les informations du membre. 

            jeprint_r($utilisateur);

            if (password_verify($_POST['mot_de_passe'], $utilisateur['mot_de_passe'])) { // si le hash du mdp de la bdd correspond au mdp du formulaire, alors password_verify retourne true
                $_SESSION['utilisateur'] = $utilisateur; // nous créons une session avec (une session est un fichier sur le serveur) avec les informations du membre provenant de la BDD )
                // redirection du membre vers l'accueil
                header('location:profil_client.php');
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
// jevardump($_SESSION);



// Déconnexion de l'internaute

session_destroy(); //On détruit le cookie de l'identifiant.
header("../index.php"); //On revient au départ.
// jeprint_r($_GET);

include 'inc/haut.php';
?>

<main class="container bg-white m-4 mx-auto p-4">
    <div class="col-sm-12 col-md-8 col-lg-6 border border-success mx-auto m-4 p-4">
        <form class="form-signin p-4" method="POST" action="">
            <h1 class="h3 mb-3 font-weight-normal">Connectez-vous</h1>
            <div class="form-group mt-2">
                <label for="email" class="sr-only">Email</label>
                <input type="text" id="email" class="form-control" placeholder="votre email" autofocus name="email">
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

<?php
include 'inc/bas.php';
?>