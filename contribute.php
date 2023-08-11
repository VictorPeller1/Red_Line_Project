<?php
require_once './vendor/autoload.php';
require './includes/_database.php';
include './includes/_head.php';
include './includes/_header.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['article_title'], $_POST['article_content'], $_POST['article_img'], $_POST['id_category'], $_POST['id_validation'])) {
        // Collectez les valeurs des champs
        $article_title = $_POST['article_title'];
        $article_content = $_POST['article_content'];
        $article_img = $_POST['article_img'];
        $id_category = $_POST['id_category'];
        $id_validation = $_POST['id_validation'];

        // Insertion dans la table category (table parente)
        $categorySQL = "INSERT INTO `category` (`category_name`) VALUES (:category_name)";
        $categoryQuery = $dbCo->prepare($categorySQL);
        $categoryQuery->bindParam(':category_name', $category_name);
        $category_name = "Nom de la catégorie"; // Remplacez par le nom de la catégorie réel
        $categoryQuery->execute();
        $id_category = $dbCo->lastInsertId(); // Récupération de l'ID généré

        // Insertion dans la table validation (table parente)
        $validationSQL = "INSERT INTO `validation` (`validation_state`) VALUES (0)"; // Par défaut à 0 (false)
        $validationQuery = $dbCo->prepare($validationSQL);
        $validationQuery->execute();
        $id_validation = $dbCo->lastInsertId(); // Récupération de l'ID généré

        // Insérez les données dans la table article en utilisant les ID générés
        $articleSQL = "INSERT INTO `article` (`article_title`, `article_content`, `article_img`, `id_category`, `id_validation`)
                  VALUES (:article_title, :article_content, :article_img, :id_category, :id_validation)";
        $query = $dbCo->prepare($articleSQL);
        $query->bindParam(':article_title', $article_title);
        $query->bindParam(':article_content', $article_content);
        $query->bindParam(':article_img', $article_img);
        $query->bindParam(':id_category', $id_category);
        $query->bindParam(':id_validation', $id_validation);
        $response = $query->execute();

        if ($response) {
            echo "L'article a été inséré avec succès";
        } else {
            echo "Erreur lors de l'insertion de l'article";
        }
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de Contribute</title>
</head>
<body>

<h1>Formulaire de Contribute</h2>

<form action="contribute.php" method="POST">
    <label for="article_title">Titre :</label><br>
    <input type="text" id="article_title" name="article_title" required><br>

    <label for="article_content">Contenu :</label><br>
    <textarea id="article_content" name="article_content" required></textarea><br>

    <label for="article_img">URL de l'Image :</label><br>
    <input type="text" id="article_img" name="article_img" required><br>
    
    <!-- Nouveaux champs pour les clés étrangères -->
    <label for="id_category">Catégorie :</label><br>
    <select id="id_category" name="id_category" required>
        <option value="">Sélectionnez une catégorie</option>
        <!-- Remplacez ces options par les vraies catégories de votre base de données -->
        <option value="1">Catégorie 1</option>
        <option value="2">Catégorie 2</option>
    </select><br>
    
    <label for="id_validation">Validation :</label><br>
    <select id="id_validation" name="id_validation" required>
        <option value="">Sélectionnez un état de validation</option>
        <!-- Remplacez ces options par les vrais états de validation de votre base de données -->
        <option value="1">Non validé</option>
        <option value="2">Validé</option>
    </select><br>

    <input type="submit" name="valider" value="Insérer l'Article">
</form>

