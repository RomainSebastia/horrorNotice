<?php require_once ("app/views/layouts/head.php"); ?>
<?php include_once ("app/views/layouts/header.php"); ?>

<!-- main a propos -->
<main class="about">
  <section>
    <h2>À propos d'Horror Notice</h2>
    <p>Bienvenue sur <strong>Horror Notice</strong>, le site pour les fans de <strong>films d'horreur</strong> !</p>
    <h3>Comment ça marche ?</h3>
    <p>Sur <strong>Horror Notice</strong>, seul l'administrateur du site peut ajouter des <strong>films</strong>. Cela garantit que tous les <strong>films</strong> présents sur le site ont été choisi avec soin pour les fans de <strong>films d'horreur</strong>.</p>
    <p>Les utilisateurs peuvent parcourir les <strong>films</strong> sur le site, lire les descriptions et les commentaires, et donner leur avis en aimant ou en n'aimant pas les <strong>films</strong>. Ils peuvent également laisser des commentaires sur les <strong>films</strong> qu'ils ont vus.</p>
    <p>Ils pourront également avoir leurs favoris avec les <strong>films</strong> qu'ils ont aimés.</p>
    <h3>Qui sommes-nous ?</h3>
    <p>Nous sommes une équipe de fans de <strong>films d'horreur</strong> qui avons créé ce site pour partager notre passion avec d'autres fans. Nous espérons que vous apprécierez le site et que vous y trouverez des <strong>films</strong> qui vous plairont.</p>
    <h3>Contactez-nous</h3>
    <p>Si vous avez des questions, des suggestions ou des commentaires, n'hésitez pas à nous contacter à l'adresse suivante : contact@horrornotice.com ou sur la page <a href="index.php?action=contact"> Contact</a> .</p>
    <h3>Venez nombreux Chucky vous attends</h3>
    <!-- image de chucky -->
    <div id="aboutBlocImg">
      <!-- image de chucky -->
      <img src="public/images/chucky.jpg" alt="chucky" class="about">
      <a href="index.php?action=list" id="backList" title="pageList">
        <!-- fleche changement de page -->
        <i class="fas fa-arrow-left"></i> Visitez notre liste de films
      </a>
    </div>

  </section>
</main>

<?php include "app/views/layouts/footer.php" ?>