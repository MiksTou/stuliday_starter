<?php

    require 'includes/header.php';

    // Verrouiller l'accès à la page process aux méthodes POST.
    if ('POST' != $_SERVER['REQUEST_METHOD']) {
        echo "<div class='alert alert-danger'> La page à laquelle vous tentez d'accéder n'existe pas </div>";
    // Le elseif va servir au traitement du formulaire de création de produits
    } elseif (isset($_POST['adverts_submit'])) {
        // Vérification back-end du remplissage du formulaire
        if (!empty($_POST['nomBienAjout']) && !empty($_POST['descriptionBienAjout']) && !empty($_POST['adresseBien']) && !empty($_POST['villeBien']) && !empty($_POST['prixBien']) && !empty($_POST['images'])) {
            // Définition des variables
            $title = strip_tags($_POST['nomBienAjout']);
            $content = strip_tags($_POST['descriptionBienAjout']);
            $address= strip_tags($_POST['adresseBien']);
            $city = strip_tags($_POST['villeBien']);
            $price = intval(strip_tags($_POST['prixBien']));
            $images = strip_tags($_POST['images']);
            $author = $_SESSION['id'];
            // Lancement de la fonction d'ajout de produits
            addAdverts($title, $content, $address, $city, $price, $images, $author);
        }
        // 2nd elseif pour le formulaire de modification
        //ICCCCCCCCIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII
    } elseif (isset($_POST['adverts_edit'])) {
        echo 'bouton ok';
        var_dump($_POST);
        // Vérification back-end du formulaire d'édition

        if (!empty($_POST['editNomBien']) && !empty($_POST['editDescriptionBien']) && !empty($_POST['editAdresseBien']) && !empty($_POST['editVilleBien']) && !empty($_POST['editPrixBien']) && !empty($_POST['editImages'])) {
            echo 'if ok';
            // Définition des variables
            $title = strip_tags($_POST['editNomBien']);
            $content = strip_tags($_POST['editDescriptionBien']);
            $address= strip_tags($_POST['editAdresseBien']);
            $city = strip_tags($_POST['editVilleBien']);
            $price = intval(strip_tags($_POST['editPrixBien']));
            $images = strip_tags($_POST['editImages']);
            // Assigne la variable user_id à partir du token de session
            $users_id = $_SESSION['id'];
            $id = strip_tags($_SESSION['ad_id']);

            editAdverts($title, $content, $address, $city, $price, $images, $users_id, $id);
        }
    } elseif (isset($_POST['adverts_delete'])) {
        $adverts = $_POST['ad_id'];
        $users_id = $_SESSION['id'];

        suppAdverts($users_id, $adverts);
    } elseif (isset($_POST['users_delete'])) {
        $users_id = $_POST['users_id'];
        $phone = $_POST['user_phone'];

        // modifPhone($user_id, $phone);
    }


     // PROCESS AJOUT RESERVATIONS; Verrouiller l'accès à la page process aux méthodes POST.
     if ('POST' != $_SERVER['REQUEST_METHOD']) {
        echo "<div class='alert alert-danger'> La page à laquelle vous tentez d'accéder n'existe pas </div>";
    // Le elseif va servir au traitement du formulaire de création de produits
    } elseif (isset($_POST['add_reservations_submit'])) {
        // Vérification back-end du remplissage du formulaire
        echo 'bouton ok';
        if (!empty($_POST['email']) && !empty($_POST['fullname']) && !empty($_POST['phone']) && !empty($_POST['message'])) {
            echo 'if ok';
            // Définition des variables
            $email = strip_tags($_POST['email']);
            $fullname = strip_tags($_POST['fullname']);
            $phone= intval(strip_tags($_POST['phone']));
            $message = strip_tags($_POST['message']);
            // Lancement de la fonction d'ajout de produits
            addReservations($email, $fullname, $phone, $message);
        }
    }
    require 'includes/footer.php';
