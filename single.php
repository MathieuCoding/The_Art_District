<?php

require_once 'model/managers/CommentManager.php';
require_once 'model/managers/PostManager.php';


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "This id does not exist";
    die();
}


// ici on mettra toute la logique du code

$post = PostManager::getPostById($id);
$comment = CommentManager::getCommentByPostId($id);
$user = CommentManager::getCommentAuthorByCommentId($id);

// requerir le fichier de vue
require_once 'views/singleView.php';


