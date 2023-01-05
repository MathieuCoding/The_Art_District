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



$comments = CommentManager::getCommentsByPostId($id);
$commentsData = [];
foreach ($comments as $comment) {
    $commentAuthor = CommentManager::getCommentAuthorByCommentId($comment->getId_comment());
    $commentsData[] = [
        'comment' => $comment,
        'author' => $commentAuthor,
    ];
}

// $user = CommentManager::getCommentAuthorByCommentId($id);
$post = PostManager::getPostById($id);
$author = UserManager::getAuthorByPostId($id);
$categories = CategoryManager::getAllCategories();
$postCategories = CategoryManager::getCategoriesByPostId($id);


// Add comments 
if (isset($_SESSION['user']))
{
    if (isset($_POST) && !empty($_POST))
    {
        $idPost = $_GET['id'];
        $idUser = $_SESSION['user']['id'];
        $content = $_POST['comment'];
        $newCommentId = CommentManager::addComment($idPost, $idUser, $content);
        header("Refresh:0");
    }
}
// requerir le fichier de vue
require_once 'views/singleView.php';


