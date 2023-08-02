<?php
require_once './vendor/autoload.php';
require './includes/_database.php';
include 'includes/_head.php';

session_start();
$_SESSION['token'] = md5(uniqid(mt_rand(), true));
?>

<?php
$query = $dbCo->prepare("SELECT article_title, article_img FROM article WHERE id_category=0 LIMIT 2");
$query->execute();
$resultsYokai = $query->fetchAll();
// var_dump($resultsYokai)
?>

<?php
$query = $dbCo->prepare("SELECT article_title, article_img FROM article WHERE id_category=1 LIMIT 2");
$query->execute();
$resultsKami = $query->fetchAll();

?>

<body>

  <?php include 'includes/_header.php' ?>

  <section class="body-container">

    <?php include 'includes/_herobanner.php' ?>

    <article class="article">
      <h2 class="article__ttl">Yōkais</h2>
      <p class="article__txt"> Les yōkai (妖怪, « esprit », « fantôme », « démon », « apparition étr ange ») sont un type de créatures surnaturelles dans le folklore japonais. Ils sont souvent représentés comme des esprits malfaisants ou simplement malicieux démontrant les tracas quotidiens ou inhabituels. </p>
      <div class="card-container">

        <?php foreach ($resultsYokai as $result) : ?>
          <a href="article.php" class="card">
            <img class="card__img" src="<?= $result['article_img'] ?>" alt="">
            <li class="card__ttl"><?= $result['article_title'] ?></li>
          </a>
        <?php endforeach; ?>
      </div>
    </article>

    <article class="article">
      <h2 class="article__ttl">Kami</h2>
      <p class="article__txt"> Un kami (神) est une divinité ou un esprit vénéré dans la religion shintoïste. <br>Leur équivalent chinois est shen.<br> Les kamis sont la plupart du temps des éléments de la nature, des animaux ou des forces créatrices de l'univers, mais peuvent aussi être des esprits de personnes décédées.<br> </p>
      <div class="card-container">

        <?php foreach ($resultsKami as $result) : ?>
          <a href="article.php" class="card">
            <img class="card__img" src="<?= $result['article_img'] ?>" alt="">
            <p class="card__ttl"><?= $result['article_title'] ?></p>
          </a>
        <?php endforeach; ?>
      </div>
    </article>

  </section>

  <?php
  //    $file = 'article.json'; // Chemin vers le fichier JSON
  //
  //    // Lecture du contenu du fichier JSON
  //    $jsonData = file_get_contents($file);
  //
  //    // Vérification de la validité du JSON
  //    if ($jsonData === false) {
  //      echo "Erreur lors de la lecture du fichier JSON.";
  //      exit;
  //    }
  //
  //    // Conversion du JSON en tableau associatif
  //    $data = json_decode($jsonData, true);
  //
  //    if ($data !== null) {
  //      if (isset($data['article'])) {
  //        $articles = $data['article'];
  //
  //        foreach ($articles as $article) {
  //          echo $article['Id_article'] . "<br>";
  //          echo $article['article_title'] . "<br>";
  //          echo $article['article_content'] . "<br>";
  //          echo $article['article_date'] . "<br>";
  //          echo $article['Id_Validation'] . "<br>";
  //          echo $article['Id_category'] . "<br>";
  //          echo $article['Id_someone'] . "<br>";
  //          echo "<br>";
  //        }
  //      } else {
  //        echo "Aucun article trouvé.";
  //      }
  //    } else {
  //      echo "JSON invalide.";
  //    }
  //
  ?>

  <?php include 'includes/_footer.php' ?>

  <script src="script.js"></script>
</body>

</html>
