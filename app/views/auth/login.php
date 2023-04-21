<?php $pageName = "Connexion"; ?>
<?php include "app/views/layouts/head.php" ?>
<?php include "app/views/layouts/header.php" ?>
<main id="pageConnection">
    <section>

        <form action="index.php?action=login" method="POST">
            <h2 id="titreConnection">Connexion</h2>

            <div>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div id="pageLogin">
                <p>Vous n'etes pas inscrit ?
                    <a href="index.php?action=register" id="hoverPageConnect">Inscrivez-vous</a>
                </p>
            </div>
            <button type="submit">Se connecter</button>
        </form>
        <!-- image connexion après le formulaire -->
        <img src="public/images/dog.jpg" alt="Photo Login" id="imgLogin">
    </section>
</main>

<?php include "app/views/layouts/footer.php"; ?>