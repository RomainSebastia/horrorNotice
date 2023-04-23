<?php include "app/views/layouts/head.php"; ?>
<?php include "app/views/layouts/header.php"; ?>

<main id="pageInscription">
    <!-- Section contenant le formulaire d'inscription -->
    <section>

        <!-- Formulaire d'inscription -->
        <form action="index.php?action=register" method="POST">
            <!-- Titre du formulaire -->
            <h2 id="titreRegister">S'inscrire</h2>
            <!-- Champ de saisie du nom -->
            <div>
                <label for="name">Nom :</label>
                <input type="text" class="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
            </div>
            <!-- Champ de saisie de l'email -->
            <div>
                <label for="email">Email :</label>
                <input type="email" class="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
            </div>
            <!-- Champ de saisie du mot de passe -->
            <div>
                <label for="password">Mot de passe :</label>
                <input type="password" class="password" name="password" required>
            </div>
            <!-- Checkbox pour accepter le RGPD -->
            <div>
                <label>
                    <input type="checkbox" name="rgpd" id="rgpd" value="rgpd">
                    En créant votre compte, vous acceptez l'intégralité de notre <a href="index.php?action=rgpd">Rgpd</a>.
                </label>
            </div>
            <!-- Lien pour se connecter si déjà inscrit -->

            <div id="pageLogin">
                <p>Déjà inscrit ?
                    <a href="index.php?action=login" id="hoverPageConnect">Connectez-vous</a>
                </p>
            </div>
            <!-- Bouton pour soumettre le formulaire -->

            <button type="submit">S'inscrire</button>

        </form>


        <!-- image inscription après formulaire -->

        <img src="public/images/halloween.jpg" alt="Photo Contact" id="imgRegister">



    </section>
</main>

<?php include_once "app/views/layouts/footer.php"; ?>