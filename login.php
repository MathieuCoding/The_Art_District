<?php
session_start();
require_once 'model/managers/UserManager.php';
require_once 'model/managers/CategoryManager.php';

// ici on mettra toute la logique du code
//reception des données du formulaire
if (isset($_POST) && !empty($_POST))
{
    //sanitisation des données et chiffrement du mot de passe
    $email = ($_POST['email']);
    $pwd = $_POST['pwd'];
    $hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT);
    //récupération des données de l'utilisateur via une valeur unique telle que le mail
    $user = UserManager::getUserByEmail($email);
    //vérification de la correspondance du mdp en bdd avec celui saisi par l'utilisateur
    $verified_password = password_verify($pwd, $user->getUserPassword());
    if($verified_password)
    {
        UserManager::connectUser($user);
    }
    
    header('Location:index.php');
}

$categories = CategoryManager::getAllCategories();

// requerir le fichier de vue
require_once 'views/loginView.php';

