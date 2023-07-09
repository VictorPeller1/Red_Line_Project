<?php
require_once './vendor/autoload.php';
require './includes/_database.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yokami</title>
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png" />
    <link rel="manifest" href="/site.webmanifest" />
    <script src="https://kit.fontawesome.com/720cbc824f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="scss/style.css" />
</head>
<?= include 'includes/_header.php' ?>

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
    <input type="text" name="article_content">
    <br>
    <label for="">Url de l'image :</label>
    <input type="text" name="article_img">
    <br>
    <input type="submit" name="valider" value="Valider">
    <br>
</form>