<?php
require_once './vendor/autoload.php';
require './includes/_database.php';

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

// foreach ($results as $result) {
// echo '<li>
//  <span data-name-id="' . $result['article_title'] . '"></span>
//  <img src="' . $result['article_img'] . '"></img>
//  </li>';
// }
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Yokami</title>
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png" />
  <link rel="manifest" href="/site.webmanifest" />
  <script src="https://kit.fontawesome.com/720cbc824f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="scss/style.css" />
</head>



<body>

  <?= include 'includes/_header.php'; ?>

  <section class="body-container">

    <?= include 'includes/_herobanner.php'; ?>

    <article class="article">
      <h2 class="article__ttl">Yōkais</h2>
      <p class="article__txt"> Les yōkai (妖怪, « esprit », « fantôme », « démon », « apparition étrange ») sont un type de créatures surnaturelles dans le folklore japonais. Ils sont souvent représentés comme des esprits malfaisants ou simplement malicieux démontrant les tracas quotidiens ou inhabituels. </p>
      <div class="card-container">
        <ul class="card">
          <img class="card__img" src="<?= $resultsYokai[0]['article_img'] ?>" alt="">
          <li class="card__ttl"><?= $resultsYokai[0]['article_title'] ?></li>
        </ul>
        <ul class="card">
          <img class="card__img" src=" <?= $resultsYokai[1]['article_img'] ?>" alt="">
          <p class="card__ttl"><?= $resultsYokai[1]['article_title'] ?></p>
        </ul>
    </article>

    <article class="article">
      <h2 class="article__ttl">Kami</h2>
      <p class="article__txt"> Un kami (神) est une divinité ou un esprit vénéré dans la religion shintoïste. Leur équivalent chinois est shen. Les kamis sont la plupart du temps des éléments de la nature, des animaux ou des forces créatrices de l'univers, mais peuvent aussi être des esprits de personnes décédées1. Beaucoup de kamis sont considérés comme les anciens ancêtres des clans, et il arrivait que certains de leurs membres ayant incarné de leur vivant les valeurs et vertus d'un kami deviennent eux-mêmes des kamis après leur mort. </p>
      <div class="card-container">

        <ul class="card">



          <img class="card__img" src="<?= $resultsKami[0]['article_img'] ?>" alt="">
          <p class="card__ttl"><?= $resultsKami[0]['article_title'] ?></p>
        </ul>
        <div class="card">
          <img class="card__img" src=" <?= $resultsKami[1]['article_img'] ?>" alt="">
          <p class="card__ttl"><?= $resultsKami[1]['article_title'] ?></p>
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
  //    
  ?>










  <footer class "footer">
    <ul class="footer__lst">
      <a class="footer__lnk">Mentions Légales</a>
      <a class="footer__lnk">CGV</a>
    </ul>
  </footer>
  <script src="script.js"></script>
</body>

</html>