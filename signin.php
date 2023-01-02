<?php

require_once 'model/managers/UserManager.php';

// ici on mettra toute la logique du code
if (isset($_POST) && !empty($_POST))
{
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT);
    UserManager::addNewUser($pseudo, $email, $hashed_pwd);
}

// requerir le fichier de vue
require_once 'views/indexView.php';


