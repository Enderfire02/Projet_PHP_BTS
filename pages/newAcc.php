<?php
//require ('./pages/index.php');

// on verifie que l'utilisateur a bien cliquez sur submit
$_SESSION['erreur']['register'] = false;

if (isset($_POST['submit'])) {

    // si le submit est activé alors on verifie si tous a bien été renseigné 

    if ( isset($_POST['Prenom']) && isset($_POST['Nom']) && isset($_POST['Mail']) && isset($_POST['MotDePasse']) && isset($_POST['ReMotDePasse'])) {


        if ($_POST['MotDePasse'] === $_POST['ReMotDePasse']) {
            var_dump($_POST);

            // Enregistrement des données dans la  base de données

            $_SESSION['register']['prenom'] = htmlspecialchars($_POST['Prenom']);
            $_SESSION['register']['nom'] = htmlspecialchars($_POST['Nom']);
            $_SESSION['register']['Mail'] = htmlspecialchars($_POST['Mail']);
            $_SESSION['register']['password'] = htmlspecialchars($_POST['MotDePasse']);

            // on crée un tableau

            $assoscli = array(
                'prenom' => $_SESSION['register']['prenom'],
                'nom' => $_SESSION['register']['nom'],
                'Mail' => $_SESSION['register']['Mail'],
                'mdp' => $_SESSION['register']['password']
            );


            $insertion = "INSERT INTO projet_php.client ( `id_cli`,`Prenom_Cli`, `Nom_Cli`, `Email_Cli`, `Mdp_Cli`) VALUES ( NULL, :prenom, :nom, :Mail, :mdp)";
            // on execute notre requete

            list($retour, $nmb) = $bd->BDqueryAssos($insertion, $assoscli);
            // on verifie si tous fonctione correctement

            $_SESSION['erreur']['register'] = "success";
            header("Location: ?page=login");
        } else {
            $_SESSION['erreur']['register'] = "Error : le mot de passe est incorrect :( :(";
        }
    } else {

        $_SESSION['erreur']['register'] = "Error : Veillez remplir tous les champs !!!";
    }
}

// on affiche le message a l'utilisateur




?>


<main class="container">


    <article class="articleCentrage">

        <div class="formualireDeCreation">



            <form class="row g-3" method="post">
                <h1 style="text-align: center;">Créez votre compte</h1>

                <div>
                    <h6>information personnelles :</h6>
                </div>


                <div class="col-md-6">
                    <label for="validationServerPrenom" class="form-label">Prenom</label>
                    <input type="text" class="form-control  " id="validationServerPrenom" name="Prenom" value="<?php if (isset($_SESSION['register']['prenom'])) {
                                                                                                                    echo $_SESSION['register']['prenom'];
                                                                                                                } ?>" required>

                </div>

                <!-- is-valid -->

                <div class="col-md-6">
                    <label for="validationServerNom" class="form-label">Nom</label>
                    <input type="text" class="form-control " id="validationServerNom" name="Nom" value="<?php if (isset($_SESSION['register']['nom'])) {
                                                                                                            echo $_SESSION['register']['nom'];
                                                                                                        } ?>" required>

                </div>

                <div class="col-md-6">
                    <label for="validationServerEmail" class="form-label">Mail</label>
                    <input type="email" class="form-control " id="validationServerEmail" name="Mail" value="<?php if (isset($_SESSION['register']['Mail'])) {
                                                                                                                echo $_SESSION['register']['Mail'];
                                                                                                            } ?>" required>

                </div>

                <div class="col-md-6">
                    <label for="validationServerMotDePasse" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control  " id="validationServerMotDePasse" name="MotDePasse" value="<?php if (isset($_SESSION['register']['password'])) {
                                                                                                                                echo $_SESSION['register']['password'];
                                                                                                                            } ?>" required>

                </div>
                <div class="col-md-6">
                    <label for="validationServerMotDePasseConfirmer" class="form-label">Confirmer le Mot de passe</label>
                    <input type="password" class="form-control " id="validationServerMotDePasseConfirmer" name="ReMotDePasse" value="<?php if (isset($_SESSION['register']['password'])) {
                                                                                                                                            echo $_SESSION['register']['password'];
                                                                                                                                        } ?>" required>

                </div>
                <div class="col-9">
                    <input class="btn btn-primary" type="submit" name="submit">
                </div>

            </form>
        </div>
    </article>
    </div>
</main>