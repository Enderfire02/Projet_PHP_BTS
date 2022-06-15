<main class="container">
    <?php
    $articles = [];
    

    // recupère l'id du produit
    $ids = array_keys($_SESSION['panier']);
    var_dump($_SESSION['panier'], $ids);
    $assos = array(
        'identifiant' => $_SESSION['user']
    );
    // si le tableau des id est vide  j'envoie un tableau dans $articles
    if (empty($ids)) {
        
        $articles = array();
    } else {
        list($articles, $nmb) = $bd->BDqueryAssos('SELECT * FROM projet_php.realise, projet_php.commande, projet_php.composee, projet_php.articles WHERE realise.ID_Comm = commande.ID_Comm AND commande.ID_Comm = composee.ID_Comm AND composee.ID_Art = articles.ID_Art AND realise.ID_Cli = :identifiant', $assos); 
        var_dump($assos);  
    }

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
        
            <?php 
            $i = 1;
            foreach ($articles as $article) : ?>
                <tr>
                    <th scope="row"><img src="./asset/img/<?php echo $article['Img_Art']?>" alt="image panier" class="imgPanier"></th>
                    <th><?php echo $article['Nom_Art'] ?></th>
                    <th><?php echo $article['Desc_Art'] ?></th>
                    <th><?php echo $article['Prix_Art'] ?> €</th>
                    <th><?php echo $_SESSION['panier'][$i] ?>
                        <a class="btn btn-outline-success btn-sm" href="?page=addProduct&id=<?php echo $article['ID_Art'] ?>">+</a>
                    </th>
                    <th>
                        <a class="btn btn-secondary btn-sm" href="?page=removeProduct&del=<?php echo $article['ID_Art'] ?>">supprimer du pannier</a>
                    </th>
                </tr>
            <?php $i++; endforeach ?>
        </tbody>
    </table>
    <ul class="list-group">
        <li class="list-group-item">Nmb article : <?php echo array_sum($_SESSION['panier']); ?></li>
        <button type="button" class="btn btn-primary btn-sm">Valider les articles</button>
    </ul>
</main>