 <?php require_once("app/views/layouts/head.php"); ?>
 <?php include_once("app/views/layouts/header.php"); ?>

 <main id="movieDetails">
     <div class="movieDetailsContainer">
         <h2 class="movieTitle"><?= ($movie['title']) ?></h2>
         <div class="movieImageContainer">
             <img class="movieImage" src="<?= ($movie['image_url']) ?>" alt="<?= ($movie['title']) ?>">
         </div>
         <div class="movieDetailsContent">
             <p><strong>Release Date:</strong> <?= ($movie['release_date']) ?></p>
             <p><strong>Actors/Actresses:</strong> <?= ($movie['actors_actresses']) ?></p>
             <p><strong>Genre:</strong> <?= ($movie['genre']) ?></p>
             <p><strong>Duration:</strong> <?= ($movie['duration']) ?></p>
             <p><strong>Description:</strong></p>
             <div class="description" data-description="<?= ($movie['description']) ?>"></div>
         </div>
     </div>
 </main>

 <?php include_once "app/views/layouts/footer.php"; ?>