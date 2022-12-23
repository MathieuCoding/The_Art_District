<?php

function dbconnect()
{
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=tp_blog', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        return $dbh;
    } catch (PDOException $e) {
        print "Erreur : " . $e->getMessage() . "br/>";
        die();
    }
}
