 <?php require_once("app/views/layouts/head.php"); ?>
 <?php include_once("app/views/layouts/header.php"); ?>

 <main class="home">
     <div class="mainTitreImg">
         <h1>Horror Notice Le site pour l'horreur</h1>
         <!-- petite image a coté du titre -->
         <img src="public/images/scream.png" alt="scream">
     </div>

     <h2>Nos 3 derniers films ajoutés</h2>
     <!-- affichage des 3 derniers films -->

     <section class="movieCardsHome">
         <?php foreach ($lastMovies as $movie) : ?>
             <article class="movieCardHome">
                 <a href="index.php?action=details&id=<?= ($movie['id']) ?>">
                     <div class="movieCardImgHome">
                         <img src="<?= ($movie['image_url']) ?>" alt="<?= ($movie['title'] . ' - affiche du film') ?>">
                     </div>
                     <div class="movieCardContent">
                         <h3><?= ($movie['title']) ?></h3>
                         <p><strong>Date de sortie:</strong> <time><?= ($movie['release_date']) ?></time></p>
                         <p><strong>Durée:</strong> <time><?= ($movie['duration']) ?></time></p>
                         <p><strong>Description:</strong> <span><?= (substr($movie['description'], 0, 100)) ?>...</span><span class="fullDescription"><?= htmlspecialchars($movie['description']) ?></span></p>
                         <div class="buttonHome">
                             <button type="button" class="buttonMovie">Voir plus</button>
                         </div>
                     </div>
                 </a>
             </article>
         <?php endforeach; ?>
     </section>

     <h2>Nos 3 film les plus appréciés</h2>

     <!-- affichage des 3 films les plus aimé -->

     <section class="movieCardsHome">
         <?php foreach ($likedMovies as $movie) : ?>
             <article class="movieCardHome">
                 <a href="index.php?action=details&id=<?= ($movie['id']) ?>">
                     <div class="movieCardImgHome">
                         <img src="<?= ($movie['image_url']) ?>" alt="<?= ($movie['title'] . ' - affiche du film') ?>">
                     </div>
                     <div class="movieCardContent">
                         <h3><?= ($movie['title']) ?></h3>
                         <p><strong>Date de sortie:</strong> <time><?= ($movie['release_date']) ?></time></p>
                         <p><strong>Durée:</strong> <time><?= ($movie['duration']) ?></time></p>
                         <p><strong>Description:</strong> <span><?= (substr($movie['description'], 0, 100)) ?>...</span><span class="fullDescription"><?= htmlspecialchars($movie['description']) ?></span></p>

                         <button type="button" class="buttonMovie">Voir plus</button>
                     </div>
                 </a>
             </article>
         <?php endforeach; ?>
     </section>
 </main>
 <?php include("app/views/layouts/footer.php"); ?>