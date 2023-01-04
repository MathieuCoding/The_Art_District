<?php
require_once 'partials/header.php';
?>

<h1 class="text-center mt-5">Log in</h1>


<form action="" method="post" class="col-md-6 offset-md-3">
    <div class="min-vh-100">
        <div class="mb-3">
            <label for="InputPseudo" class="form-label">User email</label>
            <input type="text" class="form-control" id="InputPseudo" name="email">
        </div>
        <div class="mb-3">
            <label for="InputPassword" class="form-label">User password</label>
            <input type="password" class="form-control" id="InputPassword" name="pwd">
        </div>
        <button class="btn btn-primary" type="submit">Log in</button>
        <a href="index.php"><input type="button" class="btn btn-danger" value="Cancel" /></a>
    </div>
</form>


<?php
require_once 'partials/footer.php';
?>