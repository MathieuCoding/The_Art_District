<?php
require_once 'partials/header.php';
?>

<h1 class="text-center mt-5 text-shadow display-3">Write a comment</h1>

<form action="" method="post" class="col-md-6 offset-md-3 mt-5">
    <div class="min-vh-100">
        <div class="mb-3">
            <label for="InputComment" class="form-label text-shadow text-larger">Your comment</label>
            <textarea style="height:200px" type="text" class="form-control" id="InputComment" name="comment"></textarea>
        </div>
        <a href="index.php"><input type="button" class="btn btn-danger float-end me-2" value="Cancel" /></a>
        <button class="btn btn-primary float-end me-2" type="submit">Add comment</button>
    </div>
</form>

<?php
require_once 'partials/footer.php';
?>