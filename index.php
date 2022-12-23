<?php

require_once 'model/managers/PostManager.php';

// ici on mettra toute la logique du code
$posts = PostManager::getAllPosts();

// requerir le fichier de vue
require_once 'views/indexView.php';


