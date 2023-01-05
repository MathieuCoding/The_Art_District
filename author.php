<?php
session_start();
// page auteur
require_once 'model/managers/CategoryManager.php';
require_once 'model/managers/PostManager.php';
require_once 'model/managers/UserManager.php';

// reçoit l'id de l'auteur pour afficher les bonnes infos
if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];
    $userPosts = PostManager::getPostsByUserId($id);
    $userInfos = UserManager::getUserById($id);

}

$categories = CategoryManager::getAllCategories();




// requerir le fichier de vue

require_once 'views/authorView.php';