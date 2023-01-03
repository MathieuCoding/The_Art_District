<?php

require_once 'model/managers/UserManager.php';
require_once 'model/managers/CategoryManager.php';

// ici on mettra toute la logique du code
//reception des données du formulaire
if (isset($_POST) && !empty($_POST))
{
    //sanitisation des données et chiffrement du mot de passe
    $pseudo = htmlentities($_POST['pseudo']);
    $email = htmlentities($_POST['email']);
    $pwd = $_POST['pwd'];
    $hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT);
    //transmission à une méthode du manager pour enregistrer en bdd 
    UserManager::addNewUser($pseudo, $email, $hashed_pwd);
    header('Location:index.php');
}
$categories = CategoryManager::getAllCategories();

// requerir le fichier de vue
require_once 'views/signinView.php';


