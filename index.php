<?php
require_once './vendor/autoload.php';
require './includes/_database.php';
include 'includes/_head.php';

session_start();
?>

<?php
$query = $dbCo->prepare("SELECT id_article, article_title, article_img FROM article WHERE id_category=1 LIMIT 6");
$query->execute();
$resultsYokai = $query->fetchAll();
// var_dump($resultsYokai)
?>

<?php
$query = $dbCo->prepare("SELECT id_article, article_title, article_img FROM article WHERE id_category=2 LIMIT 6");
$query->execute();
$resultsKami = $query->fetchAll();

?>

<body>
?>



  <?php include './includes/_header.php' ?>

    <form>
      <input type="text" id="searchInput" placeholder="Entrez votre recherche...">
</form>




  <section class="body-container">

    <?php include 'includes/_herobanner.php' ?>

    <article class="article">
      <a href="yokai.php" class="article__ttl">Yōkais</a>
      <p class="article__txt"> Les yōkai (妖怪, « esprit », « fantôme », « démon », « apparition étrange ») sont un type de créatures surnaturelles dans le folklore japonais. Ils sont souvent représentés comme des esprits malfaisants ou simplement malicieux démontrant les tracas quotidiens ou inhabituels. </p>
      <div class="card-container">

        <?php foreach ($resultsYokai as $result) : ?>
          <a href="article.php?id=<?= $result['id_article'] ?>" class="card"> <!-- Ajout du lien avec l'ID de l'article -->
            <img class="card__img" src="<?= $result['article_img'] ?>" alt="">
            <li class="card__ttl"><?= $result['article_title'] ?></li>
          </a>
        <?php endforeach; ?>

      </div>
    </article>

    <article class="article">
      <a href="kami.php" class="article__ttl">Kami</a>
      <p class="article__txt"> Un kami (神) est une divinité ou un esprit vénéré dans la religion shintoïste. <br>Leur équivalent chinois est shen.<br> Les kamis sont la plupart du temps des éléments de la nature, des animaux ou des forces créatrices de l'univers, mais peuvent aussi être des esprits de personnes décédées.<br> </p>
<div class="card-container">

        <?php foreach ($resultsKami as $result) : ?>
          <a href="article.php?id=<?= $result['id_article'] ?>" class="card"> <!-- Ajout du lien avec l'ID de l'article -->
            <img class="card__img" src="<?= $result['article_img'] ?>" alt="">
            <li class="card__ttl"><?= $result['article_title'] ?></li>
          </a>
        <?php endforeach; ?>

      </div>
    </article>

  </section>
  <?php include 'includes/_footer.php' ?>

  <script src="script.js"></script>
</body>

</html>
