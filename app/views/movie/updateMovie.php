<?php include "app/views/layouts/head.php"; ?>
<?php include "app/views/layouts/header.php"; ?>

<main id="update">
    <!-- l'admin peut modifier un film si il le souhaite -->

    <h2>Modifier un film</h2>
    <section id="blocUpdateAFilm">

        <form action="index.php?action=updateMovie" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="movie_id" value="<?= htmlspecialchars($movie['id']) ?>">

            <label for="title">Titre</label>
            <input type="text" name="title" class="title" value="<?= htmlspecialchars($movie['title']) ?>" required><br>

            <label for="release_date">Date de sortie</label>
            <input type="date" name="release_date" class="release_date" value="<?= htmlspecialchars($movie['release_date']) ?>" required><br>

            <label for="actors_actresses">Acteurs/Actrices</label>
            <input type="text" name="actors_actresses" class="actors_actresses" value="<?= htmlspecialchars($movie['actors_actresses']) ?>" required><br>

            <label for="genre">Genre</label>
            <input type="text" name="genre" class="genre" value="<?= htmlspecialchars($movie['genre']) ?>" required><br>

            <label for="duration">Durée</label>
            <input type="number" name="duration" class="duration" value="<?= htmlspecialchars($movie['duration']) ?>" required><br>

            <label for="image">Affiche du film</label>
            <input type="file" name="image" class="image" accept="image/*" required><br>

            <label for="description">Description du film</label>
            <textarea id="UpdateDescription" name="description" rows="5" cols="40" required><?= htmlspecialchars($movie['description']) ?></textarea>

            <button type="submit">Modifier</button>
        </form>

    </section>
</main>

<?php include 'app/views/layouts/footer.php'; ?>