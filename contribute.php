<?php
require_once './vendor/autoload.php';
require './includes/_database.php';
include './includes/_head.php';
include './includes/_header.php';
session_start();

?>

<?php
if (isset($_POST['valider'])) {
    $article_title = $_POST['article_title'];
    $article_content = $_POST['article_content'];
    $article_img = $_POST['article_img'];
    $Id_category = $_POST['Id_category']; // Récupérer la valeur depuis le formulaire
    $Id_someone = $_POST['Id_someone']; // Récupérer la valeur depuis le formulaire

    $mySQL = "INSERT INTO `article` (`article_title`, `article_content`, `article_img`, `Id_category`, `Id_someone`)
             VALUES (:article_title, :article_content, :article_img, :Id_category, :Id_someone)";
    $query = $dbCo->prepare($mySQL);
    $query->bindParam(':article_title', $article_title);
    $query->bindParam(':article_content', $article_content);
    $query->bindParam(':article_img', $article_img);
    $query->bindParam(':Id_category', $Id_category);
    $query->bindParam(':Id_someone', $Id_someone);
    $response = $query->execute();
    if ($response) {
        echo "L'article a été rédigé avec succès";
    } else {
        echo "Erreur lors de la rédaction de l'article";
    }
}

?>

<?php include 'includes/_formContribute.php'?>
