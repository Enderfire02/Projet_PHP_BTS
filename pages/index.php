<?php
require_once '../Database/connect.php';
$bd = new Bd();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css"


</head>
<body>

<div class="nav">
    <input type="checkbox" id="nav-check">
    <div class="nav-header">
        <div class="nav-title">
            OC'Design
        </div>
    </div>

    <div class="nav-links">
        <a href="" target="_blank">Mon Panier</a>
        <a href="./gestCompte.php" target="_blank">Mon Profil</a>


    </div>
</div>
<div class="img">

</div>
<?php
$requete = "SELECT * FROM projet_php.articles ";
list($retour, $nmb) = $bd->BDquery($requete);
?>
<main>
    <?php
        foreach($retour as $affichage):
    ?>
    <div class="card" style="width: 18rem;">
        <img src="../asset/img/<?= $affichage['Img_Art']?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?= $affichage['Nom_Art'] ?></h5>
            <p class="card-text"><?= $affichage['Desc_Art'] ?></p>
        </div>

         <h3 class="prix"><?= $affichage['Prix_Art'] ?> €</h3>

        <div>
            <a href="#" class="card-link">Ajouter au panier</a>
        </div>
    </div>
    <?php
        endforeach;
    ?>
</main>
<footer>
    <p>copyright 2022 Cyrus Valette</p>
</footer>
</body>
</html>