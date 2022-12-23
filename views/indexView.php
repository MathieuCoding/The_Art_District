<?php
require_once 'partials/header.php';
?>



<section class="container mt-5">
    <div class="row d-flex justify-content-around">
        <?php foreach ($posts as $post) { ?>
            <!-- col 12 prends toute la place -->
            <div class="card col-12 col-md-4 col-lg-2 text-center">
                <img src="<?= $post->getPicture() ?>" class="card-img-top" alt="image of a spaceship">
                <div class="card-body">
                    <h5 class="card-title"><?= $post->getTitle() ?></h5>
                    <a href="single.php?id= <?= $post->getId_post() ?>" class="btn btn-primary">Voir l'article</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>



<?php
require_once 'partials/footer.php';
?>

