<?php include("app/views/layouts/head.php"); ?>
<?php include("app/views/layouts/header.php"); ?>




<main id="createMovie">
    <div id="textBeforeAddingFilm">
        <h2>Ajouter un film</h2>


    </div>

    <section id="blockAddAFilm">

        <form action="?action=add" method="POST" enctype="multipart/form-data">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" required><br>

            <label for="release_date">Date de sortie</label>
            <input type="date" name="release_date" id="release_date" required><br>

            <label for="actors_actresses">Acteurs/Actrices</label>
            <input type="text" name="actors_actresses" id="actors_actresses" required><br>

            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" required><br>

            <label for="duration">Durée</label>
            <input type="number" name="duration" id="duration" required><br>

            <label for="image">Affiche du film</label>
            <input type="file" name="image" id="image" accept="image/*" required><br>

            <label for="description">Description du film</label>
            <textarea id="description" name="description" rows="5" cols="40" required></textarea>



            <input type="submit" value="Ajouter">
        </form>
    </section>


</main>

<?php include "app/views/layouts/footer.php"; ?>