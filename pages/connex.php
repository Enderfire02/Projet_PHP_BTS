<?php
$_SESSION['erreur']['login'] = false;

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $identifiant = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $assos = array('identifiant' => $identifiant);
        list($retour, $nmb) = $bd->BDqueryAssos("SELECT * FROM public.client WHERE mail_cli = :identifiant ", $assos);

        // var_dump($retour);
        // var_dump($nmb);

        if ($nmb === 1) {
            if (password_verify($password, $retour['0']['password_cli'])) {
                $_SESSION['user'] = $retour['0']['id_cli'];
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
    <form class="login">
        <h2>Se connecter</h2>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">adresse mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</main>