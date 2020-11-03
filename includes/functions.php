<?php

require 'config.php';

function register($email, $username, $password1, $password2)
{
    // REGISTER -------------------
    global $conn;

    try {
        $sql1 = "SELECT * FROM users WHERE email = '{$email}'";
        $sql2 = "SELECT * FROM users WHERE username = '{$username}'";
        $res1 = $conn->query($sql1);
        $count_email = $res1->fetchColumn();
        if (!$count_email) {
            $res2 = $conn->query($sql2);
            $count_user = $res2->fetchColumn();
            if (!$count_user) {
                if ($password1 === $password2) {
                    $password1 = password_hash($password1, PASSWORD_DEFAULT);
                    $sth = $conn->prepare('INSERT INTO users (email, username, password) VALUES (:email, :username, :password)');
                    $sth->bindParam(':email', $email, PDO::PARAM_STR);
                    $sth->bindParam(':username', $username);
                    $sth->bindParam(':password', $password1);
                    $sth->execute();
                    echo "L'utilisateur a bien été enregisté";
                } else {
                    echo 'Les mots de passe ne concordent pas';
                }
            } elseif ($count_user > 0) {
                echo "Ce nom d'utilisateur est déjà pris  !";
            } elseif ($count_email > 0) {
                echo 'Cette addresse mail existe déjà !';
            }
        }
    } catch (PDOException $e) {
        echo 'Error : '.$e->getMessage();
    }
}

// LOGIN -------------------------
function login($email, $password)
{
    global $conn;

    try {
        $sql = "SELECT * FROM users WHERE email = '{email}'";
        $res = $conn->query($sql);
        $user = $res->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $db_password = $user['password'];
            if (password_verify($password, $db_password)) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username'];
                echo '<div class="alert alert-success" role="alert">Vous êtes connecté !</div>';
                header('Location: index.php');
            } else {
                echo '<div class="alert alert-danger" role="alert">Mot de passe erroné !</div>';
                unset($_POST);
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Adresse mail non reconnue !</div>';
            unset($_POST);
        }
    } catch (PDOException $e) {
        echo 'Error : '.$e->getMessage();
    }
}
//     if (!empty($_POST['submit_login']) && !empty($_POST['email_login']) && !empty($_POST['password_login'])) {
//         $pass_login = htmlspecialchars($_POST['password_login']);
//         $email_login = htmlspecialchars($_POST['email_login']);

//         $sql = "SELECT * FROM users WHERE email = '{$email_login}'";
//         $res = $conn->query($sql);
//         $user = $res->fetch(PDO::FETCH_ASSOC);
//         if ($user) {
//             $db_pass = $user['password'];
//             if (password_verify($pass_login, $db_pass)) {
//                 $_SESSION['email'] = $user['email'];
//                 $_SESSION['id'] = $user['id'];
//                 header('Location: index.php');
//             } else {
//                 echo '<div class="notification is-danger is-light">
//                 <button class="delete"></button>
//                 Mot de passe erroné
//             </div>';
//             }
//         } else {
//             echo '<div class="notification is-danger is-light">
//                 <button class="delete"></button>
//                 Cet utilisateur n\'existe pas
//             </div>';
//         }
//     }
// }
function affichage()
{
    global $conn;
    $sth = $conn->prepare('SELECT * FROM users');
    $sth->execute();
    $users = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $user) {
        ?>
<tr>
    <th scope="row"><?php echo $user['id']; ?>
        </td>
    <td><?php echo $user['email']; ?>
    </td>
    <td><?php echo $user['username']; ?>
    </td>
    <td><?php echo $user['password']; ?>
    </td>
</tr>
<?php
    }
}
