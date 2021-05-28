<?php

require_once 'inc/init.php';

require_once 'inc/haut.php';

// on récupère l'id à supprimer



if (!empty($_GET['id_produit'])) { // does take into account possible sql injection scenario


    $id = $_GET['id_produit'];

    //on prépare la requête sql pour supprimer
$sql = $pdoSITE->prepare(" DELETE
                            FROM produit
                            WHERE  	id_produit= :id_produit");

$sql->bindValue(':id_produit', $id);

// on execute la requete sql 
$sql->execute([':id_produit' => $id]);


   

}

// si la requete est excuter, on redirect 

if ($sql ==  TRUE) {

    $_SESSION['supprimer'] =  " <div class=\"alert alert-success row col-col-6\"> La catégorie à bien été supprimer </div>";

    //On redirect vers la page gestion_catgorie 
    header('location: ' . SITEURL . 'admin/gestion_produit.php');
} else {

    // On redirect vers la meme paage
    $_SESSION['supprimer'] = "La Categorie n'a pa été supprimer. Essayer encore";
    header('location: ' . SITEURL . 'admin/supprimer_produit.php');
}

// include bas
require_once 'inc/bas.php';