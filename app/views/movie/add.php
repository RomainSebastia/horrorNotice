<?php $pageName = 'Ajout-Film'; ?>

<?php require_once("app/views/layouts/head.php") ?>
<?php include_once("app/views/layouts/header.php") ?>


<main class="container">

    <section id="backgroundAdd">
        <div id="textBeforeAddingFilm">
            <h2>Ajouter un film</h2>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia excepturi assumenda voluptate vel aut, distinctio nulla consequatur labore sit, maiores accusantium corporis qui vero ullam et similique necessitatibus nostrum earum?
                Eos unde atque molestias? Harum nostrum labore sed a, saepe aliquid quod nam temporibus optio cumque. Laborum fugit tenetur nobis libero laudantium eos quia aliquid totam corrupti quo, id at!
                Adipisci corporis debitis, labore ratione quis dolores commodi, impedit voluptate earum exercitationem architecto explicabo dolorum deleniti mollitia aperiam vel ex voluptates expedita hic ullam aut! Ipsam temporibus ad repudiandae alias!
                Blanditiis odit inventor?</p>
        </div>

        <div id="blockAddAFilm">

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
        </div>

    </section>
</main>

<?php require_once "app/views/layouts/footer.php"; ?>