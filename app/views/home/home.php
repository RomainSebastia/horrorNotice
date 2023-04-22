<?php include ("app/views/layouts/head.php") ?>
<?php include ("app/views/layouts/header.php") ?>

<main id="home">
    <div id="mainTitreImg">
        <h1>Horror Notice Le site pour l'horreur</h1>
        <!-- petite image a coté du titre -->
        <img src="public/images/scream.png" alt="scream">
    </div>

    <h2>Nos 3 derniers films ajouté</h2>
    <!-- affichage des 3 derniers films -->

    <section class="movieCardsHome">
        <?php foreach ($lastMovies as $movie) : ?>
            <article class="movieCardHome">
                <a href="/horrorNotice/index.php?action=details&id=<?= htmlspecialchars($movie['id']) ?>">
                    <figure class="movieCardImgHome">
                        <img src="<?= htmlspecialchars($movie['image_url']) ?>" alt="<?= htmlspecialchars($movie['title'] . ' - affiche du film') ?>">
                    </figure>
                    <div class="movieCardContent">
                        <h3><?= htmlspecialchars($movie['title']) ?></h3>
                        <p><strong>Date de sortie:</strong> <time><?= htmlspecialchars($movie['release_date']) ?></time></p>
                        <p><strong>Acteurs/Actrices:</strong> <?= htmlspecialchars($movie['actors_actresses']) ?></p>
                        <p><strong>Genre:</strong> <?= htmlspecialchars($movie['genre']) ?></p>
                        <p><strong>Durée:</strong> <time><?= htmlspecialchars($movie['duration']) ?></time></p>
                        <p><strong>Description:</strong> <span id="short-description"><?= htmlspecialchars(substr($movie['description'], 0, 20)) ?>...</span><span class="fullDescription"><?= htmlspecialchars($movie['description']) ?></span></p>

                        <button class="buttonMovie">Voir plus</button>
                    </div>
                </a>
            </article>
        <?php endforeach; ?>
    </section>

    <h2>Nos 3 film les plus appréciés</h2>

    <!-- affichage des 3 films les plus aimé -->

    <section class="movieCardsHome">
        <?php foreach ($likedMovies as $movie) : ?>
            <article class="movieCardHome">
                <a href="/horrorNotice/index.php?action=details&id=<?= htmlspecialchars($movie['id']) ?>">
                    <figure class="movieCardImgHome">
                        <img src="<?= htmlspecialchars($movie['image_url']) ?>" alt="<?= htmlspecialchars($movie['title'] . ' - affiche du film') ?>">
                    </figure>
                    <div class="movieCardContent">
                        <h3><?= htmlspecialchars($movie['title']) ?></h3>
                        <p><strong>Date de sortie:</strong> <time><?= htmlspecialchars($movie['release_date']) ?></time></p>
                        <p><strong>Acteurs/Actrices:</strong> <?= htmlspecialchars($movie['actors_actresses']) ?></p>
                        <p><strong>Genre:</strong> <?= htmlspecialchars($movie['genre']) ?></p>
                        <p><strong>Durée:</strong> <time><?= htmlspecialchars($movie['duration']) ?></time></p>
                        <p><strong>Description:</strong> <span id="short-description"><?= htmlspecialchars(substr($movie['description'], 0, 20)) ?>...</span><span class="fullDescription"><?= htmlspecialchars($movie['description']) ?></span></p>

                        <button class="buttonMovie">Voir plus</button>
                    </div>
                </a>
            </article>
        <?php endforeach; ?>
    </section>






</main>





<?php include ("app/views/layouts/footer.php"); ?>