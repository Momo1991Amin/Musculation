<?php

  include 'connexion.php';

    $description = $_GET['description'];
    $titre = $_GET['titre'];
    $categorie = $_GET['categorie'];
    $lien = '<img src="'.$_GET['lien'].'">';
    $prix = $_GET['prix'];


    $requetePreparee = $dbh->prepare("
      INSERT INTO `produit` (
      `id_produit`,
      `titre_produit`,
      `prix_produit`,
      `img_produit`,
      `description_produit`,
      `id_categorie_produit`)

      VALUES (
      NULL,
      :titre,
      :prix,
      :lien,
      :description,
      :categorie)
      ");

    $requetePreparee->bindParam(':titre', $titre);
    $requetePreparee->bindParam(':prix', $prix);
    $requetePreparee->bindParam(':description', $description);
    $requetePreparee->bindParam(':categorie', $categorie);
    $requetePreparee->bindParam(':lien', $lien);

    $requetePreparee -> execute();


          header('Location: ../administration.php');
          exit();

 ?>
