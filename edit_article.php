<?php
session_start();
require_once './vendor/autoload.php';
require './includes/_database.php';
include 'includes/_head.php';
include 'includes/_header.php';

$contributor_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['article_id'])) {
    $article_id = $_GET['article_id'];

    // Récupérez les informations de l'article depuis la base de données
    $query = $dbCo->prepare('SELECT * FROM article WHERE id_article = :article_id AND id_someone = :contributor_id');
    $query->bindParam(':article_id', $article_id);
    $query->bindParam(':contributor_id', $contributor_id);
    $query->execute();
    $article = $query->fetch();

    if ($article) {
        // Si l'article existe, affichez le formulaire de modification
        ?>
        <h1>Modifier l'article</h1>
        <form method="POST">
            <input type="hidden" name="article_id" value="<?= $article_id ?>">
            <label for="article_title">Titre :</label>
            <input type="text" id="article_title" name="article_title" value="<?= $article['article_title'] ?>" required><br>

            <label for="article_content">Contenu :</label>
            <textarea id="article_content" name="article_content" required><?= $article['article_content'] ?></textarea><br>

            <label for="article_img">URL de l'Image :</label>
            <input type="text" id="article_img" name="article_img" value="<?= $article['article_img'] ?>" required><br>

            <input type="submit" name="update_article" value="Enregistrer les modifications">
        </form>
        <?php
    } else {
        // Si l'article n'existe pas ou n'appartient pas au contributeur, affichez un message d'erreur
        echo "Article non trouvé ou vous n'avez pas la permission de le modifier.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_article'])) {
    $article_id = $_POST['article_id'];
    $article_title = $_POST['article_title'];
    $article_content = $_POST['article_content'];
    $article_img = $_POST['article_img'];

    // Mettez à jour les informations de l'article dans la base de données
    $updateQuery = $dbCo->prepare('UPDATE article SET article_title = :article_title, article_content = :article_content, article_img = :article_img WHERE id_article = :article_id AND id_someone = :contributor_id');
    $updateQuery->bindParam(':article_id', $article_id);
    $updateQuery->bindParam(':contributor_id', $contributor_id);
    $updateQuery->bindParam(':article_title', $article_title);
    $updateQuery->bindParam(':article_content', $article_content);
    $updateQuery->bindParam(':article_img', $article_img);
    $updateResult = $updateQuery->execute();

    if ($updateResult) {
        // Redirigez l'utilisateur vers le tableau de bord après la mise à jour réussie
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour de l'article.";
    }
}

include 'includes/_footer.php';
?>

