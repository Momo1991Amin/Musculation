<?php include 'php/requete-inscription.php' ?>

<main class="contact container">
  <div class="page">
    <p>Inscription</p>
  </div>
  <form class="contacter" action="" method="post">
      <label>Nom d'utilisateur: </label>
      <br>
      <input type="text" name="username" class="taille-input">
      <br>
      <label>Email: </label>
      <br>
      <input type="text" name="mail" class="taille-input">
      <br>
      <label>Mot de passe: </label>
      <br>
      <input type="password" name="password" class="taille-input">
      <br>
      <label>Confirmer le mot de passe: </label>
      <br>
      <input type="password" name="password_confirm" class="taille-input">
      <br>
      <input type="submit" value="Inscription">
  </form>
</main>
