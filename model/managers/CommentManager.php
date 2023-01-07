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

    // public static function getCommentByPostId($id)
    // {
    //     $dbh = dbconnect();
    //     $query = 'SELECT * FROM comment 
    //               WHERE id_post = :id';
    //     $stmt = $dbh->prepare($query);
    //     $stmt->bindParam(':id', $id);
    //     $stmt->execute();
    //     $stmt->setFetchMode(PDO::FETCH_CLASS, 'Comment');
    //     $comment = $stmt->fetch();
    //     return $comment;
    // }
    public static function getCommentsByPostId($id)
    {
        $dbh = dbconnect();
        $query = 'SELECT * FROM comment 
                  WHERE id_post = :id';
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_CLASS, 'Comment');
        return $comments;
    }

    public static function getCommentAuthorByCommentId($id)
    {
        $dbh = dbconnect();
        $query = 'SELECT * FROM User AS U 
                  JOIN comment AS C
                  ON U.id_user = C.id_user
                  WHERE id_comment = :id';
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        return $user;
    }

    public static function addComment($idPost, $idUser, $content)
    {
        $dbh = dbconnect();
        $date = (new DateTime())->format('Y-m-d H:i:s');
        $query = "INSERT INTO comment (id_post, id_user, date, content) VALUES (:id_post, :id_user, '$date', :content);";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id_post', $idPost, PDO::PARAM_INT);
        $stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->execute();
        return $dbh->lastInsertId();
    }

    public static function deleteCommentbyPostId($id_post)
    {
        $dbh = dbconnect();
        $query = 'DELETE FROM comment WHERE id_post = :id_post';
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id_post', $id_post);
        $stmt->execute();
        //return $dbh->affectedRows();

    }
}