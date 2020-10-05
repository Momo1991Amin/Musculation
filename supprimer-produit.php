<?php

  include 'php/connexion.php';
  $momo = $_GET['supprimer-produit'];
  $requetePrepare = $dbh->prepare("
  DELETE FROM `commentaire` WHERE `commentaire`.`id_produit_commentaire` = :momo ;");

  $requetePrepare -> bindParam(':momo', $momo);
  $requetePrepare -> execute();


  $requetePrepare = $dbh->prepare("
  DELETE FROM `produit` WHERE `produit`.`id_produit` = :momo ;");

  $requetePrepare -> bindParam(':momo', $momo);
  $requetePrepare -> execute();

  header('Location: administration.php');
  exit();

?>
