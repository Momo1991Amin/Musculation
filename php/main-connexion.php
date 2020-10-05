<?php include 'php/requete-connexion.php' ?>

<main class="contact container">
  <div class="page">
    <p>Connexion</p>
  </div>
    <form class="connexion" action="" method="post">
        <label>Nom d'utilisateur ou email:</label>
        <br>
        <input type="text" name="username-email"  class="taille-input">
        <br>
        <label>Mot de passe:</label>
        <br>
        <input type="password" name="password"  class="taille-input">
        <br>
        <input type="submit" value="Connexion">
    </form>
</main>
