<?php
require_once 'partials/header.php';
?>

<div id="wrap">
  <div id="main" class="container-fluid clear-top">

    <!-- Here comes the article photo and content -->
    <div class="card mb-3">
      <img src="<?= "images/" . $post->getPicture() ?>" class="card-img-top" alt="hero image">
      <div class="card-body">
        <h1 class="card-title text-center mt-3"><?= $post->getTitle() ?></h4>

          <?php foreach ($postCategories as $postCategory) { ?>
            <a href="category.php?id= <?= $postCategory->getId_category() ?>" class="badge badge-primary text-bg-primary mb-3"><?= $postCategory->getCategory_name() ?></a>
          <?php } ?>

          <p class="card-text"><?= $post->getContent() ?></p>
          <p class="card-text text-end"><small class="text-muted">Created by <a href="author.php?id= <?= $author->getId_user() ?>"><?= $author->getPseudo() ?></a> the <?= date("j M Y", strtotime($post->getDate())); ?></small></p>
          <a href="index.php"><input type="button" class="btn btn-secondary float-end me-3" value="Back" /></a>
          <?php if (isset($_SESSION['user']) && !empty(['user'])) { ?>
            <a href="index.php"><input type="button" class="btn btn-danger float-end me-3" value="Delete" /></a>
            <a href="updatePost.php"><input type="button" class="btn btn-primary float-end me-3" value="Modify" /></a>
          <?php } ?>     
          
      </div>
    </div>


    <!-- Here comes the comments  -->
    <div class="card">
      <div class="card-header">
        <h4>Comments</h2>
      </div>
      <div class="card-body">
        <blockquote class="blockquote">

          <?php
          if (isset($commentsData) && !empty($commentsData)) {
            foreach ($commentsData as $commentData) {
          ?>

              <p><?= $commentData['comment']->getContent() ?></p>
              <footer class="blockquote-footer">Written by <cite title="Source Title"><?= $commentData['author']->getPseudo() ?></cite>
              </footer>
        </blockquote>
    <?php }
          } ?>
      </div>
    </div>

    <!--Comment adding section-->
    <div class="card mt-3">
      <div class="card-header">
        <h4>Write a comment</h2>
      </div>
      <form action="" method="post" class="col-md-6 offset-md-3 mt-5">
        <div class="min-vh-100">
          <div class="mb-3">
            <label for="InputComment" class="form-label text-larger">Your comment</label>
            <textarea style="height:200px" type="text" class="form-control" id="InputComment" name="comment"></textarea>
          </div>
          <a href="index.php"><input type="button" class="btn btn-danger float-end me-2" value="Cancel" /></a>
          <button class="btn btn-primary float-end me-2" type="submit">Add comment</button>
        </div>
      </form>
    </div>

  </div>
</div>

<?php
require_once 'partials/footer.php';
?>