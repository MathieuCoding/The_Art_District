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

    public static function getPostsByUserId($id)
    {
        $dbh = dbconnect();
        $query = "SELECT * FROM post JOIN user ON post.id_user = user.id_user WHERE user.id_user = :id;";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $posts;
    }

    public static function addPost($title, $picture, $content, $userId) {
        $dbh = dbconnect();
        $date = (new DateTime())->format('Y-m-d H:i:s');
        $query = "INSERT INTO post (title, date, picture, content, id_user) VALUES (:title, '$date', :picture, :content, :id_user)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id_user', $userId);
        $stmt->execute();
        return $dbh->lastInsertId();
    }

    public static function addPostCategories($id_post, $id_category)
    {
        $dbh = dbconnect();
        $query = "INSERT INTO post_category (id_post, id_category) VALUES (:post, :cat)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':post', $id_post);
        $stmt->bindParam(':cat', $id_category);
        $stmt->execute();
    }

    public static function editPost() {
        //à construire
    }

    public static function deletePost() {
        //à construire
    }
}
