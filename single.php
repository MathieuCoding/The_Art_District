<?php
session_start();
require_once 'model/managers/CommentManager.php';
require_once 'model/managers/PostManager.php';
require_once 'model/managers/UserManager.php';
require_once 'model/managers/CategoryManager.php';


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "This id does not exist";
    die();
}


// ici on mettra toute la logique du code

$post = PostManager::getPostById($id);
$comments = CommentManager::getCommentsByPostId($id);

$commentsData = [];
foreach ($comments as $comment) {
    $commentAuthor = CommentManager::getCommentAuthorByCommentId($comment->getId_comment());
    $commentsData[] = [
        'comment' => $comment,
        'author' => $commentAuthor,
    ];
}

$user = CommentManager::getCommentAuthorByCommentId($id);
$author = UserManager::getAuthorByPostId($id);
$categories = CategoryManager::getAllCategories();


// requerir le fichier de vue
require_once 'views/singleView.php';


