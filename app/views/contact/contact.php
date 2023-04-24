<?php include "app/views/layouts/head.php" ?>
<?php include "app/views/layouts/header.php" ?>

<main id="pageContact">

  <section>
    <h2 id="titleContact">Contactez-nous</h2>

    <div id="blocContactParagraph">
      <p>Découvrez <strong>Horror Notice</strong>, le lieu incontournable pour les amateurs de <strong>films d'horreur</strong> ! Que vous soyez friands de classiques effrayants ou en quête de frissons inédits, notre sélection saura vous combler.</p>
      <p>N'hésitez pas à nous solliciter pour toutes questions, propositions ou simplement pour exprimer votre passion du <strong>cinéma</strong> d'épouvante. Utilisez le formulaire ci-dessous pour nous décrire votre requête, et nous nous engageons à vous répondre rapidement avec une proposition d'accompagnement adaptée.</p>
    </div>
    <!-- image avant le formulaire de contact -->

    <img src="public/images/contact.jpg" alt="Photo Contact">

    <form action="index.php?action=contact" method="post">
      <!-- prenom -->
      <div>
        <label for="prenom">Prénom :</label>
        <input type="text" class="prenom" name="name" required value="<?= ($_POST['name'] ?? '') ?>">
      </div>
      <!-- nom -->
      <div>
        <label for="nom">Nom :</label>
        <input type="text" class="nom" name="surname" required value="<?= ($_POST['surname'] ?? '') ?>">
      </div>
      <div>
        <!-- adresse e-mail -->
        <label for="email">Adresse e-mail :</label>
        <input type="email" class="email" name="email" required value="<?= ($_POST['email'] ?? '') ?>">
      </div>
      <!-- message -->
      <div>
        <label for="message">Message :</label>
        <textarea class="message" name="message" required><?= ($_POST['message'] ?? '') ?></textarea>
      </div>
      <button type="submit">Envoyer</button>
    </form>

  </section>
</main>


<?php include_once "app/views/layouts/footer.php"; ?>