<?php

require 'includes/header.php';

// $sql = 'SELECT * FROM adverts';
// $res = $conn->query($sql);
// $advets = $res->fetchAll();
?>



<div class="container">
    <div class="columns">
        <div class="column">
            <!-- REGISTER --------------------- -->
            <form
                action="<?php $_SERVER['REQUEST_URI']; ?>"
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
                        <input class="input" type="text" placeholder="Décriver précisément votre bien" value=""
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
                    <label class="label" for="prixBienAjout">Prix de votre article en €</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Veuillez indiquer le prix de votre bien" value=""
                            name="prixBienAjout" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="villeBienAjout">Ville où le bien est situé</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Indiquer la localisation de votre bien" value=""
                            name="villeBienAjout" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="categorieBienAjout">Catégorie du bien</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Indiquer la catégorie de votre bien" value=""
                            name="categorieBienAjout" required>
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

                <div class="form-group">
                    <label for="InputCategory">Catégorie de l'article</label>
                    <select class="form-control" id="InputCategory" name="product_category">
                        <?php foreach ($adverts as $advert) { ?>
                        <option
                            value="<?php echo $advert['ad_id']; ?>">
                            <?php echo $advert['author']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success" name="product_submit">Enregistrer l'article</button>
            </form>
        </div>

    </div>
</div>


<!-- <div class="row">
    <div class="col-12">
        <form action="process.php" method="POST">
            <div class="form-group">
                <label for="InputName">Nom de votre bien</label>
                <input type="text" class="form-control" id="InputName" placeholder="Nom de votre article"
                    name="product_name" required>
            </div>
            <div class="form-group">
                <label for="InputDescription">Description du bien</label>
                <textarea class="form-control" id="InputDescription" rows="3" name="product_description"
                    required></textarea>
            </div>
            <div class="form-group">
                <label for="InputPrice">Prix du bien</label>
                <input type="number" max="999999" class="form-control" id="InputPrice"
                    placeholder="Prix de votre article en €" name="product_price" required>
            </div>
            <div class="form-group">
                <label for="InputPrice">Ville où le bien est situé</label>
                <input type="text" class="form-control" id="InputPrice" placeholder="Ville où l'article est situé"
                    name="product_city" required>
            </div>
            <div class="form-group">
                <label for="InputCategory">Catégorie du bien</label>
                <select class="form-control" id="InputCategory" name="product_category">
                   // <?php foreach ($categories as $category) { ?>
<option
    value="<?php echo $category['categories_id']; ?>">
    <?php echo $category['categories_name']; ?>
</option>
<?php } ?>
</select>

</div>
</div> -->


<?php
require 'includes/footer.php';
