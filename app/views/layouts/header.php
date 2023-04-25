<body>

  <header>
    <!-- nav -->
    <nav id="navHeader">
      <!-- logo du site -->
      <div id="logoHeader">
        <a href="index.php?action=home">
          <img src="public/images/logo.png" id="imgLogoHeader" alt="Logo du site">
        </a>
      </div>
      <!-- menu burger pour smartphone et tablette-->
      <div id="burger">
        <i class="fas fa-bars"></i>
      </div>

      <div id="ulMenuHeader" class="menu">
        <!-- fermeture du menu burger -->
        <div id="close">
          <i class="fas fa-close"></i>
        </div>
        <!-- liste du menu -->
        <ul id="ulMenu">
          <li><a href="index.php?action=home">Accueil</a></li>
          <li><a href="index.php?action=about">A Propos</a></li>
          <li><a href="index.php?action=list">Films</a></li>
          <li><a href="index.php?action=contact">Contact</a></li>
          <!-- si l'admin se connecte il y aura la page ajouter un film -->
          <?php if (isset($_SESSION['user']) && $_SESSION['user']['is_admin'] === 1) : ?>
            <li><a href="index.php?action=add">Ajouter un film</a></li>
          <?php endif; ?>
          <!-- page favoris pour l'admin et l'utilisateurs -->
          <?php if (isset($_SESSION['user']) && !$_SESSION['user']['is_admin'] !== 1) : ?>
            <li><a href="index.php?action=favoris">Mes favoris</a></li>
          <?php endif; ?>

        </ul>
        <div id="buttonAuthentification">
          <!-- si l'utilisateur connecté ou l'admin il ya le bouton deconnexion et mon profil -->
          <?php if (isset($_SESSION['user'])) : ?>
            <a href="index.php?action=logout" id="buttonDeconnect">Déconnexion</a>
            <a href="index.php?action=profil" id="buttonProfile">Mon profil</a>
            <!-- sinon le bouton s'inscrire et se connecter seront affiché -->
          <?php else : ?>
            <a href="index.php?action=register" id="buttonRegistration">S'inscrire</a>
            <a href="index.php?action=login" id="buttonConnect">Connexion</a>
          <?php endif; ?>
        </div>
      </div>

    </nav>
  </header>

  <!-- verification message de validation ou d'erreurs -->

  <?php if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-success">
      <?php
      echo htmlspecialchars($_SESSION['message'], ENT_QUOTES, 'UTF-8');
      unset($_SESSION['message']);
      ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $error) : ?>
        <p><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>


  <!--  Si la variable $pageName ne correspond pas à l'une des pages spécifiées les pages n'auront pas la div background-header -->

  <?php if (!in_array($pageName, ["Inscription", "Connexion", "Contact", "Mon compte"])) : ?>
    <div id="background-header"></div>
  <?php endif; ?>