<?php

if(isset($_SESSION['auth'])){
  header('Location: compte.php');
}

if(!empty($_POST)) {
    $username = $_POST['username'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $errors = array();

    if(empty($username) || !preg_match('/^[a-zA-Z0-9_]+$/' , $_POST['username'])) {
        $errors['username'] = "Votre nom d'utilisateur est incorrect.(Uniquement numéro, lettre ou _)";
    }
    else {
      $req = $dbh -> prepare("
      SELECT
        id_client
      FROM
        client
      WHERE
        username_client = :username
      ");
      $req->bindParam(':username', $username);
      $req->execute();
      $user = $req->fetch();
      if($user) {
        $errors['username'] = "Votre nom d'utilisateur est déjà pris.";
      }
    }

    if(empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Votre email est incorrect.";
    }
    else {
      $req = $dbh -> prepare("
      SELECT
        id_client
      FROM
        client
      WHERE
      mail_client = :mail
      ");
      $req->bindParam(':mail', $mail);
      $req->execute();
      $user = $req->fetch();
      if($user) {
        $errors['username'] = "Votre email est déjà pris.";
      }
    }

    if(empty($password) || $_POST['password'] != $_POST['password_confirm']) {
      $errors['password'] = "Votre mot de passe est incorrect ou différent de votre confirmation.";
    }

    if(!empty($errors)) {
      ?>
      <div style="background-color : red">
        <p style="color:white">Vous avez mal remplis le formulaire.</p>
        <ul style="list-style-type: circle">
          <?php
          foreach ($errors as $error) {
             ?>
             <li><?php echo $error ; ?> </li>
             <?php
          }
          ?>
        </ul>
      </div>
      <?php
    }
    else {
      $requetePrepare = $dbh->prepare("
      INSERT INTO client (
      id_client,
      mail_client,
      mdp_client,
      username_client)

      VALUES (
      NULL,
      :mail,
      :password,
      :username)
      ");

      $requetePrepare->bindParam(':mail',$mail);
      $requetePrepare->bindParam(':username',$username);
      $password = password_hash($password, PASSWORD_BCRYPT);
      $requetePrepare->bindParam(':password',$password);
      $requetePrepare->execute();
      //$last_id = $dbh->lastInsertId();
      die("Votre compte a bien été créé !");
    }
}
?>
