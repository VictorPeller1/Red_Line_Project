<form class="form" action="login.php" method="POST">
    <img class="form__logo" src="assets/logo/yokami_logo_white.png" alt="">
    <div class="form__container">
        <h1 class="form__ttl">Se connecter</h1>
        <label class="form__label" for="">Email:</label>
        <input type="text" name="someone_email">
        <br>
        <label class="form__label" for="">Mot de passe:</label>
        <input type="password" name="someone_pwd">
        <div class="form__social">
            <a href="https://www.facebook.com/">
                <i class="form__icon fab fa-facebook"></i>
                <label for="Facebook"></label>
            </a>
            <a href="https://www.instagram.com/">
                <i class="form__icon fab fa-instagram"></i>
            </a>
            <a href="https://www.twitter.com/">
                <i class="form__icon fab fa-twitter"></i>
            </a>
        </div>
    </div>
    <br>
    <input class="form__btn" type="submit" name="login" value="Se connecter">
    <a class="form__lnk" href="register.php">Create an account </a>
    <br>
</form>