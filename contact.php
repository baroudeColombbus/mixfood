<?php
include 'inc/haut.php';
?>

<div class="container m-5 p-4 mx-auto">
    <h3 class="text-center titreChoix text-light">Contact</h3>
    <p class="text-center mb-5 "><em>Parce que votre avis nous intéresse</em></p>
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <p>Laissez nous un commentaire</p>
            <p><span class="glyphicon glyphicon-map-marker"></span>Suresnes</p>
            <p><span class="glyphicon glyphicon-phone"></span>Téléphone : 01.42.52.24.25</p>
            <p><span class="glyphicon glyphicon-envelope"></span>Mail: mixfood@mail.com</p>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-6 form-group mb-4">
                    <input class="form-control" id="name" name="name" placeholder="Votre nom" type="text" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-6 form-group mb-4">
                    <input class="form-control" id="email" name="email" placeholder="Votre email" type="email" required>
                </div>
            </div>
            <textarea class="form-control mb-4" id="comments" name="comments" placeholder="Votre message" rows="5"></textarea>
            <div class="row">
                <button class="btn btn-success border border-light mr-1 mb-1 mx-auto boutonNav col-sm-3" id="btn-envoyer">Envoyer</button>
            </div>
        </div>
    </div> <!-- fin de row-->
</div> <!-- fin de container-->
<?php
include 'inc/bas.php';
?>