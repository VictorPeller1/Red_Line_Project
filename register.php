<?php
require_once './vendor/autoload.php';
require 'includes/_database.php';

session_start();

//-----------------------------------------------------------------------------------------------------------------------------

if (isset($_POST['valider'])) {
    $someone_email = $_POST['someone_email'];
    $someone_pwd = $_POST['someone_pwd'];

    $mySQL = "INSERT INTO `someone` (`someone_name`, `someone_email`, `someone_pwd`)
     VALUES (:someone_name, :someone_email, :someone_pwd)";
    $query = $dbCo->prepare($mySQL);
    $query->bindParam(':someone_name', $someone_name);
    $query->bindParam(':someone_email', $someone_email);
    $query->bindParam(':someone_pwd', $someone_pwd);
    $response = $query->execute();
    if ($response) {
        echo "L'inscription est réussie";
        header("Location: contribute.php");
    } else {
        echo "Erreur lors de l'inscription";
    }
};

//---------------------------------------------- OR -------------------------------------------------------------------------

//if (!empty($POST_['someone_name']) && !empty($POST_['someone_email'])  && !empty($POST_['someone_pwd'])) {
//    $email = $_POST['someone_email'];
//    $password = password_hash($_POST['someone_pwd'], PASSWORD_DEFAULT);
//    $query = $dbCo->prepare('INSERT INTO someone (someone_name, someone_email, someone_pwd) 
//                                        VALUES (:someone_name, :someone_email, :omeone_pwd)');
//    $query->bindValue('someone_name', $someone_name);
//    $query->bindValue('someone_email', $someone_email);
//    $query->bindValue('someone_pwd', $someone_pwd);
//    $result = $query->execute();
//
//    if ($result) {
//        echo "L'inscription s'est déroulée avec succès";
//    } else {
//        echo "Erreur lors de votre inscription";
//    };
//};

//-----------------------------------------------------------------------------------------------------------------------
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

<?= include 'includes/_header.php'; ?>

<form action="register.php" method="post">
    <label for="">Email:</label>
    <input type="text" name="someone_email">
    <br>
    <label for="">Password:</label>
    <input type="password" name="someone_pwd">
    <br>
    <input type="submit" name="valider" value="Valider">
    <br>
    <a href="login.php">Already an account ?</a>
</form>