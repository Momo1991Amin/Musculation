<?php

if(isset($_SESSION['auth'])){
  header('Location: compte.php');
}


if(!empty($_POST) && !empty($_POST['username-email']) && !empty($_POST['password'])){
    include 'php/connexion.php';
    $username_email = $_POST['username-email'];
    $password = $_POST['password'];
    $req = $dbh->prepare('
    SELECT
      *
    FROM
      client
    WHERE
      username_client = :username
    OR
      mail_client = :username
    ');
    $req ->bindParam(':username',$username_email);
    $req->execute();
    $user = $req->fetch();
    if(password_verify($password, $user['mdp_client'])){
      $_SESSION['auth'] = $user;
      header("Location: compte.php");
    }
    else {
      die('Identifiant ou mot de passe incorrect');
    }
}
?>
