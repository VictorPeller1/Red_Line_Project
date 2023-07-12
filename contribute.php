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

    $mySQL = "INSERT INTO `article` (`article_title`, `article_content`, `article_img`) VALUES (:article_title, :article_content, :article_img)";
    $query = $dbCo->prepare($mySQL);
    $query->bindParam(':article_title', $article_title);
    $query->bindParam(':article_content', $article_content);
    $query->bindParam(':article_img', $article_img);
    $response = $query->execute();
    if ($response) {
        echo "L'article a été rédigé avec succès";
    } else {
        echo "Erreur lors de la rédaction de l'article";
    }
}
?>

<form action="contribute.php" method="POST">
    <label for="">Titre:</label>
    <input type="text" name="article_title">
    <br>
    <label for="">Description :</label>
    <textarea type="text" name="article_content"></textarea>
    <br>
    <label for="">Url de l'image :</label>
    <input type="text" name="article_img">
    <br>
    <input type="submit" name="valider" value="Valider">
    <br>
</form>