<?php $pageName = 'Détails du film'; ?>

<?php include ("app/views/layouts/head.php") ?>
<?php include ("app/views/layouts/header.php") ?>

<main id="movieDetails">
    <div id="movieDetailsContainer">
        <h2 id="movieTitle"><?= htmlspecialchars($movie['title']) ?></h2>
        <div id="movieImageContainer">
            <img id="movieImage" src="<?= htmlspecialchars($movie['image_url']) ?>" alt="<?= htmlspecialchars($movie['title']) ?>">
        </div>
        <div id="movieDetailsContent">
            <p><strong>Release Date:</strong> <?= htmlspecialchars($movie['release_date']) ?></p>
            <p><strong>Actors/Actresses:</strong> <?= htmlspecialchars($movie['actors_actresses']) ?></p>
            <p><strong>Genre:</strong> <?= htmlspecialchars($movie['genre']) ?></p>
            <p><strong>Duration:</strong> <?= htmlspecialchars($movie['duration']) ?></p>
            <p><strong>Description:</strong></p>

            <!-- Le code JavaScript récupère la description à partir de l'attribut data-description, 
            la formate en ajoutant des balises <p> pour chaque ligne et l'affiche dans l'élément HTML avec l'ID description -->

            <div id="description" data-description="<?= htmlspecialchars($movie['description']) ?>"></div>

            <!-- Ajouter d'autres informations si nécessaire -->

        </div>
    </div>
</main>

<?php include "app/views/layouts/footer.php"; ?>