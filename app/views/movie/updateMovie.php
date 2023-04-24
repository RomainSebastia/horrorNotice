<?php include "app/views/layouts/head.php"; ?>
<?php include "app/views/layouts/header.php"; ?>

<main id="update">
    <!-- l'admin peut modifier un film si il le souhaite -->

    <h2>Modifier un film</h2>
    <section id="blocUpdateAFilm">

        <form action="index.php?action=updateMovie" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="movie_id" value="<?= $movie['id'] ?>">

            <label for="title">Titre</label>
            <input type="text" name="title" id="title" value="<?= $movie['title'] ?>" required>

            <label for="release_date">Date de sortie</label>
            <input type="date" name="release_date" id="release_date" value="<?= $movie['release_date'] ?>" required>

            <label for="actors_actresses">Acteurs/Actrices</label>
            <input type="text" name="actors_actresses" id="actors_actresses" value="<?= $movie['actors_actresses'] ?>" required>

            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="<?= $movie['genre'] ?>" required>

            <label for="duration">Durée</label>
            <input type="number" name="duration" id="duration" value="<?= $movie['duration'] ?>" required>

            <label for="image">Affiche du film</label>
            <input type="file" name="image" id="image" accept="image/*" required>

            <label for="description">Description du film</label>
            <textarea id="description" name="description" rows="5" cols="40" required><?= $movie['description'] ?></textarea>

            <button type="submit">Modifier</button>
        </form>


    </section>
</main>

<?php include 'app/views/layouts/footer.php'; ?>