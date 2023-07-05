<?php
$_SESSION['erreur']['login'] = false;

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $identifiant = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        
        $assos = array('identifiant' => $identifiant);
        list($retour, $nmb) = $bd->BDqueryAssos("SELECT * FROM projet_php.client WHERE Email_Cli = :identifiant ", $assos);
      
        if ($nmb === 1) {
            if ($password === $retour['0']['Mdp_Cli']) {
                $_SESSION['user'] = $retour['0']['ID_Cli'];
                header("Location: ?page=productlist");
                $_SESSION['erreur']['login'] = false; 
                exit;
            } else {
                $_SESSION['erreur']['login'] = "Identifiant ou mot de passe incorrect.";
            }
        } else {
            $_SESSION['erreur']['login'] = "Identifiant ou mot de passe incorrect.";
        }
    } else {
    }
}
?>


<main class="loginMain">
    <form class="login" method="POST">
        <h2>Se connecter</h2>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"  >adresse mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"<?= $_SESSION['erreur']['login'] !== false ? 'is-invalid' : '' ?> name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" >Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1"  <?= $_SESSION['erreur']['login'] !== false ? 'is-invalid' : '' ?> name="password">
        </div>
        <div class="container">
                    <input class="btn btn-primary" type="submit" name="submit">
                    <a href="?page=newAcc" class="btn btn-primary">nouveau compte</a>
        </div>
    </form>
</main>
