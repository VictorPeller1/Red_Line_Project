<?php

require './includes/_database.php';
require './vendor/autoload.php';
include './includes/_head.php';
include './includes/_header.php';
?>




<?php

$query = $dbCo->prepare("SELECT article_img, article_title, article_content FROM article");
$query->execute();
$resultsYokai = $query->fetchAll();
// var_dump($resultsYokai);

?>


<div class="page">
    <img class=" page__img" src="<?= $resultsYokai[0]['article_img'] ?>" alt="">
</div>

<article class="">
    <h1><?= $resultsYokai[0]['article_title'] ?></h1>
    <div><?= $resultsYokai[0]['article_content'] ?></div>
</article>

<?php

$query = $dbCo->prepare("SELECT someone_name FROM someone WHERE id_someone = 1");
$query->execute();
$writter = $query->fetch();
// var_dump($writter);
?>


<div>Written by : <?= $writter['someone_name'] ?></div>




<!-- LEAVE A COMMENT BELOW ->