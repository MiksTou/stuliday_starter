<?php
require 'includes/header.php';
require 'includes/navbar.php';

if (!empty($_POST['submit_signup']) && !empty($_POST['email_signup']) && !empty($_POST['password1_signup'])) {
}

if (!empty($_POST['submit_login']) && !empty($_POST['email_login']) && !empty($_POST['password_login'])) {
    $pass_login = htmlspecialchars($_POST['password_login']);
    $email_login = htmlspecialchars($_POST['email_login']);

    $sql = "SELECT * FROM users WHERE email = '{$email_login}'";
    $res = $conn->query($sql1);
    $user = $res->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $db_pass = $user['password'];
        if (password_verify($pass_login, $db_pass)) {
            $_SESSION['email'] = $user['mail'];
            $_SESSION['id'] = $user['password'];
        }
    }
}

    if (isset($_POST['submit_signup'])) {
        $pass_su = htmlspecialchars($_POST['password1_signup']);
        $repass_su = htmlspecialchars($_POST['password2_signup']);
        $email_su = htmlspecialchars($_POST['email_signup']);

        $sql1 = "SELECT * FROM users WHERE email + '{$email_su}'";
        $res = $conn->query($sql1);
        if (!($count = $res->fetchColumn())) {
            if ($pass_su === $repass_su) {
                try {
                    $pass_su = password_hash($pass_su, PASSWORD_DEFAULT);
                    $sth = $conn->prepare('INSERT INTO users (email,password) VALUES (:email, :password)');
                    $sth->bindValue('email', $email_su);
                    $sth->bindValue('password', $pass_su);
                    $sth->execute();
                } catch (PDOException $e) {
                    echo 'Error'.$e->getMessage;
                }
            }
        } else {
            echo 'error';
        }
    }

var_dump($_POST);
?>
​
<div class="container">
    <div class="columns">
        <div class="column">
            <form
                action=" <?php $_SERVER['REQUEST_URI']; ?>"
                method="post">
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-danger" type="email" placeholder="Type your e-mail" value=""
                            name="email_signup">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <p class="help is-danger">This email is invalid</p>
                </div>

                <div class="field">
                    <label class="label">Password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-danger" type="password" placeholder="Choose a password" value=""
                            name="password1_signup">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <p class="help is-danger">This email is invalid</p>
                </div>

                <div class="field">
                    <label class="label">Re-enter your password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-danger" type="password" placeholder="Re-enter your password" value=""
                            name="password2_signup">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <p class="help is-danger">This email is invalid</p>
                </div>

                ​
                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox">
                            I agree to the <a href="#">terms and conditions</a>
                        </label>
                    </div>
                </div>
                ​
                <div class="field">
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="question">
                            Yes
                        </label>
                        <label class="radio">
                            <input type="radio" name="question">
                            No
                        </label>
                    </div>
                </div>
            </form>

            ​
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit" value="Sign-up !" name="submit_signup">Submit</button>
                </div>
                <div class="control">
                    <button class="button is-link is-light">Cancel</button>
                </div>
            </div>

        </div>


        ​
        <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-danger" type="email" placeholder="Email input" value="hello@">
                <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
                <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
            </div>
            <p class="help is-danger">This email is invalid</p>
        </div>
        ​

        ​
        <div class="field">
            <label class="label">Password</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-danger" type="password" placeholder="Choose a password" value=""
                    name="password1_signup">
                <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
                <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
            </div>
            <p class="help is-danger">This email is invalid</p>
        </div>

        ​

        ​
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Submit</button>
            </div>
            <div class="control">
                <button class="button is-link is-light">Cancel</button>
            </div>
        </div>


        </form>
    </div>
</div>
</div>
<?php
require 'includes/footer.php';
