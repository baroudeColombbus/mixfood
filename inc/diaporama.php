<!-- Caroussel de l'accueil -->

<div class="container p-5 mb-5 carousselAccueil d-none d-md-block d-lg-block">
    <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <!-- <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="img/pizza1.jpg" class="d-block w-100 img-curvy img-thumbnail img-responsive" alt="pizza" width="50%" height="70%">
                <!-- <div class="carousel-caption d-none d-md-block text-light">
                    <h5>Pizza faite avec amour</h5>
                </div> -->
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="img/sushi1.jpg" class="d-block w-100 img-curvy img-thumbnail img-responsive" alt="sushi" width="50%" height="70%">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>Sushi confectionné avec doigté</h5>
                </div> -->
            </div>
            <!-- <div class="carousel-item" data-bs-interval="2000">
                <img src="..." class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div> -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</div>