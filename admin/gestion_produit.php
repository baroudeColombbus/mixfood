<?php

require_once '../inc/init.php';
require_once '../inc/functions.php';
require_once '../inc/haut.php';


?>

<div class="container m-auto">
    <div class="row">
        <div class="col-sm-12 col-md-6 mx-auto p-4">

            <div class="card m-auto alert alert-light border border-warning">
                <h2 class="bg-warning p-4 text-center mb-5">Entrée d'un nouveau produit</h2>
                <!-- début de formulaire -->
                <form method="POST" action="" class="">

                    <div class="form-group mb-3">
                        <label for="categorie"> Nom catégorie</label>
                        <input type="text " class="form-control text-right" name="categorie" id="categorie">
                    </div>

                    <div class="form-group mb-3">
                        <label for="nom_produit">Nom du produit</label>
                        <input type="text " class="form-control text-right" name="nom_produit" id="nom_produit">
                    </div>

                    <div class="form-group mb-3">
                        <label for="produit_ingredients">Ingrédients</label>
                        <input type="text" class="form-control text-right" name="produit_ingredients" id="produit_ingredients">
                    </div>

                    <div class="form-group mb-3">
                        <label for="produit_prix">Prix</label>
                        <input type="text" class="form-control text-right" name="produit_prix" id="produit_prix">
                    </div>

                    <div class="form-group mb-3">
                        <label for="produit_vedette">Produit vedette </label>
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
                        <label for="produit_disponible">Disponibilité </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="produit_disponible" id="produit_disponible" value="oui">
                            <label class="form-check-label" for="f">oui</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="produit_disponible" id="produit_disponible" value="non">
                            <label class="form-check-label" for="m">non</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-small btn-warning">AJOUTER</button>

                </form> <!-- fin de formulaire -->
            </div><!-- Fin de card -->

        </div><!-- Fin de col -->
    </div><!-- Fin row -->
</div> <!-- fin de container-->


<?php require_once '../inc/bas.php' ?>