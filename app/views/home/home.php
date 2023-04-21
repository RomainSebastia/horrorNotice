<?php require_once("app/views/layouts/head.php") ?>
<?php include_once("app/views/layouts/header.php") ?>

<main id="home">
    <div id="mainTitreImg">
        <h1>Horror Notice Le site pour l'horreur</h1>
        <!-- petite image a coté du titre -->
        <img src="public/images/scream.png" alt="scream">
    </div>


    <h2>Nos 3 derniers films ajouté</h2>

    <section class="movie-cards">
        <?php foreach ($lastMovies as $movie) : ?>
            <article class="movie-card">
                <a href="/horrorNotice/index.php?action=details&id=<?= htmlspecialchars($movie['id']) ?>">
                    <figure class="movie-card-image">
                        <img src="<?= htmlspecialchars($movie['image_url']) ?>" alt="<?= htmlspecialchars($movie['title'] . ' - affiche du film') ?>">
                    </figure>
                    <div class="movie-card-content">
                        <h3><?= htmlspecialchars($movie['title']) ?></h3>
                        <p><strong>Date de sortie:</strong> <time><?= htmlspecialchars($movie['release_date']) ?></time></p>
                        <p><strong>Acteurs/Actrices:</strong> <?= htmlspecialchars($movie['actors_actresses']) ?></p>
                        <p><strong>Genre:</strong> <?= htmlspecialchars($movie['genre']) ?></p>
                        <p><strong>Durée:</strong> <time><?= htmlspecialchars($movie['duration']) ?></time></p>
                        <p><strong>Description:</strong> <span id="short-description"><?= htmlspecialchars(substr($movie['description'], 0, 20)) ?>...</span><span id="full-description" style="display:none;"><?= htmlspecialchars($movie['description']) ?></span></p>

                        <button class="button-voir-plus">Voir plus</button>
                    </div>
                </a>
            </article>
        <?php endforeach; ?>
    </section>

    <h2>Nos 3 film les plus appréciés</h2>

    <section class="movie-cards">
        <?php foreach ($likedMovies as $movie) : ?>
            <article class="movie-card">
                <a href="/horrorNotice/index.php?action=details&id=<?= htmlspecialchars($movie['id']) ?>">
                    <figure class="movie-card-image">
                        <img src="<?= htmlspecialchars($movie['image_url']) ?>" alt="<?= htmlspecialchars($movie['title'] . ' - affiche du film') ?>">
                    </figure>
                    <div class="movie-card-content">
                        <h3><?= htmlspecialchars($movie['title']) ?></h3>
                        <p><strong>Date de sortie:</strong> <time><?= htmlspecialchars($movie['release_date']) ?></time></p>
                        <p><strong>Acteurs/Actrices:</strong> <?= htmlspecialchars($movie['actors_actresses']) ?></p>
                        <p><strong>Genre:</strong> <?= htmlspecialchars($movie['genre']) ?></p>
                        <p><strong>Durée:</strong> <time><?= htmlspecialchars($movie['duration']) ?></time></p>
                        <p><strong>Description:</strong> <span id="short-description"><?= htmlspecialchars(substr($movie['description'], 0, 20)) ?>...</span><span id="full-description" style="display:none;"><?= htmlspecialchars($movie['description']) ?></span></p>

                        <button class="button-voir-plus">Voir plus</button>
                    </div>
                </a>
            </article>
        <?php endforeach; ?>
    </section>





</main>





<?php require_once "app/views/layouts/footer.php"; ?>