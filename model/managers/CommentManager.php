<?php

require_once './model/DBConnect.php';
require_once './model/classes/Comment.php';
require_once './model/classes/User.php';


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

    public static function getCommentById($id)
    {
        $dbh = dbconnect();
        $query = 'SELECT * FROM comment AS C
                  JOIN post AS P
                  ON C.id_post = P.id_post
                  WHERE C.id_post = P.id_post';
        $stmt = $dbh->prepare($query);
        // $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Comment');
        $comment = $stmt->fetch();
        return $comment;
    }

    public static function getCommentUserById($id)
    {
        $dbh = dbconnect();
        $query = 'SELECT * FROM comment AS C 
                  JOIN user AS U
                  ON C.id_user = U.id_user
                  WHERE id_comment = :id';
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        return $user;
    }
}