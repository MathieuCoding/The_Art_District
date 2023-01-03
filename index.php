<?php

require_once 'model/managers/PostManager.php';
require_once 'model/managers/CategoryManager.php';
// require_once 'model/managers/UserManager.php';


// ici on mettra toute la logique du code
$posts = PostManager::getAllPosts();
$categories = CategoryManager::getAllCategories();
// $users = UserManager::getAllUsers();

// requerir le fichier de vue
require_once 'views/indexView.php';


