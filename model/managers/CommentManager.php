<?php

require_once 'model/DBConnect.php';
require_once 'model/classes/Comment.php';
require_once 'model/classes/User.php';


class CommentManager 
{
    public static function getAllComments()
    {
        $dbh = dbconnect();
        $query = 'SELECT * FROM comment';
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_CLASS, 'Comment');
        return $comments;
    }

    public static function getCommentByPostId($id)
    {
        $dbh = dbconnect();
        $query = 'SELECT * FROM comment 
                  WHERE id_post = :id';
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Comment');
        $comment = $stmt->fetch();
        return $comment;
    }

    public static function getCommentAuthorByCommentId($id)
    {
        $dbh = dbconnect();
        $query = 'SELECT * FROM User AS U 
                  JOIN comment AS C
                  ON U.id_user = C.id_user
                  WHERE id_post = :id';
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        return $user;
    }
}