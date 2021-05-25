
<?php     

require_once 'inc/init.php';
require_once 'inc/functions.php';


//////////////////
///
//ON obtient des data ancien
// on verify si il ya bien an id selectionner
if (isset ($_GET['id'])) {
    // on prépare une requete. Selectionne les données correspendant à cet categorie ID
    $requete = $pdoSITE->prepare("SELECT * FROM produit_categorie WHERE id_categorie = :id");

    // On execute la requete
    $requete->execute(array (
        ':id' => $_GET['id'],
    ));
  

    // count le nombre le données correspendant à cette id
    $nbr_categorie =      $requete->rowCount();

    // si le nom de id est supériur à 0
    
    if ($nbr_categorie> 0) {

        // On récupère toute les données
        // fetch all rows into array, by default PDO::FETCH_BOTH is used
        $result     =   $requete->fetch(PDO::FETCH_ASSOC);
        $nom_categorie      =   $result['nom_categorie'];
        $image_actuelle =   $result['nom_image'];
        $en_vedette  =   $result['en_vedette'];
        $disponible     =   $result['disponible'];

        //var_dump($result);
    } else {
        // si l'id n'est pas retrouvé on enclanche la session erreur
        $_SESSION['cat_non_trouver'] = "<div class=\"alert alert-warning row col-col-6\">Catégorie non trouvé</div>";
        // On redirect vers la gestdion de categorie
        // c'est une sécurité de plus 
        header('location:' . SITEURL . 'admin/gestion_categorie.php');
    }
} else {
    //en redirect vers modifier categorie
    // si on essaye de changer l'id manuellement
    // c'est aussi une sécurité
    echo " accèss non autorisé";
   header('location:' . SITEURL . 'admin/modifier_categorie.php');
}



//////////////////
///
//TRAITEMENT DES NOUVELLES DONNES

if (!empty($_POST)) {
    // 1. Get the value from thw categorie FORM
    $_POST['nom_categorie'] = htmlspecialchars($_POST['nom_categorie']);
    $_POST['nom_image'] = isset( $_POST['$image_actuelle']);
    $_POST['en_vedette'] = $_POST['en_vedette'];
    $_POST['disponible'] = $_POST['disponible'];

    // On met à jour la nouvelle image
    if ($_FILES['nom_image']['name']) {
        // get image details
        $nom_image = $_FILES['nom_image']['name'];

        // verify whether the image is avalaible or not
        if ($nom_image != '') {

            if ($nom_image != '') { // start of i image is not empty

                // auto rename OUR image
                // get the extension of our image (jpg, png ,gif, etc) e.g "special.food.jpg"
                $tmp = explode('.', $nom_image);
                $file_extension = end($tmp);
        

                // rename the image 
                $nom_image = "Produit_categorie_" . rand(000, 999) . '.' . $file_extension; // e.g => Food_category_232.jpg

                $source_path = $_FILES['nom_image']['tmp_name']; // source path
                //var_dump($source_path);
                $destination_path = "../img/categorie/" . $nom_image; // destination path

                // Now we can Upload the file
                $upload = move_uploaded_file($source_path, $destination_path);

                // Check whether the image is uploaded or not
                // And if the image failed to ulpload, stop then redirect to error message
                // if ($upload == false) {
                //     // SET message
                //     $_SESSION['upload'] = "<div class=\"alert alert-danger\">Image Failed to  upload</div>";
                //     // redirect to add Category page
                //     header('location:' . SITEURL . 'Admin/add_category.php');

                //     die(); // STOP 
                // }

                var_dump($destination_path);
            }
            // B. RREMOVE Current Image if available(NOT empty)
            if ($image_actuelle != '') {
                $remove_path = "../img/categorie" . $image_actuelle;
                $remove = unlink($remove_path);

                //var_dump($remove);
                // check whether the image is remove or not
                // if failed to remove then display error message die()

                // if ($remove == false) {
                //     $_SESSION['failed-upload'] = "<div class=\"alert alert-danger\"> Failed to update new the image </div>";
                //     header('location:' . SITEURL . 'Admin/manage_category.php');

                //     die(); // STOP 
                // }
            }
        } else { // if an image is NOT selected; $nom_image => $image_actuelle;
            $nom_image = $image_actuelle;
        }
    } else {
        // $nom_image => $image_actuelle;
        $nom_image = $image_actuelle;
    }


    // 2. Prepare the query to be inserted once the user insert data in the form
    $requete = $pdoSITE->prepare(
        "UPDATE produit_categorie
                                                 SET nom_categorie = :nom_categorie, 
                                                 nom_image = :nom_image,
                                                 en_vedette = :en_vedette, 
                                                 disponible = :disponible
                                                 WHERE id_categorie=:id"
    );

    // 3. Execute the query prepared above then, execute it 
    $requete->execute(
        array(
            // array awaiting to be executed by the prepared sql statement
            ':nom_categorie'               =>      $_POST['nom_categorie'],
            ':nom_image'               =>     $_POST['nom_image'],
            ':en_vedette'                    =>      $_POST['en_vedette'],
            ':disponible'              =>      $_POST['disponible'],
            'id'                         =>  $_GET['id']

        )
    );



    //Redirect to manage categorie if successful or not
    // 1- verify that the query was successfull
    // if ($requete == TRUE) {
    //     // categorie UPDATED

    //     $_SESSION['update'] = "<div class=\"alert alert-success row col-col-4\">Updated successuflly</div>";
    //     header('location:' . SITEURL . 'admin/manage_category.php');

    //     // $$requete->fetch(PDO::FETCH_ASSOC);
    // } else {
    //     // failed to update 
    //     $_SESSION['update'] = "<div class=\"alert alert-warning row col-col-4\">Failed to update categorie</div>";
    //     header('location:' . SITEURL . 'admin/update_category.php');
    // }
}



