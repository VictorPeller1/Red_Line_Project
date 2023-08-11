
<?php
require_once './vendor/autoload.php';
require 'includes/_database.php';
include 'includes/_head.php';

session_start();

if (isset($_POST['valider'])) {
    $someone_name = $_POST['someone_name'];
    $someone_email = $_POST['someone_email'];
    $someone_pwd = $_POST['someone_pwd'];

    // Hasher le mot de passe
    $hashed_password = password_hash($someone_pwd, PASSWORD_DEFAULT);

    $mySQL = "INSERT INTO `someone` (`someone_name`, `someone_email`, `someone_pwd`)
              VALUES (:someone_name, :someone_email, :someone_pwd)";
    
    // Préparation de la requête
    $query = $dbCo->prepare($mySQL);
    $query->bindParam(':someone_name', $someone_name);
    $query->bindParam(':someone_email', $someone_email);
    $query->bindParam(':someone_pwd', $hashed_password);

    // Exécution de la requête
    $response = $query->execute();

    if ($response) {
        echo "L'inscription est réussie";
        header("Location: contribute.php"); // Rediriger vers la page de connexion
        exit();
    } else {
    echo "Erreur lors de l'inscription";
        header("Location: register.php"); // Rediriger vers la page de connexion
    }
}
?>

<?php include 'includes/_header.php' ?>

<?php include 'includes/_formRegister.php' ?>


