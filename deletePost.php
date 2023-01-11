<?php
require_once 'model/managers/CommentManager.php';
require_once 'model/managers/PostManager.php';

if (isset($_GET) && !empty($_GET))
{
    $id_post = $_GET['id'];
}


CommentManager::deleteCommentbyPostId($id_post);
PostManager::deletePostCategoriesByPostId($id_post);
PostManager::deletePostById($id_post);


header('location:index.php');