<footer class="container-fluid text-muted py-5 bg-warning">
    <div class="container container-sm">
        <div class="row ">

            <div class="col-lg-3 d-none d-md-block d-lg-block">
                <div class="row">
                    <div class="col">
                        <img src="../img/alex.PNG" alt="logo-mixfoo" class="img-fluid  mixfooter align-center pt-5">

                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-none d-md-block d-lg-block">
            </div>
            <div class=" col-6 col-lg-2">
                <h6 class="text-upper text-dark">Moyen de paiements</h6>
                <p>Paypal</p>
                <p>Espece</p>
                <p>Carte bancaire</p>
            </div>
            <div class="col-6 col-lg-2">
                <h6 class="text-upper text-dark">Contact</h6>
                <p> Connexion</p>
                <p> Menu</p>
                <p> Service </p>
            </div>
            <div class="col">
                <div class="row">
                    <p class="text-center text-md-left "><img src="../img/m_MIXFOOD.png" alt="logo-mixfood" class="img-fluid  align-center pt-5"></p>
                </div>

            </div>

        </div><!-- /row -->
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
                <p class="fw-light "> &copy;<?php echo date("Y");  ?> mixfood tous droits réservés </p>
            </div>

        </div>

    </div>


    <form action="" method="post">

        <div class="mb-3">
            <label for="civilite" class="form-label">Civilié</label>
            <input class="form-control" name="civilite" list="datalistOptions" id="civilite" placeholder="Ecrire.">
            <datalist id="datalistOptions">
                <option value="Madame">
                <option value="Monsieur">
            </datalist>
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">prenom</label>
            <input id="prenom" type="text" class="form-control form-control-sm " name="" placeholder="prenom" aria-placeholder="prenom">
        </div>

        <div class="mb-3">
            <label for="nom" class="form-label">nom</label>
            <input type="text" class="form-control form-control-sm " name="" placeholder="nom" aria-placeholder="nom">
        </div>


        <div class="mb-3">
            <label for="mo_de_passe" class="form-label">Mot de passe</label>
            <input type="text" class="form-control form-control-sm" name="" placeholder="mot de passe" aria-placeholder="mot de passe">
        </div>

        <div class="mb-3">
            <label for="bp" class="form-label"> Boîte postale</label><br>
            <img src="../img/alex.PNG" alt="">
            <input type="text" class="form-control form-control-sm " name="" id="code_postal" placeholder="boîte postale" aria-placeholder="boîte postale">
        </div>

  </form>


        


</footer>