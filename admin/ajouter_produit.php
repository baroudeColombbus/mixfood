<?php

require_once 'inc/init.php';
require_once 'inc/functions.php';


if (!empty($_POST)) {
    //On verify que le formulaire a bien été envoyer
    // on nettoie le formulaire en utilisant htmlspecialchars

    $nom_produit =  htmlspecialchars($_POST['nom_produit']);

    $produit_prix = htmlspecialchars($_POST['produit_prix']);

    $produit_ingredients = htmlspecialchars($_POST['produit_ingredients']);

    // On verify le button radio selectionner
    if (isset($_POST['produit_vedette'])) {
        $produit_vedette =  htmlspecialchars($_POST['produit_vedette']);
    } else {
        $produit_vedette = "non";
    }

    // on verifie si le  	nom_produit va être en produit_disponible  ou bon
    if (isset($_POST['produit_disponible '])) {
        $produit_disponible  =  htmlspecialchars($_POST['produit_disponible ']);
    } else {
        $produit_disponible  = "non";
    }

    // TRAITEMENT DES IMAGES
    // On verifie si les images sont cselectionner
    //print_r($_FILES['produit_image']['name']);
    //die();

    // var_dump( $produit_image);
    //die();



    if (isset($_FILES['produit_image']['name'])) {

        $produit_image = htmlspecialchars($_FILES['produit_image']['name']); //produit_image

        if($produit_image != ""){

            // auto rename OUR image
            // get the extension of our image (jpg, png ,gif, etc) e.g "special.food.jpg"
            $tmp = explode('.', $produit_image);
            $file_extension = end($tmp);

            // renomme les images
            $produit_image = "Produit_mixfood" . rand(000, 999) . '.' . $file_extension; // e.g => Food_category_232.jpg

            $source_path = $_FILES['produit_image']['tmp_name']; // source path (source du fichier)
            //var_dump($source_path);
            $destination_path = "../img/produit/" . $produit_image; // destination path (destination du fichier)

            // Now we can Upload the file( on televerse cette image de la source at le destination)
            $upload = move_uploaded_file($source_path, $destination_path);

            if ($upload == false) {
                // SET message
                $_SESSION['upload'] = "<div class=\"alert alert-danger\">Image Failed to  upload</div>";
                // redirect to add Category page
                header('location:' . SITEURL . 'Admin/ajouter_produit.php');
                // STOP 
                die();
            }
    }
    } else {

        $produit_image = "";
    }

    // 2. On prepare la requête sql . Les données seront persister des que le bouton submit est activé
    $sql = $pdoSITE->prepare("INSERT INTO produit SET  nom_produit ='$nom_produit', produit_image ='$produit_image',  produit_ingredients='$produit_ingredients',produit_prix='$produit_prix', produit_vedette='$produit_vedette',produit_disponible ='$produit_disponible' ");


    // On execute la requête
    $requete = $sql->execute();
    //var_dump($requete);

    if ($requete  == TRUE) {
        // cQuery executed correctly and data added to the database
        $_SESSION['add'] =  " <div class=\"alert alert-success row col-col-4\">Category Successfully Added</div>"; // create a new section called 'add'

        header('location:' . SITEURL . 'admin/gestion_produit.php');
        exit;
    } else {
        //Failed to add category
        $_SESSION['add'] = "<div class=\"alert alert-success row col-col-4\">Category Failed to  Added</div>";

        header('location:' . SITEURL . 'admin/ajouter_produit.php');
        exit;
    }
}

require_once 'inc/haut.php';
?>

<div class="container m-auto">
    <div class="row"><!-- début row -->
        <div class="col-sm-12 col-md-6 mx-auto p-4">

            <div class="card m-auto alert alert-light border border-warning">
                <h2 class="bg-warning p-4 text-center mb-5">Nouveau produit</h2>
                <!-- début de formulaire -->
                <form method="POST" action="" enctype="multipart/form-data" class="">

                    <div class="form-group mb-3">
                        <label for="nom_produit"> Nom du produit</label>
                        <input type="text " class="form-control text-right" name="nom_produit" id="nom_produit">
                    </div>

                    <div class="form-group mb-3">
                        <label for="produit_prix">Prix</label>
                        <input type="text " class="form-control text-right" name="produit_prix" id="produit_prix">
                    </div>


                    <div class="form-group mb-3">
                        <label for="produit_image">Choisir une image</label>
                        <input type="file" class="form-control text-right" name="produit_image" id="produit_image">
                    </div>

                    <div class="form-group mb-3">
                        <label for="produit_ingredients" class="form-label">Ingrédients</label>
                        <textarea class="form-control text-right" name="produit_ingredients" id="produit_ingredients" rows="3"></textarea>
                    </div>


                    <div class="form-group mb-3">
                        <label for="produit_vedette">produit vedette </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="produit_vedette" id="produit_vedette" value="oui">
                            <label class="form-check-label" for="f">oui</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="produit_vedette" id="produit_vedette" value="non">
                            <label class="form-check-label" for="m">non</label>
                        </div>
                    </div>



                    <div class="form-group mb-3">
                        <label for="produit_disponible ">Disponibilité du produit</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="produit_disponible " id="produit_disponible " value="oui">
                            <label class="form-check-label" for="produit_disponible ">oui</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="produit_disponible " id="produit_disponible " value="non">
                            <label class="form-check-label" for="produit_disponible ">non</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-small btn-warning">AJOUTER</button>

                </form> <!-- fin de formulaire -->
            </div><!-- Fin de card -->

        </div><!-- Fin de col -->
    </div><!-- Fin row -->
</div> <!-- fin de container-->


<?php require_once 'inc/bas.php'; ?>