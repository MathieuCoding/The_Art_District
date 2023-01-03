<?php

require_once 'model/DBConnect.php';
require_once 'model/classes/Post.php';


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

    public static function getPostsByCategoryId($id)
    {
        $dbh = dbconnect();
        $query = "SELECT * FROM post JOIN post_category ON post.id_post = post_category.id_post WHERE post_category.id_category = :id;";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $posts;
    }
}
