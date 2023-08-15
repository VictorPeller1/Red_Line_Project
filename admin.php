<?php
session_start();
require_once './vendor/autoload.php';
require './includes/_database.php';
include 'includes/_head.php';
include 'includes/_header.php';

// Traitement de la validation de l'article
if (isset($_POST['validate_article'])) {
    $article_id = $_POST['article_id'];
    
    // Met à jour la valeur de id_validation à 2 pour valider l'article
    $validateQuery = $dbCo->prepare("UPDATE article SET id_validation = 2 WHERE id_article = :article_id");
    $validateQuery->bindParam(':article_id', $article_id);
    $validateQuery->execute();
    
    // Redirige vers la page admin.php après la validation
    header("Location: admin.php");
    exit();
}

// Traitement de la suppression de l'article
if (isset($_POST['delete_article'])) {
    $article_id = $_POST['article_id'];
    
    // Supprime l'article de la base de données
    $deleteQuery = $dbCo->prepare("DELETE FROM article WHERE id_article = :article_id");
    $deleteQuery->bindParam(':article_id', $article_id);
    $deleteQuery->execute();
    
    // Redirige vers la page admin.php après la suppression
    header("Location: admin.php");
    exit();
}

$query = $dbCo->prepare('SELECT article.id_article, article.article_title, article.article_img, article.article_content, someone.someone_name
FROM article
INNER JOIN someone ON article.id_someone = someone.id_someone
WHERE article.id_validation IS NULL OR article.id_validation = 1
') ;
$query->execute();
$results= $query->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>

<!-- Header -->

<section class="article-list">
    <?php foreach ($results as $result) : ?>
        <div class="card article-card">
            <img class="card__img" src="<?= $result['article_img'] ?>" alt="">
            <h3 class="card__ttl"><?= $result['article_title'] ?></h3>
            <p class="card__author">Auteur : <?= $result['someone_name'] ?></p>
            
            <!-- Affichage du contenu de l'article -->
            <p class="card__content"><?= $result['article_content'] ?></p>
            
            <!-- Formulaire pour valider l'article -->
            <form action="admin.php" method="POST">
                <input type="hidden" name="article_id" value="<?= $result['id_article'] ?>">
                <button type="submit" name="validate_article">Valider</button>
            </form>
            
            <!-- Formulaire pour supprimer l'article -->
            <form action="admin.php" method="POST">
                <input type="hidden" name="article_id" value="<?= $result['id_article'] ?>">
                <button type="submit" name="delete_article">Supprimer</button>
            </form>
        </div>
    <?php endforeach; ?>
</section>

<!-- Footer -->

</body>
</html>

