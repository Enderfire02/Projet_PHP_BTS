<?php

// récupération dans la BD et ajout au panier
if (isset($_GET['id'])) {
    $assos = array(
        'id' => htmlspecialchars($_GET['id'])
    );
   list($retour, $nmb) = $bd->BDqueryAssos("SELECT ID_Art FROM projet_php.articles WHERE ID_Art = :id", $assos);
    // var_dump($retour);
    if (empty($retour)) {
         echo "produit introuvable";
    }
    if (isset($_SESSION['panier'][$retour[0]['ID_Art']])) {
        $_SESSION['panier'][$retour[0]['ID_Art']]++;
        $assos = array(
            'id' => htmlspecialchars($_GET['id'])
        );
        list($retour, $nmb) = $bd->BDqueryAssos("SELECT * FROM projet_php.composee WHERE ID_Art = :id AND ID_Comm = 1", $assos);
        if (empty($retour)){
            list($retour, $nmb) = $bd->BDqueryAssos("INSERT INTO projet_php.composee ID_Art VALUES :id", $assos);
        }else{
            list($retour, $nmb) = $bd->BDqueryAssos("UPDATE projet_php.composee SET quantite = quantite + 1 WHERE ID_Art = :id", $assos);
        }


        
    } else {
        $_SESSION['panier'][$retour[0]['ID_Art']] = 1;
    }
} else {
    echo "vous n'avez pas sélectionné de produit";
}
?>
<main>
    <p class="fw-bold">Votre article a ajouté au panier</p>
    <div>
        <a class="btn btn-primary" href="?page=productlist">Retour à accueil</a>
        <a class="btn btn-primary" href="?page=checkout">voir le panier</a>
    </div>
</main>