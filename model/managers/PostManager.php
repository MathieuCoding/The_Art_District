<?php

require_once 'model\DBConnect.php';
require_once 'model\classes\Post.php';







class PostManager 
{
    public static function getAllPosts()
    {
        $dbh = dbconnect();
        $query = 'SELECT * FROM post';
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $posts;
    }

    public static function getPostById($id)
    {
        
        // if (isset($_GET['id']) && !empty($_GET['id'])) {
        //     $id = $_GET['id'];
        // } else {
        //     echo "This id does not exist";
        //     die();
        // }

        //retourne un seul article par rapport à son id
        $dbh = dbconnect();
        $query = 'SELECT * FROM post WHERE id_post = :id';
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
        $post = $stmt->fetch();
        return $post;
    }
}