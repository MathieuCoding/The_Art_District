<?php
require_once 'partials/header.php';
?>


<h1 class="text-center mt-5 text-shadow">Modify your article</h1>

<div class="container">
    <!-- Attribut pour pouvoir uploader des fichier enctype="multipart/form-data" -->
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="InputTitle" class="form-label text-larger text-shadow">Title</label>
            <input type="text" class="form-control" id="InputTitle" name="title">
        </div>
        <div class="mb-3">
            <label for="InputPicture" class="form-label text-larger text-shadow">Picture</label>
            <input type="file" class="form-control" id="InputPicture" name="picture">
        </div>
        <div class="mb-3">
            <label for="InputContent" class="form-label text-larger text-shadow">Content</label>
            <textarea class="form-control" id="InputContent" name="content"></textarea>
        </div>

        <?php foreach ($categories as $category) { ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="<?= $category->getId_category() ?>" name="categories[]" id="<?= $category->getCategory_Name() ?>">
                <label class="form-check-label text-larger text-shadow" for="<?= $category->getCategory_Name() ?>">
                    <?= $category->getCategory_Name() ?>
                </label>
            </div>
        <?php } ?>
        <div class="buttons">
            <button class="btn btn-primary float-end me-3 mt-3" type="submit">Post article</button>
            <a href="index.php"><input type="button" class="btn btn-secondary float-end me-3 mt-3" value="Back" /></a>
        </div>
    </form>
</div>

<?php
require_once 'partials/footer.php';
?>