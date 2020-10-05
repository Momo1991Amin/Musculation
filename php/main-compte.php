<?php

if(session_status() == PHP_SESSION_NONE){
  session_start();
}
if(!isset($_SESSION['auth'])){
  header('Location: connexion.php');
}

$errors = array();
if(!empty($_POST)){
    if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        echo "Votre nouveau mot de passe est incorrect ou différent de votre confirmation.";
    }
    else {
      $user_id = $_SESSION['auth']['id_client'];
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $req = $dbh->prepare('UPDATE client SET mdp_client = :password');
      $req->bindParam(':password',$password);
      $req->execute();
      echo "Votre mot de passe a bien été modifié";
    }
}

?>

<h1><u>Votre Compte</u></h1>
<form class="contacter" action="" method="post">
  <h4>Mot de passe</h4>
  <input type="password" name="password" class="taille-input" placeholder="Modifier votre mot de passe">
  <br>
  <input type="password" name="password_confirm" class="taille-input" placeholder="Confirmer votre nouveau mot de passe">
  <br>
  <input type="submit" value="Valider">
</form>
