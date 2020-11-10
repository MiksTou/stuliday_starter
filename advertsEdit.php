<?php

$title = 'Averts Edit - Stuliday';
require 'includes/header.php';

$sql = 'SELECT * FROM adverts';
$res = $conn->query($sql);
$adverts = $res->fetchAll();
?>
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
                            id="editNomBien" name="editBien" required>
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

                <button type="submit" class="btn btn-success" name="adverts_edit">Enregistrer les modifications</button>

                

<?php
require 'includes/footer.php';
