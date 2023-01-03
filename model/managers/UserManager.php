<?php

require_once 'model/DBConnect.php';
require_once 'model/classes/User.php';


class UserManager
{

    // public static function getAllUsers(){
    //     $dbh = dbconnect();
    //     $query = "SELECT * FROM user";
    //     $stmt = $dbh->prepare($query);
    //     $stmt->execute();
    //     $users = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
    //     return $users;
    // }

    public static function addNewUser($pseudo, $email, $hashed_pwd)
    {
        $dbh = dbconnect();
        $query = 'INSERT INTO user (pseudo, email, userPassword) VALUES (:pseudo, :email, :pwd);';
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':pwd', $hashed_pwd, PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function connectUser()
    {
        
    }

    public static function getAuthorByPostId($id)
    {
        $dbh = dbconnect();
        $query = 'SELECT * FROM post 
                  JOIN user ON post.id_user = user.id_user 
                  WHERE post.id_post = :id';
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $post = $stmt->fetch();
        return $post;
    }
}
