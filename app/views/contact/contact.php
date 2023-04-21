<?php $pageName = 'Contact'; ?>

<?php include "app/views/layouts/head.php" ?>
<?php include "app/views/layouts/header.php" ?>

<main id="pageContact">

  <section>
    <h2 id="titleContact">Contactez-nous</h2>

    <div id="blocContactParagraph">
    <p>Découvrez <strong>Horror Notice</strong>, le lieu incontournable pour les amateurs de <strong>films d'horreur</strong> ! Que vous soyez friands de classiques effrayants ou en quête de frissons inédits, notre sélection saura vous combler.</p>
    <p>N'hésitez pas à nous solliciter pour toute question, proposition ou simplement pour exprimer votre passion du <strong>cinéma</strong> d'épouvante. Utilisez le formulaire ci-dessous pour nous décrire votre requête, et nous nous engageons à vous répondre rapidement avec une proposition d'accompagnement adaptée.</p>
    </div>

    <img src="public/images/contact.jpg" alt="Photo Contact">

    <form action="index.php?action=contact" method="post">
      <div>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
      </div>

      <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
      </div>
      <div>
        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div>
        <label for="message">Message :</label>
        <textarea id="message" name="message" required></textarea>
      </div>
      <button type="submit">Envoyer</button>
    </form>
  </section>
</main>


<?php include "app/views/layouts/footer.php"; ?>