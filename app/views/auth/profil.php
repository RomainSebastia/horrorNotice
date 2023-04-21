<?php $pageName = 'Mon compte'; ?>

<?php include ("app/views/layouts/head.php") ?>
<?php include ("app/views/layouts/header.php") ?>

<main id="profil">
    <section id="sectionProfil">
        <h2 id="nameTitle">Bienvenue <?= $username ?></h2>
        <img src="<?= $user['profile_picture_url'] ?>" alt="Photo de profil de <?= $username ?>">

        <!-- Formulaire pour modifier le nom -->
        <form id="nameForm" method="POST" action="?action=profil">
            <input type="hidden" name="user_id" value="<?= $userId ?>">
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" value="<?= $username ?>">
            <button type="submit">Mettre à jour le nom</button>
        </form>

        <!-- Formulaire pour modifier l'email -->
        <form id="emailForm" method="POST" action="?action=profil">
            <input type="hidden" name="user_id" value="<?= $userId ?>">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="<?= $user['email'] ?>">
            <button type="submit">Mettre à jour l'email</button>
        </form>

        <!-- Formulaire pour modifier le mot de passe -->
        <form id="passwordForm" method="POST" action="?action=profil">
            <input type="hidden" name="user_id" value="<?= $userId ?>">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password">
            <button type="submit">Mettre à jour le mot de passe</button>
        </form>

        <!-- Formulaire pour modifier la photo de profil -->
        <form id="pictureForm" method="POST" action="?action=profil" enctype="multipart/form-data">
            <input type="file" name="profile_picture" accept="image/*">
            <button type="submit">Mettre à jour la photo</button>
        </form>

        <form id="deleteCompte" method="POST" action="?action=deleteUser">
            <input type="hidden" name="user_id" value="<?= $userId ?>">
            <button type="submit">Supprimer mon compte</button>
        </form>

    </section>
</main>

<?php include "app/views/layouts/footer.php"; ?>