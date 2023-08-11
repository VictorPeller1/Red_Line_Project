<?php
session_start();
require_once './vendor/autoload.php';
require './includes/_database.php';
include 'includes/_head.php';
include 'includes/_header.php';
?>


<?php
$query = $dbCo->prepare('SELECT article.id_article, article.article_title, article.article_img, someone.someone_name
FROM article
INNER JOIN someone ON article.id_someone = someone.id_someone
WHERE article.id_validation IS NULL OR article.id_validation = 1
') ;
$query->execute();
$results= $query->fetchAll();
// var_dump($resultsYokai)
?>

        <?php foreach ($results as $result) : ?>
          <a href="article.php?id=<?= $result['id_article'] ?>" class="card"> <!-- Ajout du lien avec l'ID de l'article -->
            <img class="card__img" src="<?= $result['article_img'] ?>" alt="">
            <li class="card__ttl"><?= $result['article_title'] ?></li>
          </a>
        <?php endforeach; ?>


