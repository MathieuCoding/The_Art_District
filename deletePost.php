<?php
require_once 'model/managers/CommentManager.php';
require_once 'model/managers/PostManager.php';

if (isset($_GET) && !empty($_GET))
{
    $id_post = $_GET['id_post'];
}

CommentManager::deleteCommentbyPostId($id_post);
PostManager::deletePostCategoriesByPostId($id_post);