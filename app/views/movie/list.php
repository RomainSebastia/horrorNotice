<?php $pageName = 'Liste des films'; ?>

<?php require_once("app/views/layouts/head.php") ?>
<?php include_once("app/views/layouts/header.php") ?>

<main id="listMovie">
 

    <section class="movie-cards">
        <?php foreach ($movies as $movie) : ?>
            <article class="movie-card">
                <a href="/horrorNotice/index.php?action=details&id=<?= htmlspecialchars($movie['id']) ?>">
                    <div class="movie-card-image">
                        <img src="<?= htmlspecialchars($movie['image_url']) ?>" alt="<?= htmlspecialchars($movie['title'] . ' - affiche du film') ?>">
                    </div>
                    <div class="movie-card-content">
                        <h3><?= htmlspecialchars($movie['title']) ?></h3>
                        <p><strong>Date de sortie:</strong> <time><?= htmlspecialchars($movie['release_date']) ?></time></p>
                        <p><strong>Acteurs/Actrices:</strong> <?= htmlspecialchars($movie['actors_actresses']) ?></p>
                        <p><strong>Genre:</strong> <?= htmlspecialchars($movie['genre']) ?></p>
                        <p><strong>Durée:</strong> <time><?= htmlspecialchars($movie['duration']) ?></time></p>
                        <p><strong>Description:</strong> <span id="short-description"><?= htmlspecialchars(substr($movie['description'], 0, 20)) ?>...</span><span id="full-description" style="display:none;"><?= htmlspecialchars($movie['description']) ?></span></p>

                        <div class="list-button">
                            <button class="button-voir-plus">Voir plus</button>
                            <?php if (!$movie['like_by_user']) : ?>
                            <form action="index.php?action=likeMovie" method="POST">
                                <input type="hidden" name="movie_id" value="<?= htmlspecialchars($movie['id']) ?>">
                                <button type="submit" name="like" class="button-like"><i class="fas fa-thumbs-up"></i></button>
                            </form>
                            <?php elseif ($movie['like_by_user']) : ?>
                            <form action="index.php?action=dislikeMovie" method="POST">
                                <input type="hidden" name="movie_id" value="<?= htmlspecialchars($movie['id']) ?>">
                                <button type="submit" name="dislike" class="button-dislike"><i class="fas fa-star"></i></button>
                            </form>
                            <?php endif; ?>
                        </div>

                        <!-- Ajouter des boutons pour modifier et supprimer le film si l'utilisateur est administrateur -->
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['is_admin'] === 1) : ?>
                            <form action="index.php?action=update" method="POST">
                                <input type="hidden" name="movie_id" value="<?= htmlspecialchars($movie['id']) ?>">
                                <button type="submit" class="button-edit">Modifier</button>
                            </form>

                            <form action="index.php?action=deleteMovie" method="POST">
                            <input type="hidden" name="movie_id" value="<?= htmlspecialchars($movie['id']) ?>">
                            <button type="submit" class="button-delete">Supprimer</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </a>
            </article>
        <?php endforeach; ?>
    </section>
</main>

<?php require_once "app/views/layouts/footer.php"; ?>
