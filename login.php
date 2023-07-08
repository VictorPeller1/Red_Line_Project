<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
require_once './vendor/autoload.php';
require 'includes/_database.php';
session_start();

include './includes/_header.php';


//if (!empty($_POST['someone_name']) && !empty($_POST['someone_email']) && !empty($_POST['someone_pwd'])) {
//    $someone_name = $_POST['someone_name'];
//    $someone_email = $_POST['someone_email'];
//    $someone_pwd = $_POST['someone_pwd'];
//    $query = $dbCo->prepare('SELECT * FROM article WHERE someone_name = :someone_name AND someone_email = :someone_email AND someone_pwd = :someone_pwd');
//    $query->bindValue(':someone_email', $someone_email);
//    $query->bindValue(':someone_pwd', $someone_pwd);
//    $result = $query->fetchAll(PDO::FETCH_ASSOC);
//
//    var_dump($result);
//
//    if ($result) {
//
//        echo "La connection a réussi !";
//    } else {
//        echo "Erreur lors de votre connection";
//    }
//}




?>



<!--<form action="login.php" method="post">
    <label for="">Name:</label>
    <input type="text" name="someone_name">
    <br>
    <label for="">Email:</label>
    <input type="text" name="someone_email">
    <br>
    <label for="">Password:</label>
    <input type="password" name="someone_pwd">
    <br>
    <input type="submit" name="valider" value="Valider">
    <br>
</form>-->
<a href="./register.php">Don't have an account yet ?</a>


<form method="POST" action="login.php">
    <label for="someone_email">Email:</label>
    <input type="email" id="someone_email" name="someone_email" required><br><br>

    <label for="someone_pwd">Mot de passe:</label>
    <input type="password" id="someone_pwd" name="someone_pwd" required><br><br>
    <input type="hidden" name="token" value="$_SESSION['myToken']>
    <input type=" submit" value="Se connecter">
</form>


<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["someone_email"];
    $password = $_POST["someone_pwd"];

    if ($email == "email@example.com" && $password == "pwd") {
        echo "Authentification réussie!";
    } else {
        echo "Email ou mot de passe incorrect!";
    }
}
?>