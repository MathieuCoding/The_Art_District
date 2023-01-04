<?php
require_once 'partials/header.php';
?>


<h1 class="text-center mt-5 text-shadow">Add an article</h1>

<div class="container">
    <form action="" method="post">
        <div class="mb-3">
            <label for="InputTitle" class="form-label text-white">Title</label>
            <input type="text" class="form-control" id="InputTitle" name="title">
        </div>
        <div class="mb-3">
            <label for="InputPicture" class="form-label text-white">Picture</label>
            <input type="file" class="form-control" id="InputPicture" name="picture">
        </div>
        <div class="mb-3">
            <label for="InputContent" class="form-label text-white">Content</label>
            <textarea class="form-control" id="InputContent" name="content"></textarea>
        </div>

        <?php foreach($categories as $category){ ?>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="<?= $category->getId_category() ?>" name="categories[]" id="<?= $category->getCategory_Name() ?>">
            <label class="form-check-label text-white" for="<?= $category->getCategory_Name() ?>">
            <?= $category->getCategory_Name() ?>
            </label>
        </div>
        <?php } ?>
        
        <button class="btn btn-primary mt-3" type="submit">Post article</button>
    </form>
</div>

<?php
require_once 'partials/footer.php';
?>