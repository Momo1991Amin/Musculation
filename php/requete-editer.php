<?php

  include 'connexion.php';


  $id = $_GET['cache'];
  $titre = $_GET['titre'];
  $prix = $_GET['prix'];
  $lien = $_GET['lien'];
  $description = $_GET['description'];
  $categorie = $_GET['categorie'];


  $requetePrepare = $dbh->prepare("
  UPDATE
    produit
  SET
    titre_produit = :titre,
    prix_produit = :prix,
    img_produit = :lien,
    description_produit = :description,
    id_categorie_produit = :categorie
  WHERE
    id_produit = :id;
    ");

  $requetePrepare -> bindParam(':id', $id);
  $requetePrepare -> bindParam(':titre', $titre);
  $requetePrepare -> bindParam(':prix', $prix);
  $requetePrepare -> bindParam(':lien', $lien);
  $requetePrepare -> bindParam(':description', $description);
  $requetePrepare -> bindParam(':categorie', $categorie);
  $requetePrepare -> execute();

  header('Location: ../administration.php');
  exit();

?>
