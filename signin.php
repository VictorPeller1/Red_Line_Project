<?php
require 'includes/_database.php';

session_start();

if (isset($_POST['valider'])) {
    $someone_name = $_POST['someone_name'];
    $someone_email = $_POST['someone_email'];
    $someone_pwd = $_POST['someone_pwd'];

    $mySQL = "INSERT INTO `someone` (`someone_name`, `someone_email`, `someone_pwd`) VALUES (:someone_name, :someone_email, :someone_pwd)";
    $query = $dbCo->prepare($mySQL);
    $query->bindParam(':someone_name', $someone_name);
    $query->bindParam(':someone_email', $someone_email);
    $query->bindParam(':someone_pwd', $someone_pwd);
    $query->execute();
}
?>

<form style="border: 1px solid black;" action="" method="post" data-form-id="">
    <label for="">Name:</label>
    <input type="text" name="someone_name" value="">
    <br>
    <label for="">Email:</label>
    <input type="text" name="someone_email" value="">
    <br>
    <label for="">Password:</label>
    <input type="text" name="someone_pwd" value="">
    <br>
    <input type="submit" name="valider" value="Valider">
    <br>
</form>