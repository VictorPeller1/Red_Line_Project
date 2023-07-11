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

// var_dump($results);

// foreach ($resultsKami as $result) {
// echo '<li>
//  <span data-name-id="' . $result['article_title'] . '"></span>
//  <img src="' . $result['article_img'] . '"></img>
//  </li>';
//}
?>





<body>

  <?php include 'includes/_header.php' ?>

  <section class="body-container">

    <?php include 'includes/_herobanner.php' ?>

    <article class="article">
      <h2 class="article__ttl">Yōkais</h2>
      <p class="article__txt"> Les yōkai (妖怪, « esprit », « fantôme », « démon », « apparition étrange ») sont un type de créatures surnaturelles dans le folklore japonais. Ils sont souvent représentés comme des esprits malfaisants ou simplement malicieux démontrant les tracas quotidiens ou inhabituels. </p>
      <div class="card-container">
        <a href="article.php" class="card">
          <img class="card__img" src="<?= $resultsYokai[0]['article_img'] ?>" alt="">
          <li class="card__ttl"><?= $resultsYokai[0]['article_title'] ?></li>
        </a>
        
        <a href="article.php" class="card">
            <img class="card__img" src=" <?= $resultsYokai[1]['article_img'] ?>" alt="">
            <p class="card__ttl"><?= $resultsYokai[1]['article_title'] ?></p>
</a>
    </article>

    <article class="article">
      <h2 class="article__ttl">Kami</h2>
      <p class="article__txt"> Un kami (神) est une divinité ou un esprit vénéré dans la religion shintoïste. Leur équivalent chinois est shen. Les kamis sont la plupart du temps des éléments de la nature, des animaux ou des forces créatrices de l'univers, mais peuvent aussi être des esprits de personnes décédées1. Beaucoup de kamis sont considérés comme les anciens ancêtres des clans, et il arrivait que certains de leurs membres ayant incarné de leur vivant les valeurs et vertus d'un kami deviennent eux-mêmes des kamis après leur mort. </p>
      <div class="card-container">

        <a href="article.php" class="card">
          <img class="card__img" src="<?= $resultsKami[0]['article_img'] ?>" alt="">
          <p class="card__ttl"><?= $resultsKami[0]['article_title'] ?></p>
        </a>
        <a href="article.php" class="card">
          <img class="card__img" src=" <?= $resultsKami[1]['article_img'] ?>" alt="">
          <p class="card__ttl"><?= $resultsKami[1]['article_title'] ?></p>
        </a>
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
  //    
  ?>









<?php include 'includes/_footer.php'?>

  <script src="script.js"></script>
</body>

</html>