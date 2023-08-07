
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
$query = $dbCo->prepare("SELECT id_article, article_title, article_img FROM article WHERE id_category=0");
$query->execute();
$resultsYokai = $query->fetchAll();
// var_dump($resultsYokai)
?>

<body>


    <article class="article">
      <h2 class="article__ttl">Yōkais</h2>
      <p class="article__txt"> Les yōkai (妖怪, « esprit », « fantôme », « démon », « apparition étr ange ») sont un type de créatures surnaturelles dans le folklore japonais. Ils sont souvent représentés comme des esprits malfaisants ou simplement malicieux démontrant les tracas quotidiens ou inhabituels. </p>
      <div class="card-container">

        <?php foreach ($resultsYokai as $result) : ?>
          <a href="article.php?id=<?= $result['id_article'] ?>" class="card"> <!-- Ajout du lien avec l'ID de l'article -->
            <img class="card__img" src="<?= $result['article_img'] ?>" alt="">
            <li class="card__ttl"><?= $result['article_title'] ?></li>
          </a>
        <?php endforeach; ?>

      </div>
    </article>


<script src="script.js"></script>
</body>
