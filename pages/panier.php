<main>
    <?php
$articles = [];

$statement = "select * from "
    ?>
    <h1>Vos articles</h1>
    <table class="table tablePannier">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantité</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
            <tr>
                <th scope="row"><img src=""<?php echo $article['id'] ?>" alt="image panier"></th>
                <th><?php echo $article['nom'] ?></th>
                <th><?php echo $article['description'] ?></th>
                <th><?php echo $article['prix'] ?> €</th>
                <th><?php echo $_SESSION['panier'][$article['id']] ?>
                    <a class="btn btn-outline-success btn-sm" href="/tp/projet-Site-php-sem1/?page=addpanier&id=<?php echo $article['id'] ?>">+</a>
                </th>
                <th>
                    <a class="btn btn-secondary btn-sm" href="/tp/projet-Site-php-sem1/?page=removepanier&del=<?php echo $article['id'] ?>">supprimer du pannier</a>
                </th>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <ul class="list-group">
        <li class="list-group-item">Nmb article : <?php echo array_sum($_SESSION['panier']); ?></li>
        <li class="list-group-item">Prix total : <?php echo $PTotal ?> €</li>
        <button type="button" class="btn btn-primary btn-sm">Valider les articles</button>
    </ul>
</main>