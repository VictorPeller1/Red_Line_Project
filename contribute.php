<?php
require_once './vendor/autoload.php';
require './includes/_database.php';
include './includes/_head.php';
include './includes/_header.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['article_title'], $_POST['article_content'], $_POST['article_img'])) {
        $article_title = $_POST['article_title'];
        $article_content = $_POST['article_content'];
        $article_img = $_POST['article_img'];

        $mySQL = "INSERT INTO `article` (`article_title`, `article_content`, `article_img`)
                  VALUES (:article_title, :article_content, :article_img)";
        $query = $dbCo->prepare($mySQL);
        $query->bindParam(':article_title', $article_title);
        $query->bindParam(':article_content', $article_content);
        $query->bindParam(':article_img', $article_img);
        $response = $query->execute();
        
        if ($response) {
            echo "L'article a été inséré avec succès";
        } else {
            echo "Erreur lors de l'insertion de l'article";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de Contribute</title>
</head>
<body>

<h2>Formulaire de Contribute</h2>

<form action="contribute.php" method="POST">
    <label for="article_title">Titre :</label><br>
    <input type="text" id="article_title" name="article_title" required><br>

    <label for="article_content">Contenu :</label><br>
    <textarea id="article_content" name="article_content" required></textarea><br>

    <label for="article_img">URL de l'Image :</label><br>
    <input type="text" id="article_img" name="article_img" required><br>

    <input type="submit" name="valider" value="Insérer l'Article">
</form>

</body>
</html>

