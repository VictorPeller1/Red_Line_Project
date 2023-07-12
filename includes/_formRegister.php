<form class="form" action="register.php" method="post">
    <img class="form__logo" src="assets/logo/yokami_logo_white.png" alt="">
    <div class="form__container">
        <h1 class="form__ttl">Créer un compte</h1>
        <label class="form__label" for="">Nom :</label>
        <input type="text" name="someone_name">
        <br>
        <label class="form__label" for="">Email :</label>
        <input type="text" name="someone_email">
        <br>
        <label class="form__label" for="">Password :</label>
        <input type="password" name="someone_pwd">
        <br>
        <input class="form__btn" type="submit" name="valider" value="Valider">
        <br>
    </div>
    <a class="form__lnk" href="login.php">Already an account ?</a>
</form>