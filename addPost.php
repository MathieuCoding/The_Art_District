<?php
session_start();
require_once 'model/managers/PostManager.php';
require_once 'model/managers/CategoryManager.php';

$categories = CategoryManager::getAllCategories();

if (isset($_SESSION['user'])) {
    if (isset($_POST) && !empty($_POST)) {
        $title = htmlentities($_POST['title'], ENT_QUOTES);
        //$picture = $_POST['picture']; Depuis enctype="multipart/form-data", les données de l'image ne se trouvent plus dans $_POST
        //upload de fichier
        $uploads_dir = 'images';
        $tmp_location = $_FILES['picture']['tmp_name'];
        $random_string = uniqid(); //ici je génère une chaine de caractère aléatoire basée sur l'heure car le serveur écrase les fichiers qui ont le même nom
        $picture = $random_string.'-'.$_FILES['picture']['name'];//on génère un nouveau nom en concaténant les chaines aléatoires et le nom de l'image
        move_uploaded_file($tmp_location, "$uploads_dir/$picture");// on déplace de l'emplacement temporaire vers le dossier de destination sur le serveur


        $content = htmlentities($_POST['content'], ENT_QUOTES);
        $userId = htmlentities($_SESSION['user']['id'], ENT_QUOTES);
        $newPostId = PostManager::addPost($title, $picture, $content, $userId);


        //ajout des catégories sélectionnées
        $postCategories = $_POST['categories'];

        /*$_POST['categories'] nous donne un tableau des catégories sélectionnées il suffit donc de boucler sur ce tableau et pour chaque ligne insérer dans la table de liaison l'id de l'article ($newPost) et l'id de la catégorie*/
        foreach ($postCategories as $cat) {
            PostManager::addPostCategories($newPostId, $cat);
            header('location:index.php');
        }
    }
    
    require_once 'views/addPostView.php';
} else {
    echo 'Vous ne passerez pas !!!';
}
