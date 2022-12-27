<?php
require_once 'partials/header.php';
?>

<div id="wrap">
  <div id="main" class="container-fluid clear-top">

    <!-- Here comes the article photo and content -->
    <div class="card mb-3">
      <img src="<?= $post->getPicture() ?>" class="card-img-top" alt="hero image">
      <div class="card-body">
        <h5 class="card-title text-center"><?= $post->getTitle() ?></h5>
        <p class="card-text"><?= $post->getContent() ?></p>
        <p class="card-text text-end"><small class="text-muted">Created the <?= $post->getDate() ?></small></p>
        <a href="index.php"><input type="button" class="btn btn-secondary" value="Retour" /></a>
      </div>
    </div>


    <!-- Here comes the comments  -->
    <div class="card">
      <div class="card-header">
        Comments
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">

          <?php
          if (isset($comment) && !empty($comment)) {
          ?>

            <p><?= $comment->getContent() ?></p>
            <footer class="blockquote-footer">Written by <cite title="Source Title"><?= $user->getPseudo() ?></cite>
            </footer>
        </blockquote>
      </div>
    </div>

  <?php } ?>

  </div>
</div>

<?php
require_once 'partials/footer.php';
?>