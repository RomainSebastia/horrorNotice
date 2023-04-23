<?php include "app/views/layouts/head.php" ?>
<?php include "app/views/layouts/header.php" ?>
<main id="pageConnection">
    <section>

        <form action="index.php?action=login" method="POST">
            <h2 id="titreConnection">Connexion</h2>
            <!-- email -->

            <div>
                <label for="email">Email :</label>
                <input type="email" class="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>
            <!-- mot de passe -->
            <div>
                <label for="password">Mot de passe :</label>
                <input type="password" class="password" name="password" required value="<?= htmlspecialchars($_POST['password'] ?? '') ?>">
            </div>
            <!-- vers la page s'inscrire -->
            <div id="pageLogin">
                <p>Vous n'êtes pas inscrit ?
                    <a href="index.php?action=register" id="hoverPageConnect" title="pageRegister">Inscrivez-vous</a>
                </p>
            </div>
            <button type="submit">Se connecter</button>
        </form>
        <!-- image connexion après le formulaire -->
        <img src="public/images/dog.jpg" alt="Photo Login" id="imgLogin">
    </section>
</main>


<?php include_once "app/views/layouts/footer.php"; ?>