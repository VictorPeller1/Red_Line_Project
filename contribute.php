<?php
require_once './vendor/autoload.php';
require './includes/_database.php';
include './includes/_head.php';
include './includes/_header.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['article_title'], $_POST['article_content'], $_POST['article_img'], $_POST['id_category'])) {
        // Collectez les valeurs des champs
        $article_title = $_POST['article_title'];
        $article_content = $_POST['article_content'];
        $article_img = $_POST['article_img'];
        $id_category = $_POST['id_category'];
        
        
        $user_id = $_SESSION['user_id'];
        var_dump($_SESSION['user_id']);
        // ID Validation par défaut à 1 (validation_state = false)
        $id_validation = 1;

        // Insertion dans la table article en spécifiant id_validation
        $articleSQL = "INSERT INTO `article` (`article_title`, `article_content`, `article_img`, `id_category`, `id_validation`, `id_someone`)
              VALUES (:article_title, :article_content, :article_img, :id_category, :id_validation, :id_someone)";
$query = $dbCo->prepare($articleSQL);
$query->bindParam(':article_title', $article_title);
$query->bindParam(':article_content', $article_content);
$query->bindParam(':article_img', $article_img);
$query->bindParam(':id_category', $id_category);
$query->bindParam(':id_validation', $id_validation);
$query->bindParam(':id_someone', $user_id); // Ajoutez cette ligne pour lier l'article à l'utilisateur


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

<h1>Formulaire de Contribute</h1>

<form action="contribute.php" method="POST">
    <label for="article_title">Titre :</label><br>
    <input type="text" id="article_title" name="article_title" required><br>

    <label for="article_content">Contenu :</label><br>
    <textarea id="article_content" name="article_content" required></textarea><br>

    <label for="article_img">URL de l'Image :</label><br>
    <input type="text" id="article_img" name="article_img" required><br>
    
    <label for="id_category">Catégorie :</label><br>
    <select id="id_category" name="id_category" required>
        <option value="">Sélectionnez une catégorie</option>
        <!-- Remplacez ces options par les vraies catégories de votre base de données -->
        <option value="1">yokai</option>
        <option value="2">kami</option>
    </select><br>

    <input type="submit" name="valider" value="Insérer l'Article">
</form>

</body>
</html>
