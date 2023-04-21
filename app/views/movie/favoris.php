<?php require_once("app/views/layouts/head.php") ?>
<?php include_once("app/views/layouts/header.php") ?>

<!-- afficher le titre de la page -->
<h1>Films aimés</h1>

<!-- afficher les films aimés par l'utilisateur -->
<ul>
   
    <?php foreach ($likedMovies as $movie): ?>
        <li>
            <h2><?php echo $movie['title']; ?></h2>
            <p><?php echo $movie['description']; ?></p>
            <!-- inclure un lien vers la page de détails du film -->
            <a href="index.php?action=details&id=<?php echo $movie['id']; ?>">Voir plus de détails</a>
        </li>
    <?php endforeach; ?>
</ul>

<?php require_once "app/views/layouts/footer.php"; ?>