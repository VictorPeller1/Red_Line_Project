<?php
require_once './vendor/autoload.php';
require './includes/_database.php';
include 'includes/_head.php';
include 'includes/_header.php';
?>
<?php

session_start();
$_SESSION['token'] = md5(uniqid(mt_rand(), true));
?>

<?php
$query = $dbCo->prepare("SELECT id_article, article_title, article_img FROM article WHERE id_category=2 AND id_validation=2");
$query->execute();
$resultsKami = $query->fetchAll();
// var_dump($resultsKami)
?>

<body>

  <article class="article">
    <h2 class="article__ttl">Kamis</h2>
    <p class="article__txt">
      Un kami (神) est une divinité ou un esprit vénéré dans la religion shintoïste. Leur équivalent chinois est shen. Les kamis sont la plupart du temps des éléments de la nature, des animaux ou des forces créatrices de l'univers, mais peuvent aussi être des esprits de personnes décédées
    </p>
    <div class="card-container">

      <?php foreach ($resultsKami as $result) : ?>
        <a href="article.php?id=<?= $result['id_article'] ?>" class="card">
          <img class="card__img" src="<?= $result['article_img'] ?>" alt="">
<li class="card__ttl"><?= $result['article_title'] ?></li>
        </a>
      <?php endforeach; ?>

    </div>
  </article>
<?php  include 'includes/_footer.php' ?>

  <script src="script.js"></script>
</body>
