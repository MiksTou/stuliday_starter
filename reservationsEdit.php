<?php

$title = 'Reservations Add - Stuliday';
require 'includes/header.php';

$sql = 'SELECT * FROM reservations';
$res = $conn->query($sql);
$adverts = $res->fetchAll();
?>

<section class="hero is-warning">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Edition de vos réservations
      </h1>
      <h2 class="subtitle">
      Cette page vous permet d'éditer vos réservations de biens
      </h2>
    </div>
  </div>
</section>

<div class="container">
    <div class="row">
        <div class="column">
            <form
                action="process.php"
                method="post">
                <div class="field">
                    <label class="label" for="editEmail">Editez votre email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Saisissez votre nouveau email" value=""
                            id="editEmail" name="editEmail" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="editFullname">Editez votre nom et prénom</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Editez votre nom et votre prénom" value=""
                            name="editFullname" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="editPhone">Editez votre numéro de téléphone</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Editez votre numéro de téléphone" value=""
                            name="phone" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="editMessage">Editez votre message</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Editez votre message" value=""
                            name="editMessage" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="button is-dark" name="add_reservations_submit">Confirmer l'édition de votre réservation</button>

                

<?php
require 'includes/footer.php';
