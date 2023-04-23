<?php require_once ("app/views/layouts/head.php"); ?>
<?php include_once ("app/views/layouts/header.php"); ?>


<!-- afficher les films aimés par l'utilisateur -->
<main id="favoris">
    <h2>Films aimés de <?= $username ?> </h2>
    <section class="movieCardsHome">
        <?php foreach ($likedMovies as $movie) : ?>
            <article class="movieCardHome">
                <a href="index.php?action=details&id=<?= htmlspecialchars($movie['id']) ?>">
              
                <div class="movieCardImgHome">
                    <img src="<?= htmlspecialchars($movie['image_url']) ?>" alt="<?= htmlspecialchars($movie['title'] . ' - affiche du film') ?>">
                </div>
                <h2><?= $movie['title'] ?></h2>
                <p><strong>Description:</strong> <span><?= htmlspecialchars(substr($movie['description'], 0, 20)) ?>...</span><span class="fullDescription"><?= htmlspecialchars($movie['description']) ?></span></p>
                <!-- inclure un lien vers la page de détails du film -->
                <button class="buttonMovie">Voir plus</button>
                </a>
            </article>
         
        <?php endforeach; ?>
    </section>
</main>


<?php include_once "app/views/layouts/footer.php"; ?>