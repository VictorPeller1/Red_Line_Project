<?php
session_start();
require_once './vendor/autoload.php';
require './includes/_database.php';
include 'includes/_head.php';
include 'includes/_header.php';

$contributor_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_article'])) {
    $article_id = $_POST['article_id'];

    $deleteQuery = $dbCo->prepare('DELETE FROM article WHERE id_article = :article_id AND id_someone = :contributor_id');
    $deleteQuery->bindParam(':article_id', $article_id);
    $deleteQuery->bindParam(':contributor_id', $contributor_id);
    $deleteResult = $deleteQuery->execute();

    if ($deleteResult) {
        // Rediriger vers la même page après la suppression
        header("Location: dashboard.php");
        exit();
    }
}

$query = $dbCo->prepare('SELECT id_article, article_title, article_content, article_img, id_validation
                         FROM article
                         WHERE id_someone = :contributor_id AND (id_validation IS NULL OR id_validation = 1)');
$query->bindParam(':contributor_id', $contributor_id);
$query->execute();
$submitted_articles = $query->fetchAll();
?>

<h1>Dashboard</h1>

<div class="article-list">
    <?php foreach ($submitted_articles as $article) : ?>
        <div class="card article-card">
            <h3 class="card__ttl"><?= $article['article_title'] ?></h3>
            <p class="card__content"><?= $article['article_content'] ?></p>
            <img class="card__img" src="<?= $article['article_img'] ?>" alt="Article Image">
            
            <form action="" method="POST">
                <input type="hidden" name="article_id" value="<?= $article['id_article'] ?>">
                <button type="submit" name="delete_article">Supprimer</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'includes/_footer.php' ?>

