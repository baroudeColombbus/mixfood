	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
				<script src="https://kit.fontawesome.com/b41dcf0f5f.js" crossorigin="anonymous"></script>

<?php 

require_once'../inc/navbar.php' ; 
require_once'../inc/init.php' ; 
require_once'../inc/functions.php' ; 

$utilisateur = executeRequete(" SELECT * FROM utilisateur");
?>

<div class="row my-5">
            <div class="col-sm-12 col-md-10">
                <h2 class="mb-4">Nos utilisateurs:</h2>

           <?php 


           $requete = $pdoMIXFOOD->query(" SELECT * FROM utilisateur ORDER BY id_utilisateur DESC"); ?>
                
                <table class="table table-light table-striped">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Prénom</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Email</th>
                      <th scope="col">Téléphone</th>
                      <th scope="col">Mot de passe</th>
                      <th scope="col">Adresse</th>
                      <th scope="col">Ville</th>
                      <th scope="col">Code postal</th>
                      <th scope="col">Statut</th>
                      <th scope="col">En savoir plus</th>
                    </tr>
                  </thead>

                <?php    
               
                    foreach ( $requete as $user ) { 
                    echo "<tr>";
                    echo "<td>" .$user['id_utilisateur']. "</td>";
                    echo "<td>" .$user['prenom']. "</td>";
                    echo "<td>" .$user['nom']. " </td>";
                    echo "<td>" .$user['email']. " </td>";
                    echo "<td>" .$user['telephone']. " </td>";
                    echo "<td>" .$user['mot_de_passe']. " </td>";
                    echo "<td>" .$user['adresse']. " </td>";
                    echo "<td>" .$user['ville']. " </td>";
                    echo "<td>" .$user['code_postal']. " </td>";
                    
                    if($user['statut_utilisateur'] == "admin") {
                      echo "<td class=\"text-danger\">Administrateur</td>";
                    }else {
                      echo "<td class=\"text-success\">Client</td>";
                    }
                    
                    echo "<td><a href=\"consulter_une_annonce.php?id=".$user['id_utilisateur']."\">En savoir plus </a></td>";
                    echo "</tr>";
                    }
                ?> 
                </table>
                
            </div><!-- fin col -->