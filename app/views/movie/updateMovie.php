<?php $pageName = "Modifier un film"; ?>

<?php include "app/views/layouts/head.php"; ?>
<?php include "app/views/layouts/header.php"; ?>



<main id="update">
    <div id="textBeforeUpdateFilm">
        <h2>Modifier un film</h2>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia excepturi assumenda voluptate vel aut, distinctio nulla consequatur labore sit, maiores accusantium corporis qui vero ullam et similique necessitatibus nostrum earum?
            Eos unde atque molestias? Harum nostrum labore sed a, saepe aliquid quod nam temporibus optio cumque. Laborum fugit tenetur nobis libero laudantium eos quia aliquid totam corrupti quo, id at!
            Adipisci corporis debitis, labore ratione quis dolores commodi, impedit voluptate earum exercitationem architecto explicabo dolorum deleniti mollitia aperiam vel ex voluptates expedita hic ullam aut! Ipsam temporibus ad repudiandae alias!
            Blanditiis odit inventor?</p>
    </div>

    <section id="blocUpdateAFilm">

        <form action="index.php?action=updateMovie" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="movie_id" value="<?= htmlspecialchars($movie['id']) ?>">

            <label for="title">Titre</label>
            <input type="text" name="title" id="title" value="<?= htmlspecialchars($movie['title']) ?>" required><br>

            <label for="release_date">Date de sortie</label>
            <input type="date" name="release_date" id="release_date" value="<?= htmlspecialchars($movie['release_date']) ?>" required><br>

            <label for="actors_actresses">Acteurs/Actrices</label>
            <input type="text" name="actors_actresses" id="actors_actresses" value="<?= htmlspecialchars($movie['actors_actresses']) ?>" required><br>

            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="<?= htmlspecialchars($movie['genre']) ?>" required><br>

            <label for="duration">Durée</label>
            <input type="number" name="duration" id="duration" value="<?= htmlspecialchars($movie['duration']) ?>" required><br>

            <label for="image">Affiche du film</label>
            <input type="file" name="image" id="image" accept="image/*"><br>

            <label for="description">Description du film</label>
            <textarea id="UpdateDescription" name="description" rows="5" cols="40" required><?= htmlspecialchars($movie['description']) ?></textarea>



            <input type="submit" value="Modifier">
        </form>
    </section>


</main>

<?php include 'app/views/layouts/footer.php'; ?>