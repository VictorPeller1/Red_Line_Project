<?php

require './includes/_database.php';
require './vendor/autoload.php';



include './includes/_header.php';
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



<?php

$query = $dbCo->prepare("SELECT * FROM article");
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