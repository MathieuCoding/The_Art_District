<?php

require_once './model/DBConnect.php';


class UserManager
{
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
}
