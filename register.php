<?php
require_once './vendor/autoload.php';
require 'includes/_database.php';
include 'includes/_head.php';

session_start();

//-----------------------------------------------------------------------------------------------------------------------------

if (isset($_POST['valider'])) {
    $someone_name = $_POST['someone_name'];
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



<?php include 'includes/_header.php' ?>

<?php include 'includes/_formRegister.php' ?>

