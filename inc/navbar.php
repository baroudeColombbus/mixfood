 <!-- navbar -->

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-expand-md static-top">
     <div class="container">
         <img src="img/mixfoodNoir.png" alt="logo-mixfodd" width="10%" height="10%" class="mt-3 img-responsive mb-3">
         <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="navbar-collapse collapse justify-content-end" id="navbar">
             <ul class="navbar-nav align-items-center">
                 <li class="nav-item active">
                     <a class="nav-link m-4" href="index.php">Accueil</a>
                 </li>
                 <li class="nav-item dropdown ">
                     <a class="nav-link dropdown-toggle m-4" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</a>
                     <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink">
                         <li><a class="dropdown-item" href="pizza.html">Pizza</a></li>
                         <li><a class="dropdown-item" href="sushi.html">Sushi</a></li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link m-4" href="#">Qui sommes-nous ?</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link m-4" href="contact.php">Contact</a>
                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle m-4" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">ADMIN</a>
                     <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink">
                         <li><a class="dropdown-item" href="#">Gestion</a></li>
                         <li><a class="dropdown-item" href="#">Produits</a></li>
                         <li><a class="dropdown-item" href="#">Commandes</a></li>

                     </ul>
                 </li>
             </ul>

         </div>
     </div>
     <div class="container-fluid col-sm-12 col-lg-2 mx-auto">

         <a href="admin/inscription_client2.php">
             <button class=" btn btn-success mr-1 mb-1 mx-auto boutonNav" id="btn-inscription">S'inscrire</button>
         </a>
         <a href="admin/connexion_client.php" class="mx-auto">
             <button class=" btn btn-success mx-auto mb-1 mx-auto boutonNav" id="btn-connexion" style="width:130%;">Se connecter</button>
         </a>

     </div>
 </nav>