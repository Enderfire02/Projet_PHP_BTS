<?php
//si session pas initialisé, revoie vers menu principal
if (!isset($_SESSION['user'])){
    header("Location: ?page=productlist");
};

// setup cli 
$cliData = [];

// fetching client data
$assos = array(
    'identifiant' => $_SESSION['user']
);
//requète SQL permettant de récupérer les informations client
list($retour, $nmb) = $bd->BDqueryAssos("SELECT * FROM projet_php.client WHERE ID_Cli = :identifiant ", $assos);
//methode modification champs
if (isset($_POST['enrengistrer_modifs'])) {
    $assos = array(
        'id' => $_SESSION['user'],
        'prenom' => htmlspecialchars($_POST['Prenom']),
        'nom' => htmlspecialchars($_POST['Nom']),
        'Email' => htmlspecialchars($_POST['Email']),
        'mdp' => htmlspecialchars($_POST['MotDePasse'])
    );
    list($retourModification, $nmbModification) = $bd->BDqueryAssos("UPDATE projet_php.client SET Prenom_Cli = :prenom, Nom_Cli = :nom, Email_Cli = :Email, Mdp_Cli = :mdp WHERE ID_Cli = :id", $assos);
    header("Location: ?page=productlist");
}
if (isset($_POST['Supprimer_compte'])) {
    $assos = array(
        'id' => $_SESSION['user']
    );
    list($retourModification, $nmbModification) = $bd->BDqueryAssos("DELETE FROM projet_php.client WHERE ID_Cli = :id", $assos);
    header("Location: ?page=login");
    $notification->notificationRouge("Compte supprimé");
    exit;
}
?>


<main class="container">


    <article class="articleCentrage">

        <div class="formualireDeCreation">



            <form class="row g-3" method="post">
                <h1 style="text-align: center;">Modifier votre compte</h1>

                <div>
                    <h6>information personnelles :</h6>
                </div>


                <div class="col-md-6">
                    <label for="validationServerPrenom" class="form-label">Prenom</label>
                    <input type="text" class="form-control  " id="validationServerPrenom" name="Prenom" value="<?= $retour['0']['Prenom_Cli']?>">
                </div>

                <!-- is-valid -->

                <div class="col-md-6">
                    <label for="validationServerNom" class="form-label">Nom</label>
                    <input type="text" class="form-control " id="validationServerNom" name="Nom" value="<?= $retour['0']['Nom_Cli']?>" required>

                </div>

                <div class="col-md-6">
                    <label for="validationServerEmail" class="form-label">Mail</label>
                    <input type="email" class="form-control " id="validationServerEmail" name="Email" value="<?= $retour['0']['Email_Cli']?>" required>

                </div>

                <div class="col-md-6">
                    <label for="validationServerMotDePasse" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control  " id="validationServerMotDePasse" name="MotDePasse" value="<?= $retour['0']['Mdp_Cli']?>" required>

                </div>
                <div class="col-9">
                    <button type="submit" class="btn btn-primary"  name="enrengistrer_modifs"><i class="fa fa-wrench" aria-hidden="true"></i> enregistrer les modifications </button>
                    <button type="submit" class="btn btn-danger" name="Supprimer_compte"><i class="fas fa-exclamation-triangle"></i> Supprimer mon compte</button>
                </div>




            </form>
        </div>
    </article>
    </div>
</main>