<?php
require_once './vendor/autoload.php';
require './includes/_database.php';
include 'includes/_head.php';
include 'includes/_header.php';
include 'includes/_formLogin.php';
session_start();
$_SESSION['token'] = md5(uniqid(mt_rand(), true));
?>

<?php
if (isset($_POST['connexion'])) {
    $someone_name = $_POST['someone_name'];
    $someone_email = $_POST['someone_email'];
    $someone_pwd = $_POST['someone_pwd'];

    $mySQL = "SELECT * FROM `someone` WHERE `someone_email` = :someone_email";
    $query = $dbCo->prepare($mySQL);
    $query->bindParam(':someone_email', $someone_email);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($someone_pwd, $user['someone_pwd'])) {
        $_SESSION['user_id'] = $user['id_someone'];
        $_SESSION['user_role'] = $user['someone_role']; // Store user role in session
        echo "Connexion réussie";

        if ($user['someone_role'] == 'contributor') {
            header("Location: ./contribute.php"); // Redirect to the contributor dashboard
        } elseif ($user['someone_role'] == 'admin') {
            header("Location: ./admin.php"); // Redirect to the admin dashboard
        } else {
            // Handle other roles or scenarios
            // Redirect to appropriate pages or show appropriate messages
        }

        exit();
    } else {
        echo "Adresse email ou mot de passe incorrect";
    }
}
?>
