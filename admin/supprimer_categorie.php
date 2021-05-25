<?php

require_once 'inc/init.php';

require_once 'inc/haut.php';

// on récupère l'id à supprimer



if (!empty($_GET['id'])) { // does take into account possible sql injection scenario


    $id = $_GET['id'];

    //on prépare la requête sql pour supprimer
$sql = $pdoSITE->prepare(" DELETE
                            FROM produit_categorie
                            WHERE  	id_categorie= :id");

$sql->bindValue(':id', $id);

// on execute la requete sql 
$sql->execute([':id' => $id]);


   

}

// si la requete est excuter, on redirect 

if ($sql ==  TRUE) {

    $_SESSION['supprimer'] =  " <div class=\"alert alert-success row col-col-6\"> La catégorie à bien été supprimer </div>";

    //On redirect vers la page gestion_catgorie 
    header('location: ' . SITEURL . 'admin/gestion_categorie.php');
} else {

    // On redirect vers la meme paage
    $_SESSION['supprimer'] = "La Categorie n'a pa été supprimer. Essayer encore";
    header('location: ' . SITEURL . 'admin/supprimer_categorie.php');
}

// include bas
require_once 'inc/bas.php';