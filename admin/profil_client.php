<?php
require_once 'inc/init.php';
//1- Vérification de la session : 
// jeprint_r($_SESSION);

// Connexion obligatoire pour accéder à la page profil
if (!estConnecte()) {
    header('location:connexion_client2.php'); // renvoie à la page de connexion
}

// Déconnexion de l'internaute
// jeprint_r($_GET);

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
    unset($_SESSION['utilisateur']);
    // $message = '<div class="alert alert-primary">Vous êtes déconnecté.</div>';
    header('location:connexion_client2.php');
}

include 'inc/haut.php';


?>

<main class="container m-2 mx-auto p-2 row">
    <h1 class="mt-4 text-center titreChoix text-white">Bienvenue sur votre profil
        <?php
        if (estAdmin()) {
            echo ' administrateur';
        } else {
            echo 'client';
        }
        ?>
    </h1>

    <?php
    echo $message;
    ?>

    <div class="col-sm-12 col-md-6 col-lg-6 mx-auto m-2 p-2">

        <h2 class="text-white text-center">Bonjour <?php echo $_SESSION['utilisateur']['prenom']; ?> !</h2>

        <hr>

        <div class="card mx-auto alert alert-success" style="width: 18rem;">
            <div class="card-body ">
                <h5 class="card-title text-center">Informations</h5>

                <ul class="list-group">
                    <li class="list-group-item">Prénom :<br> <?php echo $_SESSION['utilisateur']['prenom']; ?> </li>
                    <li class="list-group-item">Nom : <br> <?php echo $_SESSION['utilisateur']['nom']; ?> </li>
                    <li class="list-group-item">Email :<br> <?php echo $_SESSION['utilisateur']['email']; ?> </li>
                    <li class="list-group-item">Adresse :<br> <?php echo $_SESSION['utilisateur']['adresse']; ?> </li>
                    <li class="list-group-item">Code postal :<br> <?php echo $_SESSION['utilisateur']['code_postal']; ?> </li>
                    <li class="list-group-item">Ville :<br> <?php echo $_SESSION['utilisateur']['ville']; ?> </li>
                    <li class="list-group-item">Téléphone :<br> <?php echo $_SESSION['utilisateur']['telephone']; ?> </li>
                    <li class="list-group-item">Date d'inscription : <br> <?php echo $_SESSION['utilisateur']['date_enregistrement']; ?> </li>

                </ul>

            </div>
        </div>

    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 mx-auto m-2 p-2">
        <h2 class=" text-white text-center">Modifier votre profil</h2>
        <hr>
        <!-- DEBUT DU FORMULAIRE -->
        <form method="POST" action="" class=" row p-5 m-2 border border-success alert alert-success " id="formulaireInscription">


            <div class="form-group p-2 col-sm-12 col-md-6 col-lg-6">
                <!-- nom -->
                <label for="nom" class="form-label">Nom de famille*</label>
                <input type="text" class="form-control text-right" name="nom" id="nom" value="<?php echo $_SESSION['utilisateur']['nom']; ?>" disabled>
            </div>
            <div class="form-group p-2 col-sm-12 col-md-6 col-lg-6">
                <!-- prenom -->
                <label for="prenom" class="form-label">Prénom*</label>
                <input type="text " class="form-control text-right" name="prenom" id="prenom" value="<?php echo $_SESSION['utilisateur']['prenom']; ?>" disabled>
            </div>
            <div class="form-group p-2 col-sm-12 col-md-6 col-lg-6">
                <!-- mail -->
                <label for="email" class="form-label">Adresse éléctronique*</label>
                <input type="email" class="form-control text-right" name="email" id="email" value="<?php echo $_POST['email'] ?? ''; ?>" required placeholder="Votre nouvel email">
            </div>
            <div class=" form-group p-2 col-sm-12 col-md-6 col-lg-6">
                <!-- telephone -->
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="text" name="telephone" class="form-control" id="telephone" required placeholder="Votre nouveau numéro " value="<?php echo $_POST['telephone'] ?? ''; ?>">
            </div>
            <div class="form-group p-2">
                <!-- adresse -->
                <label for="adresse" class="form-label">Adresse postale*</label>
                <textarea name="adresse" id="adresse" class="form-control" required placeholder="Votre nouvelle adresse"><?php echo $_POST['adresse'] ?? ''; ?></textarea>
            </div>
            <div class="form-group p-2 col-sm-12 col-md-6 col-lg-6">
                <!-- code_postal -->
                <label for="code_postal" class="form-label">Code Postal*</label>
                <input type="text" class="form-control text-right" name="code_postal" id="code_postal" value="<?php echo $_POST['code_postal'] ?? ''; ?>" required placeholder="Votre nouveau code-postal">
            </div>
            <div class="form-group p-2 col-sm-12 col-md-6 col-lg-6">
                <!-- ville -->
                <label for="ville" class="form-label">Ville*</label>
                <input type="text" class="form-control" name="ville" id="ville" value="<?php echo $_POST['ville'] ?? ''; ?>" required placeholder="Votre nouvelle ville">
            </div>

            <div class="form-group text-center">
                <!-- bouton reseat formulaire -->
                <button class="btn btn-dark mt-3" type="reset" value="Reset">Effacer</button>
                <!-- bouton envoyer -->
                <button type="submit" class="btn btn-success mt-3">Modifier</button>

            </div>
        </form> <!-- fin de formulaire -->

    </div>

</main>


<?php
include 'inc/bas.php';
?>