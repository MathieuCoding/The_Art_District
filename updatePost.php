<?php
session_start();
require_once 'model/managers/PostManager.php';
require_once 'model/managers/CategoryManager.php';


if (isset($_GET) && !empty($_GET))
{
    $id = $_GET['id'];
}else {
    echo "This id does not exist";
    die();
}


$categories = CategoryManager::getAllCategories();
$post = PostManager::getPostById($id);
$postCategories = CategoryManager::getCategoriesByPostId($id);







// Update post 
if (isset($_SESSION['user']))
{
    if (isset($_POST) && !empty($_POST))
    {
        $id_post = htmlentities($_GET['id'], ENT_QUOTES);
        $idTitle = htmlentities($_POST['title'], ENT_QUOTES);
        $content = htmlentities($_POST['content'], ENT_QUOTES);

        $uploads_dir = 'images';
        $tmp_location = $_FILES['picture']['tmp_name'];
        $random_string = uniqid(); //ici je génère une chaine de caractère aléatoire basée sur l'heure car le serveur écrase les fichiers qui ont le même nom
        $picture = $random_string.'-'.$_FILES['picture']['name'];//on génère un nouveau nom en concaténant les chaines aléatoires et le nom de l'image
        move_uploaded_file($tmp_location, "$uploads_dir/$picture");// on déplace de l'emplacement temporaire vers le dossier de destination sur le serveur

        PostManager::editPost($id_post, $idTitle, $content, $picture);

        $newPostCategories = $_POST['categories'];
        var_dump($newPostCategories);
        var_dump($postCategories);
          
        foreach ($newPostCategories as $cat)
        {
           
            
           
            
            //if (!in_array($cat, $postCategoriesUpdated))
             if (!in_array($cat, $postCategories))
           
            {
                PostManager::addPostCategories($id_post, $cat);
            }
        //header('location:index.php?id=' . $id);
        }
     
    }
    require_once 'views/updatePostView.php';
}



