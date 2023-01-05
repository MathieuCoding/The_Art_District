<?php
require_once 'partials/header.php';
?>

<!-- Here comes the cards -->

<div class="container px-4 py-5" id="custom-cards">

    <h2 class="pb-2 border-bottom text-dark text-shadow">The <?=$categoryInfos->getCategory_name()?> articles</h2>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">

        <?php foreach ($categoryPosts as $post) { ?>

            <div class="col">
                <a href="../TP_blog/single.php?id= <?= $post->getId_post() ?>" class="text-decoration-none">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style='background: url(<?= "images/" . $post->getPicture() ?>) center ; background-size:cover;'>
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



