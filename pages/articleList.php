<main>
    </div>
    <?php
    $requete = "SELECT * FROM projet_php.articles ";
    list($retour, $nmb) = $bd->BDquery($requete);
    ?>

    <?php
    foreach ($retour as $affichage) :
    ?>
        <div class="card" style="width: 18rem;">
            <img src="./asset/img/<?= $affichage['Img_Art'] ?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= $affichage['Nom_Art'] ?></h5>
                <p class="card-text"><?= $affichage['Desc_Art'] ?></p>
            </div>

            <h3 class="prix"><?= $affichage['Prix_Art'] ?> €</h3>

            <div>
                <a href="?page=addProduct&id=<?php echo $affichage['ID_Art'] ?>" class="card-link">Ajouter au panier</a>
            </div>
        </div>
    <?php
    endforeach;
    ?>
</main>

