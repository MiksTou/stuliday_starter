<?php

$title = 'Averts Edit - Stuliday';
require 'includes/header.php';

$sql1 = 'SELECT * FROM adverts';
$res1 = $conn->query($sql1);
$adverts = $res1->fetch(PDO::FETCH_ASSOC);
?>

<section class="hero is-warning">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Edition d'annonce
      </h1>
      <h2 class="subtitle">
      Cette page vous permet d'éditer vos annonces
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
                    <label class="label" for="editNomBien">Nouveau nom de votre bien</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Saisissez le nouveau nom de votre bien" value=""
                            id="editNomBien" name="editNomBien" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="editDescriptionBien">Nouvelle description du bien</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Modifier la decription de votre bien" value=""
                            name="editDescriptionBien" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="editAdresseBien">Modification adresse du bien</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Indiquer l'adresse modifié de votre bien" value=""
                            name="editAdresseBien" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="editVilleBien">Modification de la ville de votre bien</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Indiquer la ville de votre bien" value=""
                            name="editVilleBien" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="editPrixBien">Modification du prix du bien</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Indiquer le nouveau prix votre bien" value=""
                            name="editPrixBien" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="editImages">Modification de vos images</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Images du bien" value=""
                            name="editImages" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="button is-dark" name="adverts_edit">Enregistrer les modifications</button>

                

<?php
require 'includes/footer.php';
