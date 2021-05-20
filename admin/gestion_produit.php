<?php

require_once '../inc/init.php';
require_once '../inc/functions.php';
require_once '../inc/haut.php';


?>

<div class="container m-auto">
    <div class="row">
        <div class="col-sm-12 col-md-8 mx-auto p-4 text-center">

            <div class="card text-center m-auto alert alert-success border border-success">
                <h1 class="p-3">Ajouter un produit </h1>
                <ul class="list-group list-group-flush border border-success">

                    <li class="list-group-item">
                        <?php
                        echo "Description : " . $fiche['description'];
                        ?>
                    </li>
                    <li class="list-group-item">
                        <?php
                        echo "Prix : " . $fiche['prix'] . " €";
                        echo "<li class=\"list-group-item\">Stock : " . $fiche['stock'] . "</li>";
                        ?>
                    </li>
                </ul>
                <button type="button" class="btn btn-warning border border-danger p-4">AJOUTER</button>
            </div><!-- Fin de card -->

        </div><!-- Fin de col -->
    </div><!-- Fin row -->
</div> <!-- fin de container-->


<?php require_once '../inc/bas.php' ?>