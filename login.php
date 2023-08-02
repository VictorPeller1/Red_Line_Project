<?php
require_once './vendor/autoload.php';
require './includes/_database.php';
include 'includes/_head.php';
include 'includes/_header.php';
include 'includes/_formLogin.php';
session_start();
?>

<?php
if (isset($_POST['connexion'])) {
    $someone_email = $_POST['someone_email'];
    $someone_pwd = $_POST['someone_pwd'];

    $mySQL = "SELECT * FROM `someone` WHERE `someone_email` = :someone_email";
    $query = $dbCo->prepare($mySQL);
    $query->bindParam(':someone_email', $someone_email);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($someone_pwd, $user['someone_pwd'])) {
        $_SESSION['user_id'] = $user['id']; // You may want to store more user information in the session if needed
        echo "Connexion réussie";
        header("Location: dashboard.php"); // Redirect to the dashboard or any other authenticated page
        exit();
    } else {
        echo "Adresse email ou mot de passe incorrect";
    }
}
?>


