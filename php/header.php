<?php

include 'functions.php'

?>

<body>
  <header>
    <div class="container divheader">
    <hr>
      <nav class="nav1">
        <!-- <a href="inscription.php"><i class="fas fa-chevron-circle-right"></i> inscription <i class="fas fa-chevron-circle-left"></i></a> -->
        <!-- <a href="connexion.php"><i class="fas fa-chevron-circle-right"></i> connexion <i class="fas fa-chevron-circle-left"></i></a> -->
        <a href="poignees.php"><i class="fas fa-chevron-circle-right"></i> Poignées <i class="fas fa-chevron-circle-left"></i></a>
        <a href="table.php"><i class="fas fa-chevron-circle-right"></i> Table <i class="fas fa-chevron-circle-left"></i></a>
        <a href="clubs.php"><i class="fas fa-chevron-circle-right"></i> Clubs <i class="fas fa-chevron-circle-left"></i></a>
        <a href="contact.php"><i class="fas fa-chevron-circle-right"></i> Contact <i class="fas fa-chevron-circle-left"></i></a>
        <a href="musculation.php"><i class="fas fa-chevron-circle-right"></i> Musculation <i class="fas fa-chevron-circle-left"></i></a>
        <a href="accessoires.php"><i class="fas fa-chevron-circle-right"></i> Accessoires <i class="fas fa-chevron-circle-left"></i></a>
      </nav>
      <hr>
      <div class="hpanier">
      <a href="index.php">
        <img src="sources/logo.jpg" alt="logo" class="logoh">
      </a>
      <p>vous voulez un Corp sain , vous vouler un Esprit sain? Rejoignez-nous
      </p>
        <?php
      
        if(isset($_SESSION['auth'])){
          ?>
          <p>Bonjour <?php  echo $_SESSION['auth']['username_client'] ?> </p>
          <p><a href="deconnexion.php">Déconnexion</a></p>
          <p><a href="compte.php">Votre compte</a></p>
          <?php
          if($_SESSION['auth']['username_client'] == "admin"){
            ?>
            <p><a href="administration.php">Panneau d'administration</a></p>
            <?php
          }
        }
        else {
          ?>
          <p><a href="inscription.php">Inscription</a></p>
          <p><a href="connexion.php">Connexion</a></p>
          <?php
        }
        ?>
      </div>
    </div>
  </header>
