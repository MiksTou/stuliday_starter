<?php

require 'includes/config.php';

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
        $sql = "SELECT * FROM users WHERE email = '{$email}'";
        $res = $conn->query($sql);
        $user = $res->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $db_password = $user['password'];
            if (password_verify($password, $db_password)) {
                $_SESSION['users_id'] = $user['users_id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username'];
                echo '<div class="alert alert-success" role="alert">Vous êtes connecté !</div>';
                header('Location: profile.php?id=' . $_SESSION['users_id']);
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

//AFFICHAGE

function viewAdmin()
{
    global $conn;
    $sth = $conn->prepare('SELECT * FROM users');
    $sth->execute();
    $adminViews = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($adminViews as $adminView) {
        $users_id = $adminView['users_id'];
        $email = $adminView['email'];
        $username = $adminView['username'];
    ?>



<div class="box">
    <article class="media">
        <div class="media-left">
            <figure class="image is-64x64">
                <img src="images/userImg.jpg" alt="Image">
            </figure>
        </div>
        <div class="media-content">
            <div class="content">
                <p>
                    <strong><?php echo $users_id; ?></strong>
                    <strong><?php echo $email; ?></strong>
                    <strong><?php echo $username; ?></strong>
                </p>
            </div>

            <div class="buttons">
                <button class="button is-info">View Users</button>
                <a href="advertsAdd.php"><button class="button is-success">Add Users</button></a>
               <a href="advertsEdit.php"><button class="button is-warning">Edit Users</button></a> 
               <a href="advertsSupp.php"><button class="button is-danger">Delete Users</button></a> 
            </div>
            <nav class="level is-mobile">
                <div class="level-left">
                    <a class="level-item" aria-label="reply">
                        <span class="icon is-small">
                            <i class="fas fa-reply" aria-hidden="true"></i>
                        </span>
                    </a>
                    <a class="level-item" aria-label="retweet">
                        <span class="icon is-small">
                            <i class="fas fa-retweet" aria-hidden="true"></i>
                        </span>
                    </a>
                    <a class="level-item" aria-label="like">
                        <span class="icon is-small">
                            <i class="fas fa-heart" aria-hidden="true"></i>
                        </span>
                    </a>
                </div>
            </nav>
        </div>
    </article>
</div>


<?php
    }
}


function affichageAdverts()
{
    global $conn;
    $sth = $conn->prepare('SELECT * FROM adverts');
    $sth->execute();
    $adverts = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($adverts as $advert) {
        $title = $advert['title'];
        $content = $advert['content'];
        $adress = $advert['address'];
        $city = $advert['city'];
        $price = $advert['price'];
        $images = $advert['images'];
        $author = $advert['author']; ?>



<div class="box">
    <article class="media">
        <div class="media-left">
            <figure class="image is-64x64">
                <img src="images/appart.jpg" alt="Image">
            </figure>
        </div>
        <div class="media-content">
            <div class="content">
                <p>
                    <strong><?php echo $title; ?></strong>
                    <small><?php echo $author; ?></small>
                    <small><?php echo $adress; ?></small>
                    <strong><?php echo $city; ?></strong>
                    <strong><?php echo $price; ?></strong>
                    <small><?php echo $images; ?></small>
                    <br>
                    <?php echo $content; ?>
                </p>
            </div>

            <div class="buttons">
                <button class="button is-info">View Adverts</button>
                <a href="advertsAdd.php"><button class="button is-success">Add Adverts</button></a>
               <a href="advertsEdit.php"><button class="button is-warning">Edit Adverts</button></a> 
               <a href="advertsSupp.php"><button class="button is-danger">Delete Adverts</button></a> 
            </div>
            <nav class="level is-mobile">
                <div class="level-left">
                    <a class="level-item" aria-label="reply">
                        <span class="icon is-small">
                            <i class="fas fa-reply" aria-hidden="true"></i>
                        </span>
                    </a>
                    <a class="level-item" aria-label="retweet">
                        <span class="icon is-small">
                            <i class="fas fa-retweet" aria-hidden="true"></i>
                        </span>
                    </a>
                    <a class="level-item" aria-label="like">
                        <span class="icon is-small">
                            <i class="fas fa-heart" aria-hidden="true"></i>
                        </span>
                    </a>
                </div>
            </nav>
        </div>
    </article>
</div>


<?php
    }
}

function affichageReservation()
{
    global $conn;
    $sth = $conn->prepare('SELECT * from reservations');
    $sth->execute();
    $reservations = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($reservations as $reservation) {
        $email = $reservation['email'];
        $fullname = $reservation['fullname'];
        $phone = $reservation['phone'];
        $message = $reservation['message']; 
?>

<div class="box">
    <article class="media">
        <div class="media-left">
            <figure class="image is-64x64">
                <img src="images/resa.jpg" alt="Image">
            </figure>
        </div>
        <div class="media-content">
            <div class="content">
                <p>
                    <strong><?php echo $fullname; ?></strong>
                    <small><?php echo $email; ?></small>
                    <small><?php echo $phone; ?></small>

                    <br>
                    <?php echo $message; ?>
                </p>
            </div>

            <div class="buttons">
                <button class="button is-info">View reservations</button>
                <a href="reservationsAdd.php"><button class="button is-success">Add Reservations</button></a>
               <a href="reservationsEdit.php"><button class="button is-warning">Edit Reservations</button> </a>
               <a href="reservationsSupp.php"><button class="button is-danger">Delete Reservations</button></a> 
            </div>
            <nav class="level is-mobile">
                <div class="level-left">
                    <a class="level-item" aria-label="reply">
                        <span class="icon is-small">
                            <i class="fas fa-reply" aria-hidden="true"></i>
                        </span>
                    </a>
                    <a class="level-item" aria-label="retweet">
                        <span class="icon is-small">
                            <i class="fas fa-retweet" aria-hidden="true"></i>
                        </span>
                    </a>
                    <a class="level-item" aria-label="like">
                        <span class="icon is-small">
                            <i class="fas fa-heart" aria-hidden="true"></i>
                        </span>
                    </a>
                </div>
            </nav>
        </div>
    </article>
</div>

<?php
    }
}

//PROFILE
function profilePage()
{
    global $conn;
    $sth = $conn->prepare("SELECT * FROM users");
    $sth->execute();
    $profiles = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($profiles as $profile) {
        $username = $profile['username'];
        $email = $profile['email'];
        
?>


<div class="content">

<h3><?php echo $username ?></h3>
<h3><?php echo $email ?></h3>


</div>
<?php
    }
}

//FONCTION EDITION, AJOUT, SUPP

// ADVERTS ---------------------------------------
function addAdverts($title, $content, $address, $city, $price, $images, $author)
{
    global $conn;
    // Vérification du prix (doit être un entier, et inférieur à 1 million d'euros)
    if (is_int($price) && $price > 0 && $price < 1000000) {
        // Utilisation du try/catch pour capturer les erreurs PDO/SQL
        try {
            // Création de la requête avec tous les champs du formulaire
            $sth = $conn->prepare('INSERT INTO adverts (title,content,address,city,price,images,author) VALUES (:title, :content, :address, :city, :price, :images, :author)');
            $sth->bindValue(':title', $title, PDO::PARAM_STR);
            $sth->bindValue(':content', $content, PDO::PARAM_STR);
            $sth->bindValue(':address', $address, PDO::PARAM_STR);
            $sth->bindValue(':city', $city, PDO::PARAM_STR);
            $sth->bindValue(':price', $price, PDO::PARAM_INT);
            $sth->bindValue(':images', $images, PDO::PARAM_STR);
            $sth->bindValue(':author', $author, PDO::PARAM_INT);

            // Affichage conditionnel du message de réussite
            if ($sth->execute()) {
                echo "<div class='alert alert-success'> Votre article a été ajouté à la base de données </div>";
                header('Location: adverts.php?id='.$conn->lastInsertId());
            }
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        }
    }
}

function editAdverts($title, $content, $address, $city, $price, $images, $id, $users_id)
{
    global $conn;
    if (is_int($price) && $price > 0 && $price < 1000000) {
        try {
            $sth = $conn->prepare('UPDATE adverts SET title=:title, content=:content, address=:address, city=:city, price=:price, images=:images WHERE ad_id= $id AND author= $users_id');
            $sth->bindValue(':title', $title);
            $sth->bindValue(':content', $content);
            $sth->bindValue(':address', $address);
            $sth->bindValue(':city', $city);
            $sth->bindValue(':price', $price);
            $sth->bindValue(':images', $images);
            $sth->bindValue(':ad_id', $id);
            $sth->bindValue(':author', $_SESSION['id']);
            if ($sth->execute()) {
                header("Location: adverts.php");
            }
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        }
    }
}

// Fonction de suppression des produits. Les arguments renseignés sont des placeholders étant donné qu'ils seront remplacés par les véritables variables une fois la fonction appelée;
function suppAdverts($users_id, $adverts)
{
    // Récupération de la connexion à la BDD à partir de l'espace global.
    global $conn;

    // Tentative de la requête de suppression.
    try {
        $sth = $conn->prepare('DELETE FROM adverts WHERE ad_id = :ad_id AND users_id =:users_id');
        $sth->bindValue(':ad_id', $adverts);
        $sth->bindValue(':users_id', $users_id);
        if ($sth->execute()) {
            header('Location:profile.php?s');
        }
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }
}

//RESERVATIONS -------------------------------------------------------

function addReservations($email, $fullname, $phone, $message)
{
    global $conn;
        // Utilisation du try/catch pour capturer les erreurs PDO/SQL
        try {
            // Création de la requête avec tous les champs du formulaire

            $sth = $conn->prepare('INSERT INTO reservations (email,fullname,phone,message) VALUES (:email, :fullname, :phone, :message)');
            $sth->bindValue(':email', $email, PDO::PARAM_STR);
            $sth->bindValue(':fullname', $fullname, PDO::PARAM_STR);
            $sth->bindValue(':phone', $phone, PDO::PARAM_INT);
            $sth->bindValue(':message', $message, PDO::PARAM_STR);

            // Affichage conditionnel du message de réussite
            if ($sth->execute()) {
                echo "<div class='alert alert-success'> Votre reservations a bien été effectuée </div>";
                header('Location: reservations.php?id='.$conn->lastInsertId());
            }
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        }
    }
