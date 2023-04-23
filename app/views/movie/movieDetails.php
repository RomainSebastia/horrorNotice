 <?php require_once ("app/views/layouts/head.php"); ?>
<?php include_once ("app/views/layouts/header.php"); ?>

<main id="movieDetails">
    <div class="movieDetailsContainer">
        <h2 class="movieTitle"><?= htmlspecialchars($movie['title']) ?></h2>
        <div class="movieImageContainer">
            <img class="movieImage" src="<?= htmlspecialchars($movie['image_url']) ?>" alt="<?= htmlspecialchars($movie['title']) ?>">
        </div>
        <div class="movieDetailsContent">
            <p><strong>Release Date:</strong> <?= htmlspecialchars($movie['release_date']) ?></p>
            <p><strong>Actors/Actresses:</strong> <?= htmlspecialchars($movie['actors_actresses']) ?></p>
            <p><strong>Genre:</strong> <?= htmlspecialchars($movie['genre']) ?></p>
            <p><strong>Duration:</strong> <?= htmlspecialchars($movie['duration']) ?></p>
            <p><strong>Description:</strong></p>
            <div class="description" data-description="<?= htmlspecialchars($movie['description']) ?>"></div>
        </div>
    </div>
</main>

<?php include_once "app/views/layouts/footer.php"; ?>