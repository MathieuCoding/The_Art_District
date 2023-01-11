<?php
require_once 'partials/header.php';
?>


<!-- Carousel -->

<!-- <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images\pexels-jacob-colvin-1761282.jpg" class="d-block w-25 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images\pexels-pixabay-41006.jpg" class="d-block w-25 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images\pexels-pixabay-208821.jpg" class="d-block w-25 img-fluid" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> -->



<!-- Here comes the cards -->

<div class="container px-4 py-5" id="custom-cards">
    <h2 class="pb-2 border-bottom text-shadow">Last articles</h2>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">

        <?php foreach ($posts as $post) { ?>

            <div class="col ">
                <a href="single.php?id=<?= $post->getId_post() ?>" class="text-decoration-none">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style='background: url(<?= "images/" . $post->getPicture() ?>) center; background-size:cover; '>
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-dark white-color">
                            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><?= $post->getTitle() ?></h3>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="images\pngegg.png" alt="Pellicule de film" width="32" height="32" class="rounded-circle border border-white">
                                </li>
                                <li class="d-flex align-items-center">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#calendar3" />
                                    </svg>
                                    
                                    <small><?= date("j M Y", strtotime($post->getDate())); ?></small>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div></a>

        <?php } ?>


    </div>
</div>


<?php
require_once 'partials/footer.php';
?>