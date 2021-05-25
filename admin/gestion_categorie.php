<?php

require_once 'inc/init.php';
require_once 'inc/functions.php';
require_once 'inc/haut.php';


?>
<!-- menu principal -->
<div class="container m-auto">

    <!-- button to ad admin  -->
    <a href="<?php echo SITEURL; ?>admin/ajouter_categorie.php" class="btn btn-primary my-2">Ajouter une categorie</a>
    <!--  -->
    <table class="table table-striped mx-auto">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Categorie</th>
                <th>Image</th>
                <th>en_vedette</th>
                <th>Disponible</th>
                <th>Modifier</th>
                <th>Supprimer</th>


            </tr>
        </thead>
        <tbody>
            <?php
            // Query to get all Categories from database
            $sql =  $pdoSITE->prepare("SELECT * FROM produit_categorie");

            //execute the sql statement as an object NOT an array

            $sql->execute();

            // fetch all rows into array, by default PDO::FETCH_BOTH is used
            $result =   $sql->fetchAll();
            //var_dump($result);

            // count the number of admin in the database
            $nbr_category =      $sql->rowCount();

            if ($nbr_category > 0) {
                // there are record in the database

            } else {
                // no record found in the database
            }




            foreach ($result as $row) {

                $nom_image = $row['nom_image'];

                echo    "<tr>";

                echo "<td>" . $row['id_categorie'] . "</td>";
                echo "<td>" . $row['nom_categorie'] . "</td>";

            ?>
                <td>
                    <?php

                    if ($nom_image != '') {
                    ?>
                        <img src="<?php echo SITEURL; ?>img/categorie/<?php echo $nom_image; ?>" width="100px">


                        <?php

                        ?>
                </td>
            <?php
                        echo "<td>" . $row['en_vedette'] . "</td>";
                        echo "<td>" . $row['disponible'] . "</td>";
                        echo "<td> <a href=\"update_category.php?id=" . $row['id_categorie'] . "\" class=\"btn btn-warning \">Modifier la gategorie</a></td>";
                        echo "<td> <a href=\"supprimer_.php?id=" . $row['id_categorie'] . "\" class=\"btn btn-info \">Supprimer la gategorie</a></td>";
                        echo    "<tr>";
                    }
            ?>

            ?>
            </td>
        <?php
                echo "<td>" . $row['en_vedette'] . "</td>";
                echo "<td>" . $row['disponible'] . "</td>";
                echo "<td> <a href=\"modifier_category.php?id=" . $row['id_categorie'] . "\" class=\"btn btn-warning \">Modifier la gategorie</a></td>";
                echo "<td> <a href=\"supprimer_category.php?id=" . $row['id_categorie'] . "\" class=\"btn btn-info \">Supprimer la gategorie</a></td>";
                echo    "<tr>";
            }
        ?>


        </tbody>
    </table>

</div>


<?php require_once 'inc/bas.php' ?>