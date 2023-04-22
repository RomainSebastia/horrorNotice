<?php include("app/views/layouts/head.php") ?>
<?php include("app/views/layouts/header.php") ?>

<!-- afficher le titre de la page -->


<!-- afficher les films aimés par l'utilisateur -->
<main id="favoris">
    <h2>Films aimés de <?= $username ?> </h2>
    <section class="movieCardsHome">
        <?php foreach ($likedMovies as $movie) : ?>
            <article class="movieCardHome">
                <a href="/horrorNotice/index.php?action=details&id=<?= htmlspecialchars($movie['id']) ?>">
              
                <figure class="movieCardImgHome">
                    <img src="<?= htmlspecialchars($movie['image_url']) ?>" alt="<?= htmlspecialchars($movie['title'] . ' - affiche du film') ?>">
                </figure>
                <h2><?= $movie['title'] ?></h2>
                <p><strong>Description:</strong> <span id="short-description"><?= htmlspecialchars(substr($movie['description'], 0, 20)) ?>...</span><span class="fullDescription"><?= htmlspecialchars($movie['description']) ?></span></p>
                <!-- inclure un lien vers la page de détails du film -->
                <button class="buttonMovie">Voir plus</button>

            </article>
            </a>
        <?php endforeach; ?>
    </section>
</main>


<?php include "app/views/layouts/footer.php"; ?>