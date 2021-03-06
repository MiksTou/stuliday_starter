<?php

$title = 'Adverts Add - Stuliday';
require 'includes/header.php';

$sql = 'SELECT * FROM adverts';
$res = $conn->query($sql);
$adverts = $res->fetchAll();
?>

<section class="hero is-success">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Ajout d'annnonces de biens
      </h1>
      <h2 class="subtitle">
      Cette page vous permet d'ajouter des annonces de vos biens
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
                    <label class="label" for="nomBienAjout">Nom de votre bien</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Saisissez le nom de votre bien" value=""
                            id="nomBienAjout" name="nomBienAjout" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="descriptionBienAjout">Description du bien</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Décriver briévement votre bien" value=""
                            name="descriptionBienAjout" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="adresseBien">Adresse du bien</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Indiquer l'adresse de votre bien" value=""
                            name="adresseBien" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="villeBien">Ville où le bien est situé</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Indiquer la ville de votre bien" value=""
                            name="villeBien" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="prixBien">Prix du bien</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Indiquer le prix votre bien" value=""
                            name="prixBien" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>




                <div class="field">
                    <label class="label" for="images">Images</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Images du bien" value=""
                            name="images" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="button is-dark" name="adverts_submit">Enregistrer votre bien</button>

                

<?php
require 'includes/footer.php';
