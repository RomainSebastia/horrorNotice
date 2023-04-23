 <?php require_once ("app/views/layouts/head.php"); ?>
<?php include_once ("app/views/layouts/header.php"); ?>


<main id="createMovie">

    <h2>Ajouter un film</h2>

    <section id="blockAddAFilm">

        <form action="?action=add" method="POST" enctype="multipart/form-data">
            <label for="title">Titre</label>
            <input type="text" name="title" class="title" required value="<?= htmlspecialchars($_POST['title'] ?? '') ?>"><br>

            <label for="release_date">Date de sortie</label>
            <input type="date" name="release_date" class="release_date" required value="<?= htmlspecialchars($_POST['release_date'] ?? '') ?>"><br>

            <label for="actors_actresses">Acteurs/Actrices</label>
            <input type="text" name="actors_actresses" class="actors_actresses" required value="<?= htmlspecialchars($_POST['actors_actresses'] ?? '') ?>"><br>

            <label for="genre">Genre</label>
            <input type="text" name="genre" class="genre" required value="<?= htmlspecialchars($_POST['genre'] ?? '') ?>"><br>

            <label for="duration">Durée</label>
            <input type="number" name="duration" class="duration" required value="<?= htmlspecialchars($_POST['duration'] ?? '') ?>"><br>

            <label for="image">Affiche du film</label>
            <input type="file" name="image" class="image" accept="image/*" required><br>

            <label for="description">Description du film</label>
            <textarea class="description" name="description" rows="5" cols="40" required><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
            <button type="submit">Ajouter un film</button>

        </form>
    </section>


</main>


<?php include_once "app/views/layouts/footer.php"; ?>