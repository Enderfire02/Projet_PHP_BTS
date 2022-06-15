<!-- suppression de l'article -->
<?php 
if(isset($_GET['del'])){
    unset($_SESSION['panier'][$_GET['del']]);
    $assos = array(
        'id' => htmlspecialchars($_GET['del'])
    );
   list($retour, $nmb) = $bd->BDqueryAssos("DELETE FROM projet_php.articles WHERE ID_Art = :id", $assos);
    }
?>
<main>
    <div>
        <p class="fw-bold">Votre article a été supprimé du panier</p>
        <div>
            <a class="btn btn-primary" href="?page=productlist">Retour accueil</a>
            <a class="btn btn-primary" href="?page=checkout">Retour panier</a>
        </div>
    </div>
</main>