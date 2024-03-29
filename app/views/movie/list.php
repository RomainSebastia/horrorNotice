<?php require_once "app/views/layouts/head.php"; ?>
<?php include_once "app/views/layouts/header.php"; ?>

<main class="listMovie">
    <h2>Nos Films</h2>
    <!-- liste des films affiché -->
    
    <section class="movieCardsList">
        <?php foreach ($movies as $movie) : ?>

            <article class="movieCardList">
                <a href="index.php?action=details&id=<?= ($movie['id']) ?>">
                    <div class="movieCardImgList">
                        <img src="<?= ($movie['image_url']) ?>" alt="<?= ($movie['title'] . ' - affiche du film') ?>">
                    </div>
                    <div class="movieCardListContent">
                        <h3><?= ($movie['title']) ?></h3>
                        <p><strong>Date de sortie:</strong> <time><?= ($movie['release_date']) ?></time></p>
                        <p><strong>Durée:</strong> <time><?= ($movie['duration']) ?></time></p>
                        <p><strong>Description:</strong><span><?= (substr($movie['description'], 0, 100)) ?>...</span><span class="fullDescription"><?= ($movie['description']) ?></span></p>

                        <div class="listButtonLike">
                            <button class="buttonDescriptionMovie">Voir plus</button>
                            <!-- vérifie si l'utilisateur est connecté et si le film n'a pas déjà été liké. -->

                            <?php if (isset($_SESSION['user']) && !$movie['like_by_user']) : ?>
                                <form action="index.php?action=likeMovie" method="POST">
                                    <input type="hidden" name="movie_id" value="<?= ($movie['id']) ?>">
                                    <button type="submit" name="like" class="buttonLike"><i class="fas fa-thumbs-up"></i></button>
                                </form>
                                <!--  vérifie si l'utilisateur est connecté et si le film a été aimé par l'utilisateur -->
                            <?php elseif (isset($_SESSION['user']) && $movie['like_by_user']) : ?>
                                <form action="index.php?action=dislikeMovie" method="POST">
                                    <input type="hidden" name="movie_id" value="<?= ($movie['id']) ?>">
                                    <button type="submit" name="dislike" class="buttonDislike"><i class="fas fa-star"></i></button>
                                </form>
                            <?php endif; ?>
                        </div>

                        <!-- Ajouter des boutons pour modifier et supprimer le film si l'utilisateur est administrateur -->
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['is_admin'] === 1) : ?>

                            <div class="buttonAdmin">

                                <form action="index.php?action=update" method="POST">
                                    <input type="hidden" name="movie_id" value="<?=($movie['id']) ?>">
                                    <button type="submit" class="buttonUpdate">Modifier</button>
                                </form>

                                <form action="index.php?action=deleteMovie" method="POST">
                                    <input type="hidden" name="movie_id" value="<?= ($movie['id']) ?>">
                                    <button type="submit" class="buttonDelete">Supprimer</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </a>
            </article>
        <?php endforeach; ?>
    </section>
</main>

<?php include_once "app/views/layouts/footer.php"; ?>