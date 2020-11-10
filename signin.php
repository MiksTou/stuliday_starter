<?php
require 'includes/header.php';
// REGISTER -------------------

if (!empty($_POST['email_signup']) && !empty($_POST['password1_signup']) && !empty($_POST['username_signup']) && isset($_POST['submit_signup'])) {
    $email = htmlspecialchars($_POST['email_signup']);
    $password1 = htmlspecialchars($_POST['password1_signup']);
    $password2 = htmlspecialchars($_POST['password2_signup']);
    $username = htmlspecialchars($_POST['username_signup']);

    if (register($email, $username, $password1, $password2)) {
        echo "L'utilisateur a bien été enregistrer";
    }
} elseif (!empty($_POST['email_login']) && !empty($_POST['password_login']) && isset($_POST['submit_login'])) {
    $email = strip_tags($_POST['email_login']);
    $password = strip_tags($_POST['password_login']);

    login($email, $password);
} else {
    if (isset($_POST)) {
        unset($_POST);
    }
}

?>

<div class="container">
    <div class="columns">
        <div class="column">
            <!-- REGISTER --------------------- -->
            <form
                action="<?php $_SERVER['REQUEST_URI']; ?>"
                method="post">
                
                <div class="field">
                    <label class="label" for="email_signup">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="email" placeholder="Type your e-mail" value="" id="email_signup"
                            name="email_signup" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="username_signup">Username</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Type your username" value="" id="username_signup"
                            name="username_signup" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="password1_signup">Password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="password" placeholder="Choose a password" value=""
                            name="password1_signup" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="password2_signup">Re-enter your password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="password" placeholder="Re-enter your password" value=""
                            name="password2_signup" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" required>
                            I agree to the <a href="#">terms and conditions</a>
                        </label>
                    </div>
                </div>


                <div class="field is-grouped">
                    <div class="control">
                        <input type="submit" value="Sign up !" name="submit_signup" class="button is-primary">
                    </div>
                </div>
            </form>
        </div>
        <div class="column">
            <!-- LOGIN --------------------- -->
            <form
                action="<?php $_SERVER['REQUEST_URI']; ?>"
                method="post">
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="email" placeholder="Type your e-mail" value="" name="email_login"
                            required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="password" placeholder="Choose a password" value=""
                            name="password_login" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <input type="submit" value="Login !" name="submit_login" class="button is-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require 'includes/footer.php';