?>

<!-- include header -->
<?php include_once 'inc/haut.php' ;?>
<div class="container m-auto">
      
        <?php
        // if( isset   ($_SESSION['update'])  )   // verify whether the $session is SET or NOT
        // {
        //         echo $_SESSION['update']=  " <div class=\"alert alert-wrning row col-col-6\">Admin Data Updated Successfully</div>";// Display the $session message
        //         session_unset(  ); // remove the $session message
        // }

        ?>
        <!-- form -->
        <div class="row">
        <div class="col-sm-12 col-md-6 mx-auto p-4">

            <div class="card m-auto alert alert-light border border-warning">
                <h2 class="bg-warning p-4 text-center mb-5">Modifier la catégorie</h2>
                <!-- début de formulaire -->
                <form method="POST" action="" enctype="multipart/form-data" class="">

                    <div class="form-group mb-3">
                        <label for="nom_categorie"> Nom catégorie</label>
                        <input type="text " class="form-control text-right" name="nom_categorie" value="<?php echo $nom_categorie; ?> " id="nom_categorie">
                    </div>

                    <div class="form-group mb-3">
                        <!-- ancienne image -->
                        <?php
                if ($image_actuelle !== '') {
                    // Display it
                    echo '<img src="' . SITEURL .'img/categorie/'.$image_actuelle. '" width="150px" >';
                } else {
                    // Display an error message
                    echo "<div class=\"alert alert-warning row col-col-6\">Admi Failed</div>";
                }

                ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nom_image">Choisissez une nouvelle image</label>
                        <input type="file" class="form-control text-right" name="nom_image" id="nom_image">
                        <!-- <input type="file" id="nom_image" name="nom_image"> -->
                    </div>


                    <div class="form-group mb-3">
                        <label for="en_vedette">En vedette </label>
                        <div class="form-check form-check-inline">
                            <input <?php if ($en_vedette == "oui") {
                                        echo "checked";
                                    } ?> class="form-check-input" type="radio" name="en_vedette" id="en_vedette" value="oui">
                            <label class="form-check-label" for="f">oui</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input  <?php if ($en_vedette == "non") {
                                        echo "checked";
                                    } ?>class="form-check-input" type="radio" name="en_vedette" id="en_vedette" value="non">
                            <label class="form-check-label" for="m">non</label>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="disponible">Disponibilité </label>
                        <div class="form-check form-check-inline">
                            <input <?php if ($disponible == "oui") {
                                        echo "checked";
                                    } ?> class="form-check-input" type="radio" name="disponible" id="disponible" value="oui">
                            <label class="form-check-label" for="disponible">oui</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input <?php if ($disponible == "oui") {
                                        echo "checked";
                                    } ?> class="form-check-input" type="radio" name="disponible" id="disponible" value="non">
                            <label class="form-check-label" for="disponible">non</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-small btn-warning">AJOUTER</button>

                </form> <!-- fin de formulaire -->
            </div><!-- Fin de card -->

        </div><!-- Fin de col -->
    </div><!-- Fin row -->

</div><!-- / menu-princpal -->


<!-- include the footer -->
<?php include_once 'inc/bas.php'; ?>