<main>


    <article class="articleCentrage">

        <div class="formualireDeCreation">



            <form class="row g-3" method="post">
                <h1 style="text-align: center;">Modifier votre compte</h1>

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




                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input " type="checkbox" value="" id="invalidCheck3" name="Conditions" required>

                        <label class="form-check-label" for="invalidCheck3">Accepter les termes et conditions</label>
                    </div>
                </div>

                <div class="col-9">
                    <button type="button" class="btn btn-primary">Primary</button>
                </div>




            </form>
        </div>
    </article>
    </div>
</main>