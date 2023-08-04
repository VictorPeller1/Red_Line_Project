
<?php
require_once './vendor/autoload.php';
require './includes/_database.php';
include 'includes/_head.php';

session_start();
$_SESSION['token'] = md5(uniqid(mt_rand(), true));

// Vérifie si le paramètre "id" est présent dans l'URL
if (isset($_GET['id'])) {
  // Récupére l'ID de l'article sélectionné
  $articleId = $_GET['id'];

  // Prépare la requête pour récupérer les détails de l'article en fonction de son ID
  $query = $dbCo->prepare("SELECT article_title, article_img FROM article WHERE id_article = :id LIMIT 1");
  $query->bindParam(':id', $articleId, PDO::PARAM_INT);
  $query->execute();
  $selectedArticle = $query->fetch();

  // Si aucun article n'est trouvé avec l'ID fourni, redirige vers la page d'accueil ou afficher un message d'erreur
  if (!$selectedArticle) {
    header("Location: index.php"); // Remplace index.php par le nom de la page d'accueil
    exit;
  }
} else {
  header("Location: index.php"); // Redirige vers la page d'accueil si aucun ID d'article n'est spécifié
  exit;
}
?>
<body>
  <?php include 'includes/_header.php' ?>

  <section class="article-container">
    <h2 class="article__ttl"><?= $selectedArticle['article_title'] ?></h2>
    <img class="selected-article__img" src="<?= $selectedArticle['article_img'] ?>" alt="">
  </section>

  <?php include 'includes/_footer.php' ?>

  <script src="script.js"></script>
</body>

</html>
