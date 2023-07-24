<?php
require_once './vendor/autoload.php';
require './includes/_database.php';
include 'includes/_head.php';
include 'includes/_header.php';

session_start();

function sanitizeInput($input)
{
    return htmlspecialchars(trim($input));
}

if (isset($_POST['login'])) {
    $someone_email = sanitizeInput($_POST['someone_email']);
    $someone_pwd = sanitizeInput($_POST['someone_pwd']);

    // Validation des données
    if (empty($someone_email) || empty($someone_pwd)) {
        echo "Veuillez remplir tous les champs du formulaire.";
        exit;
    }

    // Requête pour récupérer les informations de l'utilisateur
    $mySQL = "SELECT * FROM `someone` WHERE `someone_email` = :someone_email";
    $query = $dbCo->prepare($mySQL);
    $query->bindParam(':someone_email', $someone_email);
    $query->execute();
    $response = $query->fetch(PDO::FETCH_ASSOC);

    // Vérification du mot de passe
    if ($response) {
        // Authentification réussie
        $_SESSION['user_id'] = $user['id'];
        echo "Authentification réussie. Redirection vers la page d'accueil...";
        // Redirigez l'utilisateur vers la page d'accueil ou une autre page sécurisée
        header("Location: contribute.php");
        exit;
    } else {
        // Authentification échouée
        echo "Identifiants incorrects. Veuillez réessayer.";
    }
}
?>

<?php include 'includes/_formLogin.php' ?>