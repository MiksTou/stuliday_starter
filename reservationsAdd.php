<?php

$title = 'Reservations Add - Stuliday';
require 'includes/header.php';

$sql = 'SELECT * FROM reservations';
$res = $conn->query($sql);
$adverts = $res->fetchAll();
?>

<section class="hero is-success">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Réservations de biens
      </h1>
      <h2 class="subtitle">
      Cette page vous permet de reserver des biens
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
                    <label class="label" for="email">Votre email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Saisissez votre email pour être recontacter" value=""
                            id="email" name="email" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="fullname">Votre nom et prénom</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Saisissez votre nom et votre prénom" value=""
                            name="fullname" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="phone">Numéro de téléphone</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Saisissez votre numéro de téléphone" value=""
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
                    <label class="label" for="message">Votre message</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Rédigez un message clair et concit" value=""
                            name="message" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="button is-dark" name="add_reservations_submit">Enregistrer votre réservation</button>

                

<?php
require 'includes/footer.php';
