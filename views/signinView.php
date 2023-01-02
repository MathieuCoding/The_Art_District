<?php
require_once './partials/header.php';
?>

<form action="" method="post" class="col-md-6 offset-md-3">
    <div class="min-vh-100">
        <div class="mb-3 mt-5">
            <label for="InputPseudo" class="form-label">Pseudo de l'utilisateur</label>
            <input type="text" class="form-control" id="InputPseudo" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="InputPseudo" class="form-label">E-mail de l'utilisateur</label>
            <input type="text" class="form-control" id="InputPseudo" name="email">
        </div>
        <div class="mb-3">
            <label for="InputPassword" class="form-label">Mot de passe de l'utilisateur</label>
            <input type="password" class="form-control" id="InputPassword" name="pwd">
        </div>
        <button class="btn btn-primary" type="submit">S'enregistrer</button>
        <a href="../"><input type="button" class="btn btn-danger" value="Annuler" /></a>

    </div>

</form>


<?php
require_once './partials/footer.php';
?>