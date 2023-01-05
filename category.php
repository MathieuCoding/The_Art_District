<?php
session_start();
// page catégorie
require_once 'model/managers/CategoryManager.php';
require_once 'model/managers/PostManager.php';

// reçoit l'id de la catégorie pour afficher les bonnes infos
if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];
    $categoryInfos = CategoryManager::getCategoryInfos($id);
    $categoryPosts = PostManager::getPostsByCategoryId($id);
}

$categories = CategoryManager::getAllCategories();






// requerir le fichier de vue

require_once 'views/categoryView.php';